@extends('layouts.app')

@section('content')

    @include('dashboard.dashboard_aside_nav')
    
    <section class="dashboard-content bg-dusty-gray-200">
        @yield('dashboard-content')
    </section>

@endsection
