<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titre</title>
</head>
<body class="bg-custom-grey">
    <nav class="p-6 bg-white flex flex-col justify-between mb-6">
        <div class="mb-6 flex justify-between">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="p-3">Accueil</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="p-3">Posts</a>
                </li>
            </ul>
             
            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
    
                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Register</a>
                    </li>
                @endguest
            </ul>

        </div>
        <div class="flex justify-center">
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
    @yield('content')
</body>
</html>