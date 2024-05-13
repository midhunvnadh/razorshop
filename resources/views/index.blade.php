@component('components.html-wrapper', ['title' => 'Razorshop', 'hideNav' => false])
    {{-- <header class="p-4">
    </header> --}}
    <section class="bg-gray-50 py-12">
        <div class="rounded-lg container">
            <div class="w-full p-2">
                <span class="font-bold text-3xl font-black">Our latest arrivals</span>
            </div>
            <div id="products" class="flex items-center justify-start flex-wrap w-full">

            </div>
        </div>
    </section>
    <section class="bg-white py-12">
        <div class="rounded-lg container bg-gray-50 p-3">
            <div class="w-full p-2">
                <span class="font-bold text-3xl font-black">Shop by category</span>
            </div>
            <div class="flex items-center justify-start flex-wrap w-full">
                {{ $i = 1 }}
                @while ($i <= 9)
                    <div class="h-12 w-12 bg-white-50 rounded-full all-center">
                        {{ ++$i }}
                    </div>
                @endwhile
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            fetch("/products/")
                .then(data => data.json())
                .then(data => {
                    const render = data.map(({
                        name,
                        price,
                        id
                    }) => {
                        return `
                            <div class="w-1/5 p-2">
                                <article class='w-full mb-0 p-0 rounded-md overflow-hidden shadow-none hover:shadow-lg bg-gray-50 hover:bg-white'>
                                    <div class="p-1">
                                        <a href = "/products/${id}">
                                            <div class="p-1">
                                                <div class="w-full h-48 bg-cover relative image rounded-md" style="background-image:url('/products/${id}/image');">
                                                    <div class="bg-black absolute top-0 bottom-0 right-0 left-0 im-wrap z-0 rounded-md"></div>
                                                    @auth
                                                        <button data-id="${id}" onclick="addToCart(${id})" class="absolute z-0 -bottom-4 shadow-md right-5 rounded-full h-8 w-8 bg-green-600 font-bold text-white text-xl border-none p-0 all-center hover:shadow-lg">
                                                            ＋
                                                        </button>
                                                    @endauth
                                                </div>
                                            </div>
                                            <div class="px-2 py-2">
                                                <h5 class="m-0 text-lg font-black monospace text-green-500">$${price}</h5>
                                                <h6 class="m-0 text-green-500 font-black tracking-wide text-sm">${name}</h6>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        `
                    }).join('\n')
                    $("#products").html(render)
                })
        })
    </script>
@endcomponent
