<div>

    <div class="mx-auto max-w-screen-xl format lg:format-lg format-blue dark:format-invert p-6">
        <h1 class="font-nama">Arti Nama dan Kepribadian</h1>
        <p>
            <strong>Hai Ayah Bunda</strong>, selamat datang di website {{ config('app.name') }}.
        </p>
        <p>
            Ayah Bunda sedang mencari ide nama untuk si kecil? Yuk telusuri koleksi nama kami disini. Ayah Bunda bisa mendapatkan ide nama berdasarkan huruf awal, agama, maupun suku &amp; asalnya.
        </p>
        <p>
            Silakan pakai navigasi di atas untuk memulai, atau mulai dari melihat ide nama berikut:
        </p>
    </div>
        <div class="max-w-screen-xl justify-between mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-0">
        @foreach(\App\Models\Name::whereNotNull('scraped_at')->inRandomOrder()->take(9)->get() as $name)
            <livewire:name-card :name="$name"/>
        @endforeach
        </div>

</div>
