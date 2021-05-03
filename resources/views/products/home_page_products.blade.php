<div class="grid grid-cols-1 xl:grid-cols-2 gap-4 bg-black text-white">
    test home page new-products

    @foreach ($products as $product)
       <p>titre : {{ $product->title}}</p> 
       <p>Résumé : {{ $product->summary }}</p> 
       <p>Description : {{ $product->content }}</p> 
    @endforeach
    
    
</div>
