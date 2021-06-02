{{-- @extends('dashboard.dashboard') --}}
@extends('dashboard.dashboard_template')

@section('dashboard-content')


<div class="darkable gridcontainer bg-dusty-gray-200 p-0 md:p-12 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-px md:gap-6">
    
    <?php
        $link = '.modifier-profil';
        $title = 'Modifier mon profil';
        $content = 'Modifier votre nom, prénom, adresse et email...';
        $icon = 'helmet.png';
        $other = '';
    ?>
    <x-dashboardCard :link="$link" :title="$title" :content="$content" :icon="$icon" :other="$other"/>

    <?php
        $link = '.updatePassword';
        $title = 'Modifier mon mot de passe';
        $content = 'Modifier votre mot de passe';
        $icon = 'gate.png';
        $other = '';
    ?>
    <x-dashboardCard :link="$link" :title="$title" :content="$content" :icon="$icon" :other="$other"/>

    <?php
        $link = '.myActualOrders';
        $title = 'Mes commandes en cours';
        $content = 'Voir mes commandes en cours.';
        $icon = 'spellbook.png';
        $other = '';
    ?>
    <x-dashboardCard :link="$link" :title="$title" :content="$content" :icon="$icon" :other="$other"/>

    <?php
        $link = '.myOldOrders';
        $title = 'Mes anciennes commandes';
        $content = 'Voir mes anciennes commandes.';
        $icon = 'spellbook.png';
        $other = 'filter hue-rotate-180';
    ?>
    <x-dashboardCard :link="$link" :title="$title" :content="$content" :icon="$icon" :other="$other"/>

    <?php
        $link = '.myPosts';
        $title = 'Mes commentaires';
        $content = 'Voir mes commentaires.';
        $icon = 'writing.png';
        $other = '';
    ?>
    <x-dashboardCard :link="$link" :title="$title" :content="$content" :icon="$icon" :other="$other"/>

{{-- 
    <div class="max-h-44 mx-auto md:max-w-md bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
        <a href=" {{ route('dashboard.modifier-profil') }}" class="block hover:underline">
            <img src="{{url('/images/img_placeholder.svg')}}" alt="" class="max-h-20 float-left" />
            <h1 class="text-2xl font-bold mb-8 pt-2 text-center">Modifier mon profil</h1>
            <p class="pt-4"> Modifier votre nom, prénom, adresse et email...</p>
        </a>
    </div>

    <div class="max-h-44 mx-auto md:max-w-md bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
        <a href="" class="block hover:underline">
            <img src="{{url('/images/img_placeholder.svg')}}" alt="" class="max-h-20 float-left" />
            <h1 class="text-2xl font-bold mb-8 pt-2 text-center">Modifier mot de passe</h1>
            <p class="pt-4"> Modifier votre mot de passe.</p>
        </a>
    </div>


    <div class="max-h-44 mx-auto md:max-w-md bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
        <a href="" class="block hover:underline">
            <img src="{{url('/images/img_placeholder.svg')}}" alt="" class="max-h-20 float-left" />
            <h1 class="text-2xl font-bold mb-8 pt-2 text-center">Mes commandes</h1>
            <p class="pt-4">Voir mes commandes en cours ou terminées.</p>
        </a>
    </div>

    <div class="max-h-44 mx-auto md:max-w-md bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
        <a href="" class="block hover:underline">
            <img src="{{url('/images/img_placeholder.svg')}}" alt="" class="max-h-20 float-left" />
            <h1 class="text-2xl font-bold mb-8 pt-2 text-center">Mes commentaires</h1>
            <p class="pt-4">Voir mes commentaires.</p>
        </a>
    </div>
</div> --}}
    

    


@endsection