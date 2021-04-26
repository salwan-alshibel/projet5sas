{{-- @extends('master')


@section('title', 'Homepage')


@section('content')

 Recent Messages:

 <ul>
    @foreach($messages as $message)

        <li>{{ $message->title }} : {{ $message->content }}</li>

    @endforeach
 </ul>
     

@endsection
 --}}


@extends('layouts.app')

@section('content')

    <section id="carousel_section" class="bg-dusty-gray-100 dark:bg-01DP pb-20">
        <div class="flex justify-center">
            <div class="w-full p-6 rounded-lg dark:text-white mt-40 md:mt-40 text-center">
                Nouveautés
            </div>
        </div>
        <div id="carousel" class="relative">
            <ul id="slides">
                <li class="slide showing">
                    <a href="{{ route('paints') }}" class=""><img src="{{url('/images/GW-New-To-40K-2020-11-14-Portal-All-bmm.jpg')}}" alt="Peintures"/>
                    <span class="nav_link_text">Peintures</span></a>
                </li>
                <li class="slide">
                    <a href="{{ route('paints') }}" class=""><img src="{{url('/images/StarbloodStalkers-2021-03-20-ShortPortal-All-bma_.webp')}}" alt="Peintures"/>
                    <span class="nav_link_text">Peintures</span></a>
                </li>
                <li class="slide">
                    <a href="{{ route('paints') }}" class=""><img src="{{url('/images/GW-Warzone-Ultramar-2020-26-09-LPMulticol-All-bm_.webp')}}" alt="Peintures"/>
                    <span class="nav_link_text">Peintures</span></a>
                </li>
            </ul>
            <!-- Carousel buttons -->
            <div class="slider-controls absolute top-0 left-0 w-full h-full z-10" id="controls-list">
                <button class="carousel-control-previous">
                    <span class="carousel-control-prev-icon"><i class="fas fa-arrow-circle-left"></i></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-pause absolute bottom-10 left-1/2">
                    <span class="carousel-control-pause-icon"><i class="fas fa-pause-circle"></i></span>
                    <span class="visually-hidden">Pause</span></button>
                <button class="carousel-control-next right-0">
                    <span class="visually-hidden">Suivant</span>
                    <span class="carousel-control-next-icon"><i class="fas fa-arrow-circle-right"></i></span>
                </button>
            </div>
        </div>
    </section>

    

    <section id="new-products" class="bg-dusty-gray-200 flex flex-col items-center justify-center pt-10 pb-16">
        <div class="flex justify-center">
            <div class="w-full p-6 dark:text-white rounded-lg text-center">
                En promo
            </div>
        </div>
    
        {{-- <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <a href="" class="bg-white p-3 rounded">1</a>
            <a href="" class="bg-white p-3 rounded">2</a>
            <a href="" class="bg-white p-3 rounded">3</a>
            <a href="" class="bg-white p-3 rounded">4</a>
            <a href="" class="bg-white p-3 rounded">5</a>
            <a href="" class="bg-white p-3 rounded">6</a>
            <a href="" class="bg-white p-3 rounded">7</a>
            <a href="" class="bg-white p-3 rounded">8</a>
            <a href="" class="bg-white p-3 rounded">9</a>
        </div> --}}

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
            @include('products.cards')
            @include('products.cards')
            @include('products.cards')
            @include('products.cards')
            @include('products.cards')
            @include('products.cards')
            @include('products.cards')
            @include('products.cards')
        </div>

        
        {{-- <a href="">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:underline">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-72 w-full object-cover md:w-48" src="{{url('/images/StarbloodStalkers-2021-03-20-ShortPortal-All-bma_.webp')}}" alt="Nouveauté en magasin">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-black font-semibold">Warhammer / Warhammer 40 000 / Peinture ...</div>
                        <div class="block mt-1 text-lg leading-tight font-medium text-black">Figurine titre</div>
                        <p class="mt-2 text-gray-500">Figurine texte résumé. Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat.</p>
                    </div>
                </div>
            </div>
        </a> --}}
    </section>

    <section id="presentations" class="">
        <div class="bg-white">
            <div class="md:flex">
                <div class="flex flex-row items-center md:flex-shrink-0 bg-04DP">
                    <img class="m-8" src="{{url('/images/Figurines and co 2021-03-31.jpg')}}" alt="Nouveauté en magasin">
                </div>
                <div class="md:p-20">
                    <div class="uppercase tracking-wide text-sm text-black font-semibold">Figurines&Co</div>
                    <div class="block mt-1 text-lg leading-tight font-medium text-black">Figurine titre</div>
                    <p class="mt-2 p-4 sm:p-0 text-gray-500">Présentation.Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat. 
                    Présentation.Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection