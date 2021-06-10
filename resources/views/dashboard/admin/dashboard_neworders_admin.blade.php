@extends('dashboard.dashboard_template')

@section('dashboard-content')


<div class="min-h-screen bg-outer-space-700 p-0 md:p-12 text-white">

      <form onsubmit="return false" id="search-form" action="{{route ('products.search')}}" method="POST">
          <input type="text" name="searchInput" id="search-input" class="text-black" maxlength="99" placeholder="Rechercher un article...">
          <input type="hidden" name="_token" id="token-input" value="{{ csrf_token() }}" />
          {{-- <button type="submit" class="ml-8 px-4 border rounded-lg"> Rechercher </button> --}}
      </form>

      <div id="search-result-div" class="py-8">
      </div>



      <div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">
        <div class="lessDarkable bg-white rounded-lg  ">
            <div class="mx-auto md:max-w-md px-6 py-12 relative w-full">
                <div class="flex justify-center">
                    <div class="w-8/12">
                        <div class="p-6">
                            <h1 class="text-2xl font-medium mb-1">Commandes à envoyer</h1>
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

      

</div>












<script>

 const form = document.getElementById('search-form');

 form.addEventListener('keyup', function(e) {
     e.preventDefault();

     //const token = document.querySelector('meta[name="csrf-token"]').content;
     const url = this.getAttribute('action');
     const searchValue = document.getElementById('search-input').value;
     const token = document.getElementById('token-input').value;
        
    if(searchValue !== '') {
        fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            method: 'post',
            body: JSON.stringify({
                searchValueForController: searchValue
            })
        }).then(response => {
            // console.log(response);
            response.json().then(data => {
                // console.log(Object.entries(data));

                const searchResultDiv = document.getElementById('search-result-div');
                searchResultDiv.innerHTML = '';

                Object.entries(data)[0][1].forEach(element => {
                    searchResultDiv.innerHTML += `<a href="http://projet5sas/product/${element.id}/${element.slug}" class='block p-2 border border-solid border-gray-400 max-w-max rounded-lg bg-white text-black hover:bg-blue-500 hover:text-white'>${element.title}</a>`
                });
            })
        }).catch(error => {
            console.log(error);
        })
    }

 })

















</script>


@endsection