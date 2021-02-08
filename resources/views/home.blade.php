@extends('master')


@section('title', 'Homepage')


@section('content')

 Recent Messages:

 <ul>
    @foreach($messages as $message)

        <li>{{ $message->title }} : {{ $message->content }}</li>

    @endforeach
 </ul>
     

@endsection

