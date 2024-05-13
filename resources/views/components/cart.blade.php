<div class="bg-gray-800 bg-opacity-10 fixed top-0 bottom-0 left-0 right-0 h-full backdrop-filter backdrop-blur-sm cart-wrapper z-50"
    style="display: none">
    <div class="w-1/4 fixed h-screen right-0 top-0 bottom-0 shadow-lg bg-white cart -right-1/4 flex flex-col">
        <div class="p-3 font-bold bg-gray-50 flex items-center justify-between border-b border-gray-200">
            <div>
                <h4 class="m-0 font-bold uppercase text-black non-italic">Cart</h4>
            </div>
            <div>
                <button
                    class="bg-transparent text-3xl cart-close p-0 text-black px-2 border-none bg-white rounded-full border-2 h-6 w-6 flex items-center justify-center">
                    ⮾
                </button>
            </div>
        </div>
        <div class="p-2 flex flex-col overflow-y-scroll" id="cart"></div>
        <div id="co-area">
            <article class="p-3 m-0 flex items-center justify-between">
                <div class="m-0 tracking-wide font-bold">Total: <span id="cart-total">$0</span></div>
                <div>
                    <button class="py-2 px-3 bg-green-600 hover:bg-green-700 text-white font-bold border-none">
                        Checkout
                    </button>
                </div>
            </article>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $(".cart-open").on("click", function() {
            $('.cart-wrapper').show()
            $('.cart').css({
                right: 0
            })
            $("body").addClass("overflow-hidden")
        })

        $(".cart-close").on("click", function() {
            $('.cart').css({
                right: -($('.cart').width())
            })
            $("body").removeClass("overflow-hidden")
            $('.cart-wrapper').delay(100).fadeOut()
        })



        refresh_cart()

    })
</script>
