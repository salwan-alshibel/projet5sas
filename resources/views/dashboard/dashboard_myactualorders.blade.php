@extends('dashboard.dashboard_template')

@section('dashboard-content')

<div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">
    <div class="lessDarkable bg-white rounded-lg  ">
        <div class="mx-auto md:max-w-md px-6 py-12 relative w-full">
            <div class="flex justify-center">
                <div class="w-8/12">
                    <div class="p-6">
                        <h1 class="text-2xl font-medium mb-1">Mes commandes</h1>
                    </div>
                    @foreach ($orders as $order)
                        <div class="p-6 rounded-lg">
                            <ul>
                                @foreach ($order->cart->products as $product)
                                <li>
                                    <p>{{$product['product']['title']}} </p>
                                    <p>{{$product['qty']}} </p>
                                    <p>{{$product['price']}} €</p></li>
                                @endforeach
                            </ul>
                            {{-- {{ $posts->links() }} --}}
                        </div>
                        <div>
                            Total : {{$order->cart->totalPrice}} €
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection