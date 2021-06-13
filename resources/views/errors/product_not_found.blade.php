@extends('layouts.app')


@section('content')
<div class="darkable flex justify-center bg-gray-300 lg:h-screen">
    <div class="lg:h-screen w-full md:w-11/12">
        <div class="lessDarkable mx-auto mt-20 mb-12 bg-gray-100 shadow-lg rounded-lg md:max-w-5xl">
            <div class="w-full p-2 sm:p-8 flex flex-col">
                
                <h1 class="font-black uppercase text-3xl lg:text-5xl text-yellow-500 mb-10 text-center">Produit introuvable !</h1>

                <div class="text-center p-4 sm:p-16 text-2xl">
                    <p>Le produit que vous recherchez n'existe pas !</p>
                    <p>Essayer d'effectuer une autre recherche ou retourner à l'accueil.</p>
                </div>
                <div class="mb-20 md:mb-0 text-center">
                    <a class="no-underline hover:text-blue-400 hover:underline py-2 px-4 bg-blue-500" href="{{ route('home') }}">Accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection