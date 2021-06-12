<div class="lessDarkable h-36 lg:h-40 max-h-44 mx-auto md:max-w-md bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
    <a href=" {{ route('dashboard' . $link) }}" class="block hover:underline">
        <div class="flex">
            <img class="max-h-20 w-16 m-3.5 {{$other}}" src="{{ asset('images/dashboard_icons/'. $icon) }}" alt="">
            <h1 class="text-xl font-bold mb-8 pt-2 self-center ">{{$title}}</h1>
        </div>
        <p class="pt-2 pr-4 pb-4 pl-8 lg:pb-7"> {{$content}} </p>
    </a>
</div>