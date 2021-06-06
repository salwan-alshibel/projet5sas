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
            
            <!--Pagination controls-->
            <div class="px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 col-span-full m-auto">
                {{-- <div class="flex-1 flex justify-between sm:hidden">
                    <a href="?page={{$pagination->currentPage - 1}}"
                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Précédent
                    </a>
                    <a href="?page={{$pagination->currentPage + 1}}"
                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Suivant
                    </a>
                </div> --}}
                <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            @if ($pagination->currentPage == 1)
                                <a href="#"
                                    class="pointer-events-none relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-200 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <!-- Heroicon name: solid/chevron-left -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @else
                                <a href="?page={{$pagination->currentPage - 1}}"
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <!-- Heroicon name: solid/chevron-left -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @endif

                            @for ($page = 1; $page <= $pagination->number_of_pages ; $page++)
                                @if ($pagination->currentPage == $page)
                                <a href="?page={{$page}}" class="z-10 bg-blue-500 border-blue-500 text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{$page}}</a>
                                @else
                                <a href="?page={{$page}}" class="z-10 bg-white border-gray-300 text-blue-500 relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{$page}}</a>
                                @endif
                            @endfor

                            @if ($pagination->currentPage == $pagination->number_of_pages)
                                <a href="#"
                                    class="pointer-events-none relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-200 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @else
                                <a href="?page={{$pagination->currentPage + 1}}"
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
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