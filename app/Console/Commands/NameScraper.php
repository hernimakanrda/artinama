<?php

namespace App\Console\Commands;

use App\Models\Name;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use OpenAI\Laravel\Facades\OpenAI;

class NameScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:name
    {--name=muhammad}
    {--locale=id_ID}
    {--max=1000}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape name and meaning from OpenAI';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle(): void
    {

        $count = 0;

        $name = Name::firstOrCreate([
            'name' => $this->option('name'),
            'locale' => $this->option('locale')
        ]);

        while ($name && $count <= $this->option('max')){

            try {
                if(is_null($name->scraped_at)){
                    retry(3, function ($attempts) use ($name, &$count){
                        $name = $this->generate($name);

                        $count++;
                        $this->info('#' . $count . ': ' . $name->name);
                    });
                }

                $newNames = collect($name->related_names)->merge($name->random_names);

                foreach ($newNames as $newName) {
                    Name::firstOrCreate(['name' => $newName, 'locale' => $this->option('locale')]);
                }
            }
            catch (\Exception $e){
                $this->info('Skipping ' . $name->name . '. Error: ' . $e->getMessage());
            }

            $name = Name::whereNull('scraped_at')->first();
        }

        Name::whereNull('scraped_at')->delete();
    }

    /**
     * @param Name $name
     * @return Name
     * @throws \Throwable
     */
    public function generate(Name $name): Name
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'assistant', 'content' => 'State the meaning of the name ' . $name->name . ' in one sentence along with `meaning` (string in ' . $name->locale . '), `personality` (in ' . $name->locale . '),  10 `nicknames` (in ' . $name->locale . '),  `content` (string in ' . $name->locale . ' and 100 words), `gender` (string), `religions` (array), `origins` (array), 10 related_names and 10 random_names. Format answer in json without quotes and translated into ' . $name->locale . ' locale, all values in lowercase, without any additions. If there is a variety, make it a json array (unique).'],
            ],
        ]);

        $data = json_decode($result->choices[0]->message->content, true);

        $data['first_char'] = $name->name[0];
        $data['name'] = $name->name;

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'meaning' => 'required',
            'personality' => 'required',
            'gender' => 'required',
            'religions' => 'required|array',
            'origins' => 'required|array',
            'related_names' => 'required|array',
            'random_names' => 'required|array',
            'content' => 'required|string',
        ]);

        throw_if($validator->fails(), new \Exception(collect($validator->errors()->all())->implode(', ')));

        $data['meaning'] = str($data['meaning'])->remove('(in ' . $name->locale . ')')->toString();
        $data['personality'] = str($data['personality'])->remove('(in ' . $name->locale . ')')->toString();
        $data['scraped_at'] = now();

        $name->update($data);

        return $name;
    }
}
