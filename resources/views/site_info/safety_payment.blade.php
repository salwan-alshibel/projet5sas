@extends('layouts.app')

@section('content')
    <section id="presentations" class="pt-36">
        <div class="bg-white">
            <div class="md:flex">
                <div class="flex flex-row items-center md:flex-shrink-0 bg-04DP">
                    <img class="m-8" src="{{url('/images/Figurines and co 2021-03-31.jpg')}}" alt="Nouveauté en magasin">
                </div>
                <div class="md:p-20">
                    <h1 class="uppercase tracking-wide text-sm text-black font-semibold text-3xl">Paiement sécurisé</h1>
                    <div class="block mt-1 text-lg leading-tight font-medium text-black">Payer en ligne en toute sécurité</div>
                    <p class="mt-2 p-4 sm:p-0 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat. 
                    Présentation.Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima tenetur quas, maxime corporis expedita quo, doloremque dignissimos, ad eum cupiditate tempore soluta dolore doloribus officia amet. Tenetur obcaecati similique placeat.
                    </p>
                </div>
            </div>
        </div>
    </section>
 @endsection