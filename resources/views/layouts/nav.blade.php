<nav class="pt-8 md:pt-12 sd:pt-2 bg-white dark:text-white dark:bg-04DP z-50 flex flex-col justify-between mb-6 fixed w-full darkable">
    <div class="w-full pb-4 container mx-auto flex flex-wrap md:flex-nowrap items-center justify-between border-b-2 border-solid border-black text-sm lg:text-base relative">
        
        {{-- Darkmod button --}}
        <div class="darkModContainer absolute right-0 -top-7">
            <div><i class="fas fa-sun"></i></div>
            <label class="switch">
                <input type="checkbox" id="darkModBtn" onclick="window.toggleDark()">
                <span class="slider round"></span>
            </label>
            <div><i class="fas fa-moon"></i></div>
        </div>
       
        {{-- Navbar responsive button --}}
        <div class="block md:hidden order-1">
            <button id="nav-toggle" class="darkable flex items-center px-3 py-2 border-2 rounded text-gray-900 border-gray-700 hover:text-blue-400 hover:border-black">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
        </div>
      
        {{-- Navbar links : left part --}}
        <div class="nav-content hidden md:flex md:items-center md:flex-grow md:w-auto w-full order-4 md:order-2">
            <ul class="md:flex items-center justify-between pt-4 md:pt-0">
                <li><a class="inline-block no-underline hover:text-blue-400 hover:underline py-2 px-4" href="{{ route('home') }}">Accueil</a></li>
                <li><a class="inline-block no-underline hover:text-blue-400 hover:underline py-2 px-4" href="{{ route('dashboard') }}">Conditions de ventes</a></li>
                {{-- <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('posts') }}">Paiement sécurisé</a></li> --}}
            </ul>
        </div>

        {{-- Navbar logo --}}
        <div class="order-2 md:flex-grow transform scale-75 -translate-x-5 sm:translate-x-0 sm:scale-100">
            <ul class="flex items-center">
                <li>
                    <a class="inline-block relative -top-4 no-underline hover:text-red-500" href="{{ route('home') }}" class="p-3">
                        <img id="logo-img" src="{{url('/images/sword.png')}}" width="50" alt="Logo" class="mr-2 absolute -top-10 left-16">
                        <span class="antiqueQuestSt font-size left-7 relative">|Figurines&Co|</span>
                        <span class="logoand">&</span>
                        <span class="logosubtxt">Figurines et peintures</span>
                    </a>
                </li>
            </ul>
        </div>


        {{-- Navbar links : right part --}}
        <div class="nav-content hidden md:flex order-5 md:order-4 md:w-auto w-full">
            <ul class="md:flex md:items-center">
                @auth
                    <li>
                        <a class="inline-block flex no-underline hover:text-blue-400 hover:underline py-2 px-4" href="{{ route('dashboard') }}">
                            <svg id="login-icon" class="fill-current hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <circle fill="none" cx="12" cy="7" r="3" />
                                <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                            </svg>
                            {{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline-block flex no-underline hover:text-blue-400 hover:underline py-2 px-4">
                            @csrf
                            <svg id="logout-icon" xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <button type="submit">Deconnexion</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a class="inline-block flex no-underline hover:text-blue-400 hover:underline py-2 px-4" href="{{ route('login') }}">
                            <svg id="login-icon" class="fill-current hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <circle fill="none" cx="12" cy="7" r="3" />
                                <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                            </svg>
                            Se connecter
                        </a>
                    </li>
                    <li>
                        <a class="inline-block flex no-underline hover:text-blue-400 hover:underline py-2 px-4" href="{{ route('register') }}">
                            <svg id="register-icon" xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            S'enregister
                        </a>
                    </li>
                @endguest
            </ul>
        </div>

        {{-- Navbar cart logo --}}
        <div class="order-3 md:order-5">
            <a class="inline-block flex no-underline hover:text-blue-400 hover:underline py-2 pr-4 relative" href="{{ route('cart') }}">
                <svg id="basket-icon" class="fill-current hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                    <circle cx="10.5" cy="18.5" r="1.5" />
                    <circle cx="17.5" cy="18.5" r="1.5" />
                </svg>
                @if (Session::has('cart')) 
                    <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full absolute -right-2 top-1 transform scale-75">{{ Session::get('cart')->totalQty}}</span>
                @endif
            </a>
        </div>
    </div>

    {{-- Navbar links : lower part --}}
    <div id="lowerNavbar" class="transition-all delay-100 ease-in duration-300">
        <ul class="flex items-center justify-center">
            @foreach ($categories as $categorie)
                <li class="px-5">
                    <a href="{{ route('viewByCategory', ['id'=>$categorie->id]) }}" class=""><img src="{{ asset('images/categories_images/'. $categorie->image) }}" alt= {{$categorie->name}} />
                    <span class="hidden">{{$categorie->name}}</span></a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>




















{{-- <nav class="pt-12 sd:pt-2 bg-white dark:text-white dark:bg-04DP z-50 flex flex-col justify-between mb-6 fixed w-full">
    <div class="w-full container mx-auto flex items-center justify-between border-b-2 border-solid border-black">

       
            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-gray-900" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle" />
      
    

        <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
            <ul class="md:flex items-center justify-between text-base pt-4 md:pt-0">
                <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('home') }}">Accueil</a></li>
                <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('dashboard') }}">Profil</a></li>
                <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('posts') }}">Posts</a></li>
            </ul>
        </div>

        <ul class="flex items-center">
            <li>
                <a class="inline-block relative no-underline hover:text-black" href="{{ route('home') }}" class="p-3">
                    <img id="logo-img" src="{{url('/images/iconfinder_Adventure_Map_2913095.png')}}" width="50" alt="Logo" class="mr-2 absolute -top-8 left-16">
                    <span class="parisienne font-size">|Figurines&Co|</span>
                </a>
            </li>
        </ul>
         
        <ul class="md:flex md:items-center">
            @auth
                <li>
                    <a class="inline-block flex no-underline hover:text-black hover:underline py-2 px-4" href="">
                        <svg id="login-icon" class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <circle fill="none" cx="12" cy="7" r="3" />
                            <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                        </svg>
                        {{ auth()->user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="inline-block flex no-underline hover:text-black hover:underline py-2 px-4">
                        @csrf
                        <svg id="logout-icon" xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <button type="submit">Deconnexion</button>
                    </form>
                </li>
            @endauth

            @guest
                <li>
                    <a class="inline-block flex no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('login') }}">
                        <svg id="login-icon" class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <circle fill="none" cx="12" cy="7" r="3" />
                            <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
                        </svg>
                        Se connecter
                    </a>
                </li>
                <li>
                    <a class="inline-block flex no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('register') }}">
                        <svg id="register-icon" xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        S'enregister
                    </a>
                </li>
            @endguest

            <li>
                <a class="inline-block flex no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('cart') }}">
                    <svg id="basket-icon" class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                    @if (Session::has('cart')) 
                        <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">{{ Session::get('cart')->totalQty}}</span>
                    @endif
                </a>
            </li>
        </ul>
    </div>

    <div>
        <ul class="flex items-center justify-center">
            @foreach ($categories as $categorie)
                <li class="px-5">
                    <a href="{{ route('viewByCategory', ['id'=>$categorie->id]) }}" class=""><img src="{{ asset('images/categories_images/'. $categorie->image) }}" alt= {{$categorie->name}} />
                    <span class="nav_link_text">{{$categorie->name}}</span></a>
                </li>
            @endforeach
        </ul>
    </div>
</nav> --}}