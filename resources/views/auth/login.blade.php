@extends('layouts.app')


@section('content')
<div class="darkable relative min-h-screen bg-dusty-gray-200">
    <div class="flex justify-center absolute w-full top-20 ">
        
        <div class="lessDarkable w-full md:bg-white p-6 md:rounded-lg max-w-lg">

            @if (session('status'))
            <div class="bg-red-500 p-4 rounded-lg mb-6 text-center">
                {{ session('status') }}
            </div>
            @endif

            <div class="mb-12 text-xl font-bold">
                Veuillez vous identifier :
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="mb-4 text-black">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4 text-black">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                        value="">

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="">
                        <input type="checkbox" name="remember" id="remember" class="mr-2 ">
                        <label for="remember" class="">Se souvenir de moi</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Se
                        connecter</button>
                </div>
            </form>
            <div class="p-4">Vous n'avez pas encore de compte ?
                
                <a class="underline text-blue-500 hover:text-blue-400 hover:underline py-2 px-4" href="{{ route('register') }}"><i class="fas fa-arrow-right transform scale-75"></i>S'enregister
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
