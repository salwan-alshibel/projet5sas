  {{-- @foreach ($products as $product)
       <p>titre : {{ $product->title}}</p> 
       <p>Résumé : {{ $product->summary }}</p> 
       <p>Description : {{ $product->content }}</p>
        @foreach ($productsImages as $productsImage)
            @if ($product->id == $productsImage->product_id) 
                <p>super ça fonctionne !</p>
                <img class="" src="{{ asset('images/products_images/'. $productsImage->{'1st_img'}) }}" alt="product image" style="height: 225px; width: 100%; display: block;">
            @endif
        @endforeach
    @endforeach --}}


    @foreach ($products as $product)
    <a href="#">
        <div class="max-w-md h-72 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:underline">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    @foreach ($productsImages as $productsImage)
                        @if ($product->id == $productsImage->product_id)
                            <img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $productsImage->{'1st_img'}) }}" alt="product image">
                        @endif
                    @endforeach
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
    @endforeach


    
    {{-- <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top" src="{{ asset('images/products_images/'. $productsImage->{'1st_img'}) }}" alt="product image" style="height: 225px; width: 100%; display: block;">
            <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div> --}}


<script src="{{asset('js/carousel.js')}}"></script>
