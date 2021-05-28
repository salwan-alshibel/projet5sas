<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Figurine & Co</title>
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet"> 
    </head>


    <body class="bg-mine-shaft-500 dark:bg-00DP work-sans m-auto">

        <div id="main-container">
            @include('layouts.nav')

            <section id="main-content" class="pt-24 sm:pt-32 md:pt-36">
                @yield('content')
            </section>

            @include('layouts.footer') 
        </div>

        {{-- <script src="{{asset('js/carousel.js')}}"></script> --}}
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/custom.js')}}"></script>

    </body>

</html>