@extends('dashboard.dashboard_template')

@section('dashboard-content')

<div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">
    <div class="lessDarkable bg-white rounded-lg  ">
        <h1 class="p-8 text-2xl font-bold">Vos commentaires :</h1>
        <div class="border-b border-gray-500 w-5/6"></div>
        <div class="p-8">
            <p> Vous avez écrit {{ auth()->user()->posts->count() }}
                {{ Str::plural('commentaire', auth()->user()->posts->count()) }} et reçu
                {{ auth()->user()->receivedLikes->count() }}
                {{ Str::plural('like', auth()->user()->receivedLikes->count()) }}.
            </p>
        </div>

        <div class="p-8">
            @if (auth()->user()->posts->count())
                @foreach ($posts as $post)
                    <div class="border-white border-solid border-t rounded-lg shadow-lg flex flex-col p-5 mb-4">
                        <x-post :post="$post" />
                        <a href="{{ route('product', [$post->product->id, $post->product->slug]) }}" class="pl-4 underline">Voir l'article <i class="fas fa-location-arrow"></i></a>
                    </div>
                @endforeach
                {{ $posts->links() }}
            @endif
        </div>
    </div>
</div>

@endsection
