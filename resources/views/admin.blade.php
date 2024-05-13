@component('components.html-wrapper', ['title' => 'Razorshop', 'hideNav' => false])
    <section class="flex items-stretch m-0 h-screen">
        <div class="w-1/2">
            <div id="products" class="p-2">

            </div>
        </div>
        <div class="w-1/2 flex items-center justify-center h-full">
            @if ($errors->any())
                @foreach ($errors as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <form class="p-2 bg-gray-50 h-full flex items-center justify-center flex-col w-full" id="product_new_form">
                @csrf
                <div class="flex gap-2 w-full">
                    <input type="text" placeholder="Product Name" class="grow" name="ProductName"
                        value="{{ old('ProductName') }}" />
                    <div class="w-1/2">
                        <input type="file" class="border-2 border-gray-600 py-2" name="ProductPicture" />
                    </div>
                </div>

                <textarea placeholder="Description" name="ProductDesc" value="{{ old('ProductDesc') }}"></textarea>
                <textarea placeholder="Tags" name="ProductTags" value="{{ old('ProductTags') }}"></textarea>

                <div class="flex gap-2 w-full">
                    <input type="number" placeholder="Price" class="w-full py-2" name="ProductPrice" step="0.01"
                        value="{{ old('ProductPrice') }}" />
                    <div>
                        <button class=" text-sm font-bold uppercase w-64">
                            Add Item
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endcomponent


<script>
    $(document).ready(function() {


        $("#product_new_form").on("submit", async function(e) {
            e.preventDefault();
            const files = $("[name='ProductPicture']")[0].files[0];
            console.log(files);

            const ProductPicture = await base64String(files)
            const ProductName = $("[name='ProductName']").val()
            const ProductDesc = $("[name='ProductDesc']").val()
            const ProductTags = $("[name='ProductTags']").val();
            const ProductPrice = $("[name='ProductPrice']").val()
            const _token = $("[name='_token']").val();

            const data = ({
                ProductName,
                ProductDesc,
                ProductTags,
                ProductPrice,
                ProductPicture
            })

            fetch("/products/new", {
                    body: JSON.stringify(data),
                    method: "POST",
                    credentials: "same-origin",
                    headers: {
                        'X-CSRF-Token': "{{ csrf_token() }}",
                        'Content-Type': 'application/json',
                        'Accept': "application/json"
                    }
                })
                .then((data) => data.json())
                .then(data => {
                    console.log(e);
                    $(this).trigger("reset");
                    window.location.reload();
                })

            console.log(data)
        })
    })
</script>
