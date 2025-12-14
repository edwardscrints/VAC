<div>
    <x-welcome-banner />

    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-12 sm:px-6 lg:px-8 relative z-10">
        @if ($this->saleCollection)
            <x-collection-sale />
        @endif
        @if ($this->saleCollectionImages)
    <div class="grid grid-cols-2 gap-4">
        @foreach ($this->saleCollectionImages as $chunk)
            <div>
                @foreach ($chunk as $image)
                    <img src="{{ $image }}" alt="Producto en oferta" class="w-full h-auto rounded shadow">
                @endforeach
            </div>
        @endforeach
    </div>
        @else
            <p>No hay productos en oferta.</p>
         @endif
        @if ($this->randomCollection)
            <section>
                <h2 class="text-3xl font-bold text-[#2c5364] drop-shadow-lg uppercase">
                    {{ $this->randomCollection->translateAttribute('name') }}
                </h2>

                <div class="grid grid-cols-2 mt-8 lg:grid-cols-4 gap-x-4 gap-y-8">
                    @foreach ($this->randomCollection->products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</div>
