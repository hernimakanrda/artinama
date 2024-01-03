<div>
    <aside aria-label="List Names" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800 text-center">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white font-nama">
                <span class="text-6xl">Ide Nama Bayi untuk Anak {{ ucwords($param) }}</span>
            </h2>
            <p class="pb-3">
                Ayah Bunda sedang mencari ide nama bayi <strong> untuk anak {{ $param }}</strong>? <br>
                Kami punya <strong>{{ $names->total() }} ide nama anak {{ $param }}</strong> yang bisa Ayah bunda pilih.
                Berikut beberapa diantaranya:
            </p>

            <div class="p-3">
                {{ $names->links() }}
            </div>

            <div class="grid gap-0 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($names as $name)
                    <livewire:name-card :name="$name" :simple="true" :cta="true" :logo="false" wire:key="names-{{$name->slug}}" />
                @endforeach

            </div>

            <div class="p-3">
                {{ $names->links() }}
            </div>
        </div>
    </aside>
</div>
