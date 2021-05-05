@extends('layouts.app')


@section('content')
    <div class="container md:flex">
        <div class="w-full md:w-1/5">
            <div>
                <input type="search" id="myInput" onkeyup="window.search()" placeholder="Rechercher..." >
            
                <ul id="myUL" class="text-white">
                    <li><a href="#">Squelettes</a></li>
                    <li><a href="#">Lord of sigmar</a></li>
                    <li><a href="#">test</a></li>
                    <li><a href="#">age of sigmar</a></li>
                    <li><a href="#">chaos</a></li>
                    <li><a href="#">vampires</a></li>
                    <li><a href="#">chevalier</a></li>
                </ul>
            </div>  
        </div>
        
        
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
    </div>
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Paints products
        </div>
    </div>

    <style>

    /* Search bar */
    #myInput {
        background-image: url('/images/search-solid.svg'); /* Add a search icon to input */
        background-position: 10px 12px; /* Position the search icon */
        background-size: 7%;
        background-repeat: no-repeat; /* Do not repeat the icon image */
        width: 100%; /* Full-width */
        font-size: 16px; /* Increase font-size */
        padding: 12px 20px 12px 40px; /* Add some padding */
        border: 1px solid #ddd; /* Add a grey border */
        margin-bottom: 12px; /* Add some space below the input */
    }

    /* Filter search */
    .container {
    overflow: hidden;
    }

    .filterDiv {
    float: left;
    background-color: #2196F3;
    color: #ffffff;
    width: 100px;
    line-height: 100px;
    text-align: center;
    margin: 2px;
    display: none; /* Hidden by default */
    }

    /* The "show" class is added to the filtered elements */
    .show {
    display: block;
    }

    /* Style the buttons */
    .btn {
    border: none;
    outline: none;
    padding: 12px 16px;
    background-color: #f1f1f1;
    cursor: pointer;
    }

    /* Add a light grey background on mouse-over */
    .btn:hover {
    background-color: #ddd;
    }

    /* Add a dark background to the active button */
    .btn.active {
    background-color: #666;
    color: white;
    }
    </style>
@endsection