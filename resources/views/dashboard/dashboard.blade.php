@extends('layouts.app')

@section('content')
    @include('dashboard.asideNavbar')

    <section class="dashboard-content">
        @yield('dashboard-content')
    </section>

    {{-- <div class="dashboard-content">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Dashboard
        </div>
    </div> --}}
@endsection
