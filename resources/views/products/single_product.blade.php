@extends('layouts.app')


@section('content')
<div class="darkable flex justify-center bg-dusty-gray-100">

    <div class="lessDarkable lg:m-16 rounded-xl">

        <div class="flex flex-col lg:flex-row">
            <!-- product images -->
            <div class="bg-white rounded-lg">
                <img class="w-9/12 m-auto"
                    src="{{ asset('images/products_images/'. $product->products_image->first_img) }}"
                    alt={{ $product->products_image->first_img }}>
            </div>

            <!-- Category, Title, Summary and Price -->
            <div class="flex flex-col p-8 lg:w-96">
                <!-- category name -->
                <div class="w-max px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-indigo-700 rounded">
                    {{ $product->category->name }}
                </div>

                <!-- product title -->
                <div class=" block mt-1 py-4 text-2xl leading-tight font-bold">
                    {{$product->title}}
                </div>

                <!-- product summary -->
                <div class="pb-11">
                    <p>{{ $product->summary }}</p>
                </div>


                <!-- product price and addToCart button -->
                <div>
                    <p class="pb-3 text-3xl">{{ $product->prixTTC() }} € </p>
                    @if ($product->quantity < 5 && $product->quantity > 0)
                        <p>Plus que {{$product->quantity}} unité(s) disponible(s)</p>
                    @elseif($product->quantity == 0)
                        <p class="p-4 max-w-max rounded bg-red-600">Produit épuisé !</p>
                    @else
                        <form id="formCart"  class="pb-5" action="{{route('addToCart', ['id'=>$product->id])}}" method="POST">
                            @csrf
                            <label for="quantity">Quantité : </label>
                            <select id="quantity" class="text-black text-xl text-center" name="quantity">
                                @for ($i = 1; $i < 11; $i++)
                                    @if ($i <= $product->quantity )
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </form>

                        <div class="flex flex-row">
                            <button type="submit" form="formCart"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Ajouter au panier
                            </button>

                            @if (session('message'))
                                <div class="bg-green-400 font-bold rounded ml-2 py-2 px-4 text-white text-center w-max">
                                    <i class="text-xl fas fa-check"></i> {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- separation lign -->
        <div class="pt-8">
            <span class="block border-b border-gray-300 m-auto w-3/4"></span>
        </div>
        <!-- product content -->
        <div class="p-8">
            <p class="text-xl">Description :</p>
            <p class="mt-2  overflow-hidden">{{ $product->content }}</p>
        </div>
    </div>
</div>





<div class="flex justify-center">
    <div class="w-8/12 bg-custom-dark text-white p-6 rounded-lg">
       
        @guest
        <div class="mb-4 text-center">Pour poster un commentaire, veuillez vous connecter.</div>
        @endguest

       @auth
            <form id='comments-form' action="{{ route('posts', ['id'=>$product->id])}}" method="post" class="mb-4">
            @csrf
                <div class="mb-4">
                    <label for="" class="sr-only">body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Ecrire ici..."></textarea>

                    @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Valider</button>
                </div>
            </form>
        @endauth

        @if ($posts->count())
        @foreach ($posts as $post)
            <x-post :post="$post" />
        @endforeach
        {{ $posts->fragment('comments-form')->links() }}

        @else
        <p>Il n'y pas de commentaires.</p>
        @endif




        {{-- @if ($product->posts->count())
            @foreach ($product->posts as $post)
                <x-post :post="$post" />
            @endforeach
        @else
            <p>Il n'y pas de commentaires.</p>
        @endif --}}
    </div>
</div>




{{-- 

<div class="min-h-screen bg-outer-space-700 p-0 md:p-12 text-white">

    @guest
    <div class="mb-4 text-center">Pour poster un commentaire, veuillez vous connecter.</div>
    @endguest

   @auth
        <form onsubmit="return false" action="{{ route('posts', ['id'=>$product->id])}}" method="post" id="posts-form" class="mb-4">
        
            <div class="mb-4">
                <label for="" class="sr-only">body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Ecrire ici..."></textarea>

                @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <input type="hidden" name="_token" id="token-input" value="{{ csrf_token() }}" />

            <div>
                <button type="submit" form="posts-form" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Valider</button>
            </div>
        </form>
    @endauth

        <input type="text" name="searchInput" id="search-input" class="text-black" maxlength="99" placeholder="Rechercher un article...">
    
    
    
    
    
    
    
    
    
    
    
    
    

    <div id="search-result-div" class="py-8">
    </div>




    

</div>

<script>

const form = document.getElementById('posts-form');

form.addEventListener('submit', function(e) {
   e.preventDefault();

   const url = this.getAttribute('action');
   const searchValue = document.getElementById('search-input').value;
   const token = document.getElementById('token-input').value;
      
  if(searchValue !== '') {
      fetch(url, {
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': token
          },
          method: 'post',
          body: JSON.stringify({
              searchValueForController: searchValue
          })
      }).then(response => {
          // console.log(response);
          response.json().then(data => {
              // console.log(Object.entries(data));

              const searchResultDiv = document.getElementById('search-result-div');
              searchResultDiv.innerHTML = '';

              Object.entries(data)[0][1].forEach(element => {
                  searchResultDiv.innerHTML += `<a href="http://projet5sas/product/${element.id}/${element.slug}" class='block p-2 border border-solid border-gray-400 max-w-max rounded-lg bg-white text-black hover:bg-blue-500 hover:text-white'>${element.title}</a>`
              });
          })
      }).catch(error => {
          console.log(error);
      })
  }

})
</script> --}}

@endsection


