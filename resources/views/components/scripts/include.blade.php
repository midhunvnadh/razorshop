<script>
    @auth

    const deployELForCart = () => {
        $(".cm-m").off();
        $(".cm-p").off();
        $(".cm-m").on("click", function() {
            const pid = $(this).attr("data-id");
            deleteFromCart(pid);
        });
        $(".cm-p").on("click", function() {
            const pid = $(this).attr("data-id");
            addToCart(pid);
        });
    };

    const addToCart = (pid) => {
        return new Promise((a, r) => {
            fetch(`/cart/${pid}/add`, {
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    method: "POST",
                })
                .then((data) => data.json())
                .then((data) => {
                    a(data);
                    refresh_cart();
                })
                .catch((e) => {
                    refresh_cart();
                    r(e);
                });
        });
    };

    const deleteFromCart = (pid) => {
        return new Promise((a, r) => {
            fetch(`/cart/${pid}/delete`, {
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    method: "POST",
                })
                .then((data) => data.json())
                .then((data) => {
                    a(data);
                    refresh_cart();
                })
                .catch((e) => {
                    refresh_cart();
                    r(e);
                });
        });
    };


    const refresh_cart = () => {
        fetch("/cart", {
                method: "GET",
            })
            .then((data) => data.json())
            .then((data) => {
                if (data.error) {
                    return
                }
                var d = {};
                data.map((data) => {
                    if (!d[data["product_id"]]) {
                        d[data["product_id"]] = data;
                        d[data["product_id"]]["quantity"] = 1;
                    } else d[data["product_id"]]["quantity"]++;
                });
                data = d;
                var total = 0,
                    hasItems = Object.keys(data),
                    total_quantity = 0;
                data = hasItems
                    .map((k) => {
                        const {
                            id,
                            name: productName,
                            price,
                            quantity,
                            product_id
                        } = data[k];
                        total += price * quantity;
                        total_quantity += quantity;
                        return `
                            <article class = "article">
                                <div class = "flex">

                                    <div>
                                        <div class="image bg-contain h-20 w-20 overflow-hidden relative" style="background-image:url('/products/${product_id}/image')">
                                            <div class="absolute top-0 bottom-0 right-0 left-0 bg-black bg-opacity-20 rounded-md"></div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col justify-between items-left w-full p-3">
                                        <div class="font-bold text-md">${productName}</div>
                                        <div class="flex justify-between w-full items-center">
                                            <div class="text-xs font-bold">$${price}</div>
                                            <div class="flex rounded-full overflow-hidden w-max justify-between">
                                                <button class="p-0 bg-red-400 hover:bg-red-500 h-6 w-6 all-center border-none rounded-none">
                                                    -
                                                </button>
                                                <div class="h-6 w-6 all-center bg-gray-50 text-xs">
                                                    ${quantity}
                                                </div>
                                                <button class="p-0 bg-green-400 hover:bg-green-500 h-6 w-6 all-center border-none rounded-none">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </article>
                        `;
                    })
                    .join("\n");
                $("#cart-count").html(total_quantity)
                $("#cart-total").html(`$${total}`)
                $("#cart").html(
                    hasItems.length ?
                    `
                        ${data}
                    ` :
                    `Add items to cart`
                );
                hasItems.length ? $("#co-area").show() : $("#co-area").hide()
                deployELForCart();
            });
    };
    @endauth
</script>
