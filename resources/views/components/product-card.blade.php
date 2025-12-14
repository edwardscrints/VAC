@props(['product'])

<a class="block group relative"
   href="{{ route('product.view', $product->defaultUrl->slug) }}"
   wire:navigate
>
    <!-- Efecto hover sutil -->
    <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-300 via-teal-300 to-amber-300 rounded-lg blur opacity-0 group-hover:opacity-30 transition duration-300"></div>
    
    <div class="relative bg-white rounded-lg border-2 border-gray-200 group-hover:border-[#f7971e] transition duration-300 p-3 shadow-md">
        <div class="overflow-hidden rounded-lg aspect-w-1 aspect-h-1">
            <img class="object-cover transition-transform duration-300 group-hover:scale-105 w-full h-full"
                 src="{{ $product->thumbnail?->getUrl('medium') ?? asset('storage/placeholder.jpg') }}"
                 alt="{{ $product->translateAttribute('name') }}" />
        </div>

    <strong class="mt-2 text-sm font-medium text-[#2c5364] block">
        {{ $product->translateAttribute('name') }}
    </strong>

    <p class="mt-1 text-sm text-[#f7971e] font-semibold">
        <span class="sr-only">
            Precio
        </span>

        <x-product-price :product="$product" />
    </p>
    </div>
</a>
