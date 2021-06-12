{{-- @extends('dashboard.dashboard') --}}
@extends('dashboard.dashboard_template')

@section('dashboard-content')

<div class="h-screen">
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
</div>
</div>
@endsection