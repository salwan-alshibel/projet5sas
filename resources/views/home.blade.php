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
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Home
        </div>
    </div>
    <div id="carousel">
        <ul id="slides">
            <li class="slide showing">
                <img src="" alt="" />
            </li>
            <li class="slide">
                <img src="" alt="" />
            </li>
            <li class="slide">
                <img src="" alt="" />
            </li>
        </ul>
        <!-- Boutons diaporama -->
        <div class="slider-controlls" id="controlls-list">
            <button class="controls previous"><i class="fa fa-caret-left"></i> Précédent</button>
            <button class="controls pause">Appuyer pour arreter le diaporama</button>
            <button class="controls next">Suivant <i class="fa fa-caret-right"></i></button>
        </div>
        <!-- fin Boutons diaporama -->
    </div>
@endsection
