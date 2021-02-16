{{-- @extends('master')


@section('title', 'Homepage')


@section('content')

 Recent Messages:

 <ul>
    @foreach($messages as $message)

        <li>{{ $message->title }} : {{ $message->content }}</li>

    @endforeach
 </ul>
     

@endsection
 --}}


@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Home
        </div>
    </div>
@endsection
