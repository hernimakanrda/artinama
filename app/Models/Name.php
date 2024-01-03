<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Name extends Model
{
    use HasFactory;
    use Orbital;
    use HasSlug;

    protected $guarded = false;

    protected $casts = [
        'related_names' => 'array',
        'random_names' => 'array',
        'nicknames' => 'array',
        'religions' => 'array',
        'origins' => 'array'
    ];

    /**
     * @return SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function getKeyName()
    {
        return 'slug';
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->string('name');
        $table->string('slug');
        $table->string('locale');
        $table->string('first_char')->nullable();
        $table->string('gender')->nullable();
        $table->json('nicknames')->nullable();
        $table->json('religions')->nullable();
        $table->json('origins')->nullable();
        $table->text('meaning')->nullable();
        $table->text('personality')->nullable();
        $table->json('related_names')->nullable();
        $table->json('random_names')->nullable();

        $table->dateTime('scraped_at')->nullable();
    }

    public function getIncrementing()
    {
        return false;
    }
}
