@extends('dashboard.dashboard')


@section('dashboard-content')


<div class="min-h-screen bg-outer-space-700 p-0 md:p-12 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-px md:gap-6">

    <div class="max-h-96 mx-auto md:max-w-md px-6 py-12 bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
        <a href="" class="flex flex-row">
            <img src="{{url('/images/img_placeholder.svg')}}" alt="" class="max-h-20" />
            <h1 class="text-2xl font-bold mb-8">Modifier mon profil</h1>
            <p> Modifier mon nom, prénom, adresse et email...</p>
        </a>
    </div>
</div>
    

    


@endsection