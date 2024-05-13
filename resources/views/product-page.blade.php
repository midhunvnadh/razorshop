@component('components.html-wrapper', ['title' => 'Razorshop', 'hideNav' => false])
    <header class="p-4 flex items-start justify-center container mt-12">
        <div class="w-1/2">
            <div class="w-full">
                <img src = "/products/{{ $product->id }}/image" class="w-full rounded" />
            </div>
        </div>
        <div class="w-1/2">
            <div class="px-12 w-full">
                <h1>
                    {{ $product->name }}
                </h1>
                <h3 class="font-bold">
                    ${{ $product->price }}
                </h3>
                <p>
                    @auth
                        <button data-id={{ $product->id }} onclick="addToCart({{ $product->id }})"
                            class="py-2 px-4 uppercase bg-gray-700 hover:bg-gray-800 text-white atc border-none font-bold text-sm">
                            Add to cart
                        </button>
                    @endauth
                </p>
                <p>
                    {{ $product->description }}
                </p>
            </div>
        </div>
    </header>
@endcomponent
