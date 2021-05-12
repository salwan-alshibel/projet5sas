{{-- @extends('dashboard.dashboard') --}}
@extends('dashboard.dashboard_template')

@section('dashboard-content')


<div class="min-h-screen bg-outer-space-700 p-0 md:p-12">

    <div class="max-h-96 mx-auto md:max-w-md px-6 py-12 relative w-full text-white">
		<h1 class="text-2xl font-bold mb-8">Mot de passe</h1>
		<form novalidate>
			<div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="name"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0">Mot de passe actuel</label>
				<span class="text-sm text-red-600 hidden" id="error">Un nom est obligatoire</span>
			</div>
	
			<div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="name"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0">Nouveau mot de passe</label>
				<span class="text-sm text-red-600 hidden" id="error">Les mots de passe ne correspondent pas</span>
			</div>
            <div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="name"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0">Confirmer mot de passe</label>
				<span class="text-sm text-red-600 hidden" id="error">Les mots de passe ne correspondent pas</span>
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