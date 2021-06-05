@extends('layouts.app')


@section('content')
    <div class="container md:flex pt-20">
        <div class="w-full md:w-1/5">
            <div>
                <input type="search" id="myInput" onkeyup="window.search()" placeholder="Rechercher..." >
            
                <ul id="myUL" class="text-white">
                    {{-- Take categories (parent and childrens) and show names --}}
                    @if ($category->parent_id !== null)
                    <a href="{{ route('viewByCategory', ['id'=>$category->parent->id]) }}">{{ $category->parent->name }}</a>

                    @foreach ($category->parent->children as $children)
                        <li><a href="{{ route('viewByCategory', ['id'=>$children->id]) }}">{{ $children->name }}</a></li>
                    @endforeach
            
                    @else 
                    <a href="{{ route('viewByCategory', ['id'=>$category->id]) }}">{{ $category->name }}</a>

                    @foreach ($category->children as $children)
                        <li><a href="{{ route('viewByCategory', ['id'=>$children->id]) }}">{{ $children->name }}</a></li>
                    @endforeach

                    @endif
                </ul>
            </div>  
        </div>
        
        <div class="pl-8 grid grid-cols-1 xl:grid-cols-2 gap-4">
            @foreach ($products as $product)
            <a href="{{ route('product', [$product->id, $product->slug]) }}">
                <div class="max-w-md h-72 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl hover:underline">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            {{-- @foreach ($productsImages as $productsImage)
                                @if ($product->id == $productsImage->product_id)
                                    <img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $productsImage->first_img) }}" alt="product image">
                                @endif
                            @endforeach --}}
                            <img class="h-72 w-full md:w-48 object-contain" src="{{ asset('images/products_images/'. $product->products_image->first_img) }}" alt={{ $product->products_image->first_img }}>
                        </div>
                        <div class="p-8">
                            <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-indigo-700 rounded">{{ $product->category->name }}</div>
                            <div class="block mt-1 text-lg leading-tight font-medium text-black">{{$product->title}}</div>
                            <div class="text-gray-500 ">
                             <p class="mt-2 max-h-36 text-gray-500 overflow-hidden">{{ $product->content }}</p>
                             <p> [...] </p>
                             <div>{{$product->prixTTC()}} €</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            
            {{-- {{ $products->links() }} --}}
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