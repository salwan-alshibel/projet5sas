@extends('dashboard.dashboard_template')

@section('dashboard-content')


<div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">

<div class="lessDarkable bg-white rounded-lg  ">

	<div class="max-h-96 mx-auto md:max-w-md px-6 py-12 relative w-full">
		<h1 class="text-2xl font-bold mb-8">Nom</h1>
		<form id='changeName' action="{{ route('dashboard.modifier-profil', ['id'=>auth()->user()]) }}" class="dashboardForm" method="POST">
			@csrf
			<div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="name"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0">Nom</label>
				<span class="text-sm text-red-600 hidden" id="error">Un nom est obligatoire</span>
			</div>

			@error('name')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
            @enderror

			<button
			type="submit"
			form="changeName"
			class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
			>
			Valider
			</button>
		</form>
	</div>
		<div class="max-h-96 mx-auto md:max-w-md px-6 py-12 relative w-full">
		<h1 class="text-2xl font-bold mb-8">Pseudo</h1>

		<form id='changeUsername' action="{{ route('dashboard.modifier-profil', ['id'=>auth()->user()]) }}" class="dashboardForm" method="POST">
			@csrf
	
			<div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="username"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="username" class="absolute duration-300 top-3 -z-1 origin-0">Pseudo</label>
				<span class="text-sm text-red-600 hidden" id="error">Un pseudo est obligatoire</span>
			</div>
			@error('username')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
            @enderror
			<button
			type="submit"
			form="changeUsername"
			class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
			>
			Valider
			</button>
		</form>
		
	</div>
	
	{{-- <div class="max-h-96 mx-auto md:max-w-md px-6 py-12  relative w-full">
			<h1 class="text-2xl font-bold mb-8">Adresse</h1>
			<form class="dashboardForm">
				@csrf
				<div class="relative z-0 w-full mb-5">
					<input
					type="text"
					name="adress_street"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>
					<label for="adress_street" class="absolute duration-300 top-3 -z-1 origin-0">N° et rue</label>
					<span class="text-sm text-red-600 hidden" id="error">Une adresse est obligatoire</span>
				</div>
				<div class="relative z-0 w-full mb-5">
					<input
					type="text"
					name="adress"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>
					<label for="adress" class="absolute duration-300 top-3 -z-1 origin-0">Code postal et Ville</label>
					<span class="text-sm text-red-600 hidden" id="error">Une adresse est obligatoire</span>
				</div>
				<button
				type="submit"
				class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
				>
				Valider
				</button>
			</form>
	</div> --}}

	<div class="max-h-96 mx-auto md:max-w-md px-6 py-12 relative w-full">
		<h1 class="text-2xl font-bold mb-8">Email</h1>
		<form id='changeEmail' action="{{ route('dashboard.modifier-profil', ['id'=>auth()->user()]) }}" class="dashboardForm" method="POST">
			@csrf
			<div class="relative z-0 w-full mb-5">
				<input
				type="email"
				name="email"
				placeholder=" "
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>
				<label for="email" class="absolute duration-300 top-3 -z-1 origin-0">Email</label>
				<span class="text-sm text-red-600 hidden" id="error">L'email est obligatoire</span>
			</div>
			@error('email')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
            @enderror
			<div class="relative z-0 w-full mb-5">
				<input
				type="email"
				name="email_confirmation"
				placeholder=" "
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>
				<label for="email_confirmation" class="absolute duration-300 top-3 -z-1 origin-0">Confirmer Email</label>
				<span class="text-sm text-red-600 hidden" id="error">L'email est obligatoire</span>
			</div>
			@error('email')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
            @enderror
			<button
			type="submit"
			class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
			>
			Valider
			</button>
		</form>
	</div>
</div>

@endsection