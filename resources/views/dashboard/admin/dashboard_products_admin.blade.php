{{-- @extends('dashboard.dashboard') --}}
@extends('dashboard.dashboard_template')

@section('dashboard-content')


<div class="min-h-screen bg-outer-space-700 p-0 md:p-12 text-white">

	<div class="max-h-96 mx-auto md:max-w-md px-6 py-12 relative w-full">
		<h1 class="text-2xl font-bold mb-8">Ajouter un produit</h1>
		<form class="dashboardForm">
			<div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="name"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0">Titre</label>
				<span class="text-sm text-red-600 hidden" id="error">Un titre est obligatoire</span>
			</div>
	
			<div class="relative z-0 w-full mb-5">
				<label for="description" class="py-5 block">Description du produit  :</label>
                <textarea name="description" id="" class="pt-3 pb-2 block w-full px-0 mt-0 bg-white border-0 border-b-2 text-black" cols="30" rows="10" required></textarea>
				<span class="text-sm text-red-600 hidden" id="error">Un prénom est obligatoire</span>
			</div>

            <div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="name"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0">Prix</label>
				<span class="text-sm text-red-600 hidden" id="error">Un prix est obligatoire</span>
			</div>


            <div class="relative z-0 w-full mb-5">
                <select
                name="select"
                value=""
                onclick="this.setAttribute('value', this.value);"
                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                >
                <option value="" selected disabled hidden></option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
                <option value="5">Option 5</option>
                </select>
                <label for="select" class="absolute duration-300 top-3 -z-1 origin-0">Catégorie</label>
                <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
            </div>





			<button
			id="button"
			type="button"
			class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
			>
			Valider
			</button>
		</form>
	</div>
</div>

@endsection