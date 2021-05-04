<div class="grid grid-cols-1 xl:grid-cols-2 gap-4 bg-black text-white">
    test home page new-products

    <img src="" alt="">

    @foreach ($productsImages as $productsImage)
       <p>Images : {{ $productsImage->{'1st_img'} }}</p>
    @endforeach

    @foreach ($products as $product)
       <p>titre : {{ $product->title}}</p> 
       <p>Résumé : {{ $product->summary }}</p> 
       <p>Description : {{ $product->content }}</p>
        @foreach ($productsImages as $productsImage)
            @if ($product->id == $productsImage->product_id) 
                <p>super ça fonctionne !</p>
                <img class="" src="{{ asset('images/products_images/'. $productsImage->{'1st_img'}) }}" alt="product image" style="height: 225px; width: 100%; display: block;">
            @endif
        @endforeach
    @endforeach
    
    <div class="col-md-4">
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
    </div>
</div>
