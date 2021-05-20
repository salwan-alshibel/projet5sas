@extends('dashboard.dashboard_template')

@section('dashboard-content')


<div class="min-h-screen bg-outer-space-700 p-0 md:p-12">

    <div class="max-h-96 mx-auto md:max-w-md px-6 py-12 relative w-full text-white">
        <div class="flex justify-center">
            <div class="w-8/12">
                <div class="p-6">
                    <h1 class="text-2xl font-medium mb-1">{{  auth()->user()->name }}</h1>
                    <p> Vous avez écrit {{ auth()->user()->posts->count() }} {{ Str::plural('commentaire', auth()->user()->posts->count()) }} et reçu {{ auth()->user()->receivedLikes->count() }} {{ Str::plural('like', auth()->user()->receivedLikes->count()) }}</p>
                </div>
    
    
                <div class="p-6 rounded-lg">
                    @if (auth()->user()->posts->count())

                        {{--@foreach ((auth()->user()->posts as $post))
                            <div class="border-white border-solid border-t">
                            <x-post :post="$post" /> 
                            </div>
                        @endforeach --}}

                        @foreach ($posts as $post)
                            <div class="border-white border-solid border-t">
                               <x-post :post="$post" /> 
                            </div>
                            
                        @endforeach
                        
                    @else
                        <p>Vous n'avez pas encore écrit de commentaire.</p>
                    @endif
                </div>
            </div>
        </div>
	</div>
</div>
    

@endsection