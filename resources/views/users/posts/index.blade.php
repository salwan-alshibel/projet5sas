@extends('layouts.app')


@section('content')
    <div class="flex justify-center">
        <div class="w-8/12">
            <div class="p-6">
                <h1 class="text-2xl font-medium mb-1">{{ $user->name }}</h1>
                <p> A écrit {{ $posts->count() }} {{ Str::plural('commentaire', $posts->count()) }} et a reçu {{ $user->receivedLikes->count() }} {{ Str::plural('like', $user->receivedLikes->count()) }}</p>
            </div>


            <div class="bg-white p-6 rounded-lg">
                @if ($posts->count())
                    @foreach ($posts as $post)
                        <x-post :post="$post" />
                    @endforeach

                    {{ $posts->links() }}
                    {{ $posts }}
                @else
                    <p>{{ $user->name }} n'a pas écrit de commentaires.</p>
                @endif
            </div>
        </div>
    </div>
@endsection