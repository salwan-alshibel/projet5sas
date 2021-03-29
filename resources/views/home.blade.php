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
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg mt-40 md:mt-44 text-center">
            Nouveautés
        </div>
    </div>
    <section id="carousel" class="relative">
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
                <span class="carousel-control-next-icon"><i class="fas fa-arrow-circle-right"></i></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </section>

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg text-center">
            En promo
        </div>
    </div>

    <section id="new-products" class="mt-20 flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <a href="" class="bg-white p-3 rounded">1</a>
            <a href="" class="bg-white p-3 rounded">2</a>
            <a href="" class="bg-white p-3 rounded">3</a>
            <a href="" class="bg-white p-3 rounded">4</a>
            <a href="" class="bg-white p-3 rounded">5</a>
            <a href="" class="bg-white p-3 rounded">6</a>
            <a href="" class="bg-white p-3 rounded">7</a>
            <a href="" class="bg-white p-3 rounded">8</a>
            <a href="" class="bg-white p-3 rounded">9</a>
        </div>

        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
            <div class="md:flex">
              <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48" src="" alt="Man looking at item at a store">
              </div>
              <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Case study</div>
                <a href="#" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">Finding customers for your new business</a>
                <p class="mt-2 text-gray-500">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers.</p>
              </div>
            </div>
        </div>

    </section>

    <section id="presentations" class="my-20 min-h-screen">
Presentations ici
    </section>
@endsection