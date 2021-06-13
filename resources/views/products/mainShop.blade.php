@extends('layouts.app')


@section('content')
    <div class="darkable w-full mt-12 sm:mt-0 flex flex-col md:flex-row">
        <div class="darkable w-full md:w-72 md:pl-4 lg:pl-0 md:ml-12">
            <div class="lessDarkable h-auto md:h-72 lg:h-full m-0 md:mt-12 rounded-lg lg:rounded-3xl  bg-white pb-4 md:pb-2 static md:fixed lg:static">
                {{-- Search bar for categories(NOT USED NOW): --}}
                {{-- <input type="search" id="myInput" onkeyup="window.search()" placeholder="Rechercher..." > --}}

                <!-- Categories list -->
                <div id="myUL" class="w-auto m-auto md:m-0 md:pt-4 lg:fixed">
                    <div class="pt-4 mb-2 text-center text-2xl underline">Categories</div>
                    <div class="border-b w-9/12 mb-8 m-auto"></div>
                    <div class="m-0 lg:m-4 text-sm lg:text-base rounded-lg bg-nenuphar-green-500 p-4">
                        @if ($category->parent_id !== null)
                        <a class="w-full p-1 lg:pl-4 py-3 inline-block hover:bg-yellow-700 underline" href="{{ route('viewByCategory', ['id'=>$category->parent->id]) }}">{{ $category->parent->name }}</a>
                        <ul>
                        @foreach ($category->parent->children as $children)
                            <li><a class="w-full pl-8 pb-1 inline-block hover:bg-blue-500" href="{{ route('viewByCategory', ['id'=>$children->id]) }}"><i class="fas fa-angle-right"></i> {{ $children->name }}</a></li>
                        @endforeach
                        </ul>
                        @else 
                        <a class="w-full p-1 lg:pl-4 pb-3 inline-block hover:bg-yellow-700 underline" href="{{ route('viewByCategory', ['id'=>$category->id]) }}">{{ $category->name }}</a>
                        <ul>
                        @foreach ($category->children as $children)
                            <li><a class="w-full pl-8 inline-block hover:bg-blue-500" href="{{ route('viewByCategory', ['id'=>$children->id]) }}"><i class="fas fa-angle-right"></i> {{ $children->name }}</a></li>
                        @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>  
        </div>
        <!-- Products -->
        <div class=" pl-2 pr-2 lg:pl-8 pt-12 grid grid-cols-1 xl:grid-cols-2 gap-4 m-auto">
            @foreach ($products as $product)
            <a href="{{ route('product', [$product->id, $product->slug]) }}">
                <div class="lessDarkable max-w-md md:h-72 mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0">
                            <img class="md:h-72 w-full md:w-48 object-contain bg-white" src="{{ asset('images/products_images/'. $product->products_image->first_img) }}" alt={{ $product->products_image->first_img }}>
                        </div>

                        <div class="p-8 relative w-full h-72 md:h-auto py-5">
                            <div class="absolute right-8 bottom-3 border-solid border rounded px-1 ">{{$product->prixTTC()}} €</div>
                            <div>
                                <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-yellow-700 rounded">
                                    {{ $product->category->parent->name }}
                                </div>
                                
                                <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-indigo-700 rounded">
                                    {{ $product->category->name }}
                                </div>
                                
                                @foreach ($product->tags as $tag)
                                    @if ($tag->name == '#Nouveauté')
                                    <div class="inline-flex items-center justify-center px-2 py-1 uppercase tracking-wide text-xs font-semibold text-indigo-100 bg-green-700 rounded">
                                        {{ $tag->name }}
                                    </div>        
                                @endif
                                
                                @endforeach
                            </div>

                            <div class="hover:underline pt-4">
                                <div class="block mt-1 text-lg leading-tight font-medium underline">
                                    {{$product->title}}
                                </div>
                                <div>
                                    <p class="mt-2 max-h-36 overflow-hidden text-justify break-words">{{ $product->content }}</p>
                                    <p> [...] </p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            
            <!--Pagination controls-->
            <div class="px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 col-span-full m-auto">
                <div class=" sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            @if ($pagination->currentPage == 1)
                                <a href="#"
                                    class="pointer-events-none relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-200 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
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
@endsection