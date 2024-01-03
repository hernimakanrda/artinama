<div>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">

            <article class="mx-auto w-full max-w-2xl format format-lg sm:format-base lg:format-lg format-blue dark:format-invert">

                <h1 class="text-center">Arti Nama <strong class="font-nama text-7xl font-bold underline">{{ ucwords($name->name) }}</strong> Beserta Kepribadiannya</h1>
                <p class="lead">
                    Selamat datang Ayah bunda di website {{ config('app.name') }}. Disini kita akan bahas mengenai arti nama {{ ucwords($name->name) }} beserta kepribadian, asal kata, kecocokan untuk jenis kelamin, agama, juga asal kata. Sehingga Ayah Bunda bisa memilih nama yang baik untuk si kecil, karena nama adalah doa.
                </p>

                <livewire:name-card :name="$name" :cta="false"/>

                <h2 class="font-nama"><span class="text-5xl font-bold underline">Arti Nama {{ ucwords($name->name) }}</span></h2>
                <blockquote>Nama {{ ucwords($name->name) }} punya arti <span class="font-bold">{{ $name->meaning }}</span>.
                    Nama ini adalah salah satu dari {{ \App\Models\Name::where('first_char', $name->first_char)->count() }} nama lain dengan awalan {{ ucwords($name->first_char) }}.
                    Nama ini kerap dipakai untuk {{ $name->gender }}. Kata {{ ucwords($name->name) }} berasal dari {{ collect($name->origins)->map(fn($item) => ucwords($item))->join(', ', ' dan ') }}.

                    Mayoritas nama ini dipakai oleh orang {{ collect($name->religions)->map(fn($item) => ucwords($item))->join(', ', ' dan ') }}.</blockquote>

                <h2 class="font-nama"><span class="text-5xl font-bold underline">Nama Panggilan untuk {{ ucwords($name->name) }}</span></h2>
                <p>Tak lupa, sebagai pelengkap arti dan kepribadian, kita juga sediakan beberapa ide untuk nama panggilan ananda. Berikut adalah beberapa nama panggilan yang bisa kita pakai untuk nama {{ ucwords($name->name) }}. Diantaranya: </p>

                <ol>
                    @foreach($name->nicknames as $nickname)
                        <li><strong>{{ $nickname }}</strong></li>
                    @endforeach
                </ol>

                <h2 class="font-nama"><span class="text-5xl font-bold underline">Berbagai Karakteristik Nama {{ ucwords($name->name) }}</span></h2>
                @php
                    $traits = collect(explode('. ', $name->content))->shuffle();
                @endphp
                <blockquote><p>Secara singkat, kepribadian {{ ucwords($name->name) }} adalah: {{ $name->personality }}</p></blockquote>
                <p>Nama sarah punya kepribadian {{ $name->personality }}. Namun, jika Ayah Bunda ingin tahu lebih detail, berikut adalah {{ $traits->count() }} kelebihan nama {{ ucwords($name->name) }} yang tidak banyak orang ketahui</p>


                <h2 class="font-nama"><span class="text-5xl font-bold">{{ $traits->count() }} kelebihan nama {{ ucwords($name->name) }} yang tidak banyak orang ketahui</span></h2>
                <ol>
                    @foreach($traits as $trait)
                        <li>{{ $trait }}</li>
                    @endforeach
                </ol>

                <h2><span class="text-4xl font-bold">Apakah Ayah Bunda Berminat Memakai Nama <strong class="font-nama text-5xl font-bold underline">{{ ucwords($name->name) }}</strong>?</span></h2>

                <p>{{ $name->content }}</p>

            </article>
        </div>
    </main>

    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800 text-center">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white font-nama">
                <span class="text-6xl">Ide nama lainnya</span>
            </h2>
            <p class="pb-3">Selain {{ ucwords($name->name) }}, ada beberapa ide nama lain seperti:</p>
            <div class="grid gap-0 sm:grid-cols-2 lg:grid-cols-3">
                @foreach(\App\Models\Name::whereNotNull('scraped_at')->inRandomOrder()->take(9)->get() as $name)
                    <livewire:name-card :name="$name" :simple="true" :cta="true" :logo="false"/>
                @endforeach
            </div>
        </div>
    </aside>




</div>
