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



    @foreach ($allTagsWithProducts as $oneTagWithProducts)
                 @if ($oneTagWithProducts->name == '#Nouveauté')
                    @foreach ($oneTagWithProducts->products as $product)
    <a href="{{ route('product', [$product->id, $product->slug]) }}">
        <div class="lessDarkable max-w-md md:h-72 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
            <div class="md:flex">
                <div class="md:flex-shrink-0">
                    {{-- @foreach ($productsImages as $productsImage)
                        @if ($product->id == $productsImage->product_id)
                            <img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $productsImage->first_img) }}" alt="product image">
                        @endif
                    @endforeach --}}
                    <img class="md:h-72 w-full md:w-48 object-contain bg-white" src="{{ asset('images/products_images/'. $product->products_image->first_img) }}" alt={{ $product->products_image->first_img }}>
                </div>
                <div class="p-8 relative w-full h-72 md:h-auto py-5">
                    <div class="absolute right-8 bottom-3 border-solid border rounded px-1 ">{{$product->prixTTC()}} €</div>
                    {{-- <div class="uppercase tracking-wide text-sm text-black font-semibold"> {{ $product->category->name }} </div> --}}
                    <div>
                        {{-- <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-grey-700 bg-yellow-500 rounded">{{ $product->categoryParent->name }}
                        </div> --}}
                        <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-yellow-700 rounded">{{ $product->category->parent->name }}
                        </div>
                        <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-indigo-700 rounded">{{ $product->category->name }}
                        </div>
                        
                        @foreach ($product->tags as $tag)
                            @if ($tag->name == '#Nouveauté')
                            <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-green-700 rounded">
                            {{ $tag->name }}
                            </div>        
                        @endif
                        
                        @endforeach
                    </div>

                    <div class="hover:underline pt-4">
                        <div class="block mt-1 text-lg leading-tight font-medium underline">{{$product->title}}
                        </div>
                        <div>
                            <p class="mt-2 max-h-36 overflow-hidden text-justify break-words">{{ $product->content }}</p>
                            <p> [...] </p> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
                 @endif
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
