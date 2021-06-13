@extends('layouts.app')

@section('content')
<section id="carousel_section" class="bg-dusty-gray-100 dark:bg-01DP pb-20 darkable">
        <div class="flex justify-center">
            <h2 class="w-full p-6 pt-12 rounded-lg dark:text-white text-center text-2xl">
                A la une
            </h2>
        </div>

        <div id="carousel" class="relative">
            <ul id="slides" class="z-10">

                @foreach ($allTagsWithProducts as $oneTagWithProducts)
                    @if ($oneTagWithProducts->name == '#Carrousel')
                        @foreach ($oneTagWithProducts->products as $product)
                            <li class="slide showing bg-white">
                                <a href="{{ route('product', [$product->id, $product->slug]) }}" class="">
                                    <img class="h-72 w-9/12 md:w-48 object-contain bg-white" src="{{ asset('images/products_images/'. $product->products_image->first_img) }}" alt={{ $product->products_image->first_img }}/>
                                    
                                    <div class="text-sm left-12 sm:left-auto w-3/4 -bottom-4 sm:w-auto border-none
                                    absolute sm:bottom-4 text-black right-28 sm:text-lg border-l-2 sm:border-solid p-4  sm:max-w-xs overflow-hidden max-h-72 ">
                                    <p class="pb-1"> Nouveaux arrivages : </p>
                                    <p>{{$product->title}}</p>
                                    <p class="text-right pt-1">{{$product->price}} €</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endforeach
            </ul>
            
            <!-- Carousel buttons -->
            <div class="slider-controls absolute top-0 left-0 w-full h-full" id="controls-list">
                <button class="carousel-control-previous z-20">
                    <span class="carousel-control-prev-icon"><i class="fas fa-chevron-left"></i></span>
                    {{-- <span class="visually-hidden">Précédent</span> --}}
                </button>

                <button class="carousel-control-pause absolute -bottom-16 z-20 p-4 rounded-3xl rounded-t-none">
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
            <h2 class="w-full p-6 dark:text-white rounded-lg text-center text-2xl">
                Nouveautés
            </h2>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
            @include('products.home_page_products')
        </div>

    </section>

    <section id="presentations" class="">
        <div class="bg-white">
            <div class="lg:flex">
                <div class="flex flex-row items-center justify-center lg:flex-shrink-0 bg-04DP">
                    <img class="m-8" src="{{url('/images/logo2.png')}}" alt="Nouveauté en magasin">
                </div>
                <div class="p-4 md:px-16 md:py-16">
                    <h3 class="sm:p-4 uppercase tracking-wide text-2xl text-black font-semibold pb-5 border-b ">Figurines&Co</h3>
                    <div class="block p-0 mt-2 sm:p-4 pb-4 pt-4 text-lg leading-tight font-medium text-black italic">Le lieu idéal pour trouver vos figurines warhammer !</div>

                    <div class="p-0 mt-2 sm:p-4 text-black text-justify break-words">
                    <p>
                    Figurine&Co est un faux magasin de vente en ligne destiné à un projet de formation en développement web.
                    Ici vous ne pourrez ni acheter, ni trouver des informations pertinentes concernant les figurines Warhammer.

                    Merci de votre visite !
                    </p>

                    <p class="pt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat. 
                    Présentation.Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                    <p class="hidden">Site réalisé par Salwan AL SHIBEL</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection