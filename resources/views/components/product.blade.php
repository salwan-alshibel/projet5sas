@props(['product' => $product, 'productImages' => $productImages])


<a href="{{ route('product', [$product->id, $product->slug]) }}">
    <div class="max-w-md h-72 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:underline">
        <div class="md:flex">
            <div class="md:flex-shrink-0">
                <img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $productImages->{'1st_img'}) }}" alt="product image">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-black font-semibold"> Catégorie du produit ... à définir </div>
                <div class="block mt-1 text-lg leading-tight font-medium text-black">{{$product->title}}</div>
                <div class="text-gray-500 ">
                    <p class="mt-2 max-h-36 text-gray-500 overflow-hidden">{{ $product->content }}</p>
                    <p> [...] </p> 
                </div>
            </div>
        </div>
    </div>
</a>