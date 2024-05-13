<nav class="sticky top-0 w-full py-2 bg-white z-50 shdw">
    <div class="container py-2 flex items-center justify-between gap-2">

        <div class="flex justify-center items-center gap-3">
            <div class="logo">
                <a class="tracking-wide font-black text-xl text-green-600 cursor-pointer" href="/">Razorshop</a>
            </div>

            <div>
                <select
                    class="bg-transparent border-none p-0 m-0 text-xs text-green-600 font-bold cursor-pointer outline-none">
                    <option>
                        Bengaluru
                    </option>
                    <option>
                        City A
                    </option>
                    <option>
                        City B
                    </option>
                    <option>
                        City C
                    </option>
                </select>
            </div>
        </div>

        <div class="">
            <input type="search" placeholder="Search" class="search" style="margin-bottom: 0" />
        </div>

        <div class="login-actions flex items-center gap-2">
            @auth
                <button
                    class="py-2 text-xs uppercase font-bold border-none hover:shadow-md bg-transparent text-black cart-open flex items-center gap-2 relative"
                    id="login-open">
                    <div class="w-2"></div>
                    <div class="h-5 w-5 bg-gray-200 text-black rounded-full flex items-center justify-center left-2 absolute text-xs monospace"
                        id="cart-count">
                        0
                    </div>
                    <span>
                        🛒 Cart
                    </span>
                </button>
                <button
                    class="bg-red-500 hover:bg-red-500 btn py-2 text-xs uppercase font-bold border border-gray-400 hover:shadow-md"
                    id="login-open" onclick="window.location.href='/logout'">
                    Logout
                </button>
            @else
                <button class="contrast btn py-2 text-xs uppercase font-bold border border-gray-400 hover:shadow-md"
                    id="login-open" onclick="window.location.href='/login'">
                    Login
                </button>
            @endauth
        </div>

    </div>
</nav>
@auth
    @component('components.cart')
    @endcomponent
@endauth
