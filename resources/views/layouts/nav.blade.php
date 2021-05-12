<nav class="pt-8 sd:pt-2 bg-white dark:text-white dark:bg-04DP z-50 flex flex-col justify-between mb-6 fixed w-full">
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
                <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('posts') }}">Posts</a></li>
            </ul>
        </div>

        {{-- <ul class="flex items-center">
            <li>
                <a href="{{ route('home') }}" class="p-3">Accueil</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('posts') }}" class="p-3">Posts</a>
            </li>
        </ul> --}}


        <ul class="flex items-center">
            <li>
                <a class="inline-block relative no-underline hover:text-black" href="{{ route('home') }}" class="p-3">
                    <img id="logo-img" src="{{url('/images/iconfinder_Adventure_Map_2913095.png')}}" width="50" alt="Logo" class="mr-2 absolute -top-8 left-16">
                    <span class="parisienne font-size">|Figurines&Co|</span>
                </a>
            </li>
        </ul>
         
        <ul class="flex items-center">
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
                <a class="inline-block flex no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('register') }}">
                    <svg id="basket-icon" class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8 c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7z M17.341,14h-6.697L8.371,9 h11.112L17.341,14z" />
                        <circle cx="10.5" cy="18.5" r="1.5" />
                        <circle cx="17.5" cy="18.5" r="1.5" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="flex justify-center max-h-16">
        <ul class="flex items-center">
            <li class="px-5">
                <a href="{{ route('waos') }}" class="p-3"><img src="{{url('/images/New_AOS_Logo.webp')}}" alt="Warhammer Age of Sigmar"/>
                <span class="nav_link_text">Warhammer Age of Sigmar</span></a>
            </li>
            <li class="px-5">
                <a href="{{ route('w40k') }}" class="p-3"><img src="{{url('/images/40k-nav-logo.webp')}}" alt="Warhammer 40,000"/>
                <span class="nav_link_text">Warhammer 40,000</span></a>
            </li>
            <li class="px-5">
                <a href="{{ route('paints') }}" class="p-3"><img src="{{url('/images/peintures.jpg')}}" alt="Peintures"/>
                <span class="nav_link_text">Peintures</span></a>
            </li>
        </ul>
    </div>
</nav>