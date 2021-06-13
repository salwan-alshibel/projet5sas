@extends('layouts.app')


@section('content')

<div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">
    <div class="lessDarkable bg-white rounded-lg  ">
        <h1 class="p-8 text-2xl font-bold">Commentaires de {{ $user->name }}</h1>
        <div class="border-b border-gray-500 m-auto md:m-0 w-5/6"></div>
        <div class="p-2 md:p-8">
            <p> A écrit {{ $posts->count() }} {{ Str::plural('commentaire', $posts->count()) }} et a reçu {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}
            </p>
        </div>

        <div class="p-0 mt-1 md:p-8">
            @if (auth()->user()->posts->count())
                @foreach ($posts as $post)
                    <div class="darkable border-white rounded-lg shadow-lg flex flex-col p-5 mb-4 items-center">
                        <x-post :post="$post" />
                        <a href="{{ route('product', [$post->product->id, $post->product->slug]) }}" class="pl-4 underline">Voir l'article <i class="fas fa-location-arrow"></i></a>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @else
                <p class="text-xl">{{ $user->name }} n'a pas écrit de commentaires.</p>
            @endif
        </div>
    </div>
</div>

@endsection