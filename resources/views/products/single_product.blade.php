@extends('layouts.app')


@section('content')
<div class="darkable pt-12 flex justify-center bg-dusty-gray-100">

    <div class="lessDarkable lg:m-8 rounded-xl">
        @auth
            @if (auth()->user()->admin == 1)
                <div class="lessDarkable bg-white rounded-lg py-6 px-4 mb-6 flex flex-col items-center">
                    <h1 class="pb-2 text-xl">Choix administrateur :</h1>
                    <p>Vous pouvez supprimer ce produit définitivement. Attention ce choix est définitif.</p>
                    <form action="{{ route('product.delete', $product) }}" method="post" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-500 rounded-lg p-2 my-4" onclick="return confirm('Veuillez confirmer la suppression de cet article. Attention ce choix est définitif !')">Effacer definitivement.</button>
                    </form>

                    {{-- <form action="{{ route('product.hide',$product) }}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-black bg-gray-500 rounded-lg p-2" onclick="return confirm('Veuillez confirmer le retrait de cet article du magasin.')">Retirer de la vente.</button>
                    </form> --}}
                </div>
            @endif
        @endauth

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
                    @if($product->quantity == 0)
                        <p class="p-4 max-w-max rounded bg-red-600">Produit épuisé !</p>
                    @else
                        @if ($product->quantity < 5 && $product->quantity > 0)
                        <p class="py-4 text-red-600">Plus que {{$product->quantity}} unité(s) disponible(s)</p>
                        @endif
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



<!-- Commentaries zone -->
<div class="flex justify-center flex-col items-center">
    <div class="w-full bg-dusty-gray-200 p-6 rounded-lg darkable">
        <h1 id="comments-zone" class="text-center text-xl pb-4">Commentaires</h1>
        <div class="border-b border-white w-9/12 mb-8 m-auto"></div>
       
        @guest
        <div class="mb-4 text-center">Pour poster un commentaire, veuillez vous <a class="underline" href="{{ route('login') }}">connecter.</a>
        </div>
        @endguest

       @auth
            <form id='comments-form' action="{{ route('posts', ['id'=>$product->id])}}" method="post" class="mb-4">
            @csrf
                <div class="mb-4">
                    <label for="" class="sr-only">body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 text-black border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Ecrire ici..."></textarea>

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
        <div class="flex justify-center flex-col items-center">
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
            <div class="">{{ $posts->fragment('comments-zone')->links() }}</div>
        </div>
        @else
        <p class="text-center">Il n'y pas de commentaire.</p>
        @endif
    </div>
</div>
@endsection


