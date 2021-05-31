@extends('layouts.app')

@section('content')



    <section id="carousel_section" class="bg-dusty-gray-100 dark:bg-01DP pb-20 darkable">
        <div class="flex justify-center">
            <div class="w-full p-6 pt-12 rounded-lg dark:text-white text-center text-2xl">
                A la une
            </div>
        </div>

        <div id="carousel" class="relative">
            <ul id="slides" class="z-10">

                @foreach ($products as $product)
                <li class="slide showing">
                    <a href="{{ route('product', [$product->id, $product->slug]) }}" class=""><img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $product->products_image->first_img) }}" alt={{ $product->products_image->first_img }}/>
                    <span class="nav_link_text">{{$product->title}}</span></a>
                </li>
                @endforeach






                {{-- <li class="slide showing">
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
                </li> --}}
            </ul>
            <!-- Carousel buttons -->
            <div class="slider-controls absolute top-0 left-0 w-full h-full" id="controls-list">
                <button class="carousel-control-previous z-20">
                    <span class="carousel-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
                    {{-- <span class="visually-hidden">Précédent</span> --}}
                </button>

                <button class="carousel-control-pause absolute bottom-10 left-1/2 z-20">
                    <span class="carousel-control-pause-icon"><i class="pause fas fa-pause-circle"></i><i class="hidden play fas fa-play"></i></span>
                    {{-- <span class="visually-hidden">Pause</span> --}}
                </button>

                <button class="carousel-control-next right-0 z-20">
                    {{-- <span class="visually-hidden">Suivant</span> --}}
                    <span class="carousel-control-next-icon"><i class="fas fa-chevron-right"></i></span>
                </button>
            </div>
        </div>
    </section>


    <section id="new-products" class="bg-dusty-gray-200 flex flex-col items-center justify-center pt-10 pb-16 darkable">
        <div class="flex justify-center">
            <div class="w-full p-6 dark:text-white rounded-lg text-center text-2xl">
                Nouveautés
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
            @include('products.home_page_products')
        </div>

    </section>

    <section id="presentations" class="">
        <div class="bg-white">
            <div class="md:flex">
                <div class="flex flex-row items-center md:flex-shrink-0 bg-04DP">
                    <img class="m-8" src="{{url('/images/logo2.png')}}" alt="Nouveauté en magasin">
                </div>
                <div class="md:px-20 md:py-16">
                    <div class="uppercase tracking-wide text-2xl text-black font-semibold pb-5 border-b ">Figurines&Co</div>
                    <div class="block mt-1 text-lg leading-tight font-medium text-black pb-4 pt-4 italic">Le lieu idéal pour trouver vos figurines warhammer !</div>
                    <p class="mt-2 p-4 sm:p-0 text-black text-justify break-words">Présentation.Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat. 
                    Présentation.Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection