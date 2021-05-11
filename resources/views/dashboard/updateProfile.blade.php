@extends('dashboard.dashboard')


@section('dashboard-content')



    {{-- <div class="w-8/12 bg-white p-6 rounded-lg">
        Modifier profil
        <div>Modifier votre nom :
            <form action="" method="post" name="changeNameForm" class="default-form">
                <div class="form-group">
                    <label for="changeName">Nom</label>
                    <input type="hidden" name="id" value="" />
                    <input type="hidden" name="modifyType" value="modifyName" />
                    <input type="text" name="newName" class="form-control" id="changeName" placeholder="" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div> --}}

<style>
	.-z-1 {
		z-index: -1;
	}

	.origin-0 {
		transform-origin: 0%;
	}

	input:focus ~ label,
	input:not(:placeholder-shown) ~ label,
	textarea:focus ~ label,
	textarea:not(:placeholder-shown) ~ label,
	select:focus ~ label,
	select:not([value='']):valid ~ label {
		/* @apply transform; scale-75; -translate-y-6; */
		--tw-translate-x: 0;
		--tw-translate-y: 0;
		--tw-rotate: 0;
		--tw-skew-x: 0;
		--tw-skew-y: 0;
		transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
		skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
		--tw-scale-x: 0.75;
		--tw-scale-y: 0.75;
		--tw-translate-y: -1.5rem;
	}

	input:focus ~ label,
	select:focus ~ label {
		/* @apply text-black; left-0; */
		--tw-text-opacity: 1;
		color: rgba(0, 0, 0, var(--tw-text-opacity));
		left: 0px;
	}
</style>

<div class="min-h-screen bg-outer-space-700 p-0 md:p-12 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-px md:gap-6">

	<div class="max-h-96 mx-auto md:max-w-md px-6 py-12 bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
		<h1 class="text-2xl font-bold mb-8">Nom - Prénom</h1>
		<form novalidate>
			<div class="relative z-0 w-full mb-5">
				<input
				type="text"
				name="name"
				placeholder=" "
				required
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nom</label>
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

				<label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Prénom</label>
				<span class="text-sm text-red-600 hidden" id="error">Un prénom est obligatoire</span>
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
	
	<div class="max-h-96 mx-auto md:max-w-md px-6 py-12 bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
			<h1 class="text-2xl font-bold mb-8">Adresse</h1>
			<form novalidate>
				<div class="relative z-0 w-full mb-5">
					<input
					type="text"
					name="adress"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>
					<label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">N° et rue</label>
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
					<label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Code postal et Ville</label>
					<span class="text-sm text-red-600 hidden" id="error">Une adresse est obligatoire</span>
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

	<div class="max-h-96 mx-auto md:max-w-md px-6 py-12 bg-white border-0 shadow-lg md:rounded-3xl relative w-full">
		<h1 class="text-2xl font-bold mb-8">Email</h1>
		<form novalidate>
			<div class="relative z-0 w-full mb-5">
				<input
				type="email"
				name="email"
				placeholder=" "
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>
				<label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Email</label>
				<span class="text-sm text-red-600 hidden" id="error">L'email est obligatoire</span>
			</div>
			<div class="relative z-0 w-full mb-5">
				<input
				type="email"
				name="email"
				placeholder=" "
				class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
				/>
				<label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Confirmer Email</label>
				<span class="text-sm text-red-600 hidden" id="error">L'email est obligatoire</span>
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





{{-- <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
    <h1 class="text-2xl font-bold mb-8">Modifier mes informations</h1>
    <form id="form" novalidate>
        
        <div class="relative z-0 w-full mb-5">
            <input
            type="text"
            name="name"
            placeholder=" "
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nom</label>
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
            <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Prénom</label>
            <span class="text-sm text-red-600 hidden" id="error">Un prénom est obligatoire</span>
        </div>




        <div class="relative z-0 w-full mb-5">
            <input
            type="text"
            name="adress"
            placeholder=" "
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Adresse</label>
            <span class="text-sm text-red-600 hidden" id="error">Une adresse est obligatoire</span>
        </div>

        <div class="relative z-0 w-full mb-5">
            <input
            type="email"
            name="email"
            placeholder=" "
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Email</label>
            <span class="text-sm text-red-600 hidden" id="error">L'email est obligatoire</span>
        </div>

        <div class="relative z-0 w-full mb-5">
            <input
            type="password"
            name="password"
            placeholder=" "
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="password" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Mot de passe</label>
            <span class="text-sm text-red-600 hidden" id="error">Le mot de passe est obligatoire</span>
        </div>

        <fieldset class="relative z-0 w-full p-px mb-5">
            <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Options</legend>
            <div class="block pt-3 pb-2 space-x-4">
            <label>
                <input
                type="radio"
                name="radio"
                value="1"
                class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
                />
                Option 1
            </label>
            <label>
                <input
                type="radio"
                name="radio"
                value="2"
                class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"
                />
                Option 2
            </label>
            </div>
            <span class="text-sm text-red-600 hidden" id="error">L'option est obligatoire</span>
        </fieldset>

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
            <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Select an option</label>
            <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
        </div>

        <div class="flex flex-row space-x-4">
            <div class="relative z-0 w-full mb-5">
            <input
                type="text"
                name="date"
                placeholder=" "
                onclick="this.setAttribute('type', 'date');"
                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="date" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Date de naissance</label>
            <span class="text-sm text-red-600 hidden" id="error">Entrez une date de naissance</span>
            </div>
            <div class="relative z-0 w-full">
            <input
                type="text"
                name="time"
                placeholder=" "
                onclick="this.setAttribute('type', 'time');"
                class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
            />
            <label for="time" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Time</label>
            <span class="text-sm text-red-600 hidden" id="error">Time is required</span>
            </div>
        </div>

      <div class="relative z-0 w-full mb-5">
        <input
          type="number"
          name="money"
          placeholder=" "
          class="pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <div class="absolute top-0 left-0 mt-3 ml-1 text-gray-400">$</div>
        <label for="money" class="absolute duration-300 top-3 left-5 -z-1 origin-0 text-gray-500">Amount</label>
        <span class="text-sm text-red-600 hidden" id="error">Amount is required</span>
      </div>

      <div class="relative z-0 w-full mb-5">
        <input
          type="text"
          name="duration"
          placeholder=" "
          class="pt-3 pb-2 pr-12 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
        />
        <div class="absolute top-0 right-0 mt-3 mr-4 text-gray-400">min</div>
        <label for="duration" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Duration</label>
        <span class="text-sm text-red-600 hidden" id="error">Duration is required</span>
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
</div> --}}

<script>
	'use strict'

	document.getElementById('button').addEventListener('click', toggleError)
	const errMessages = document.querySelectorAll('#error')

	function toggleError() {
		// Show error message
		errMessages.forEach((el) => {
		el.classList.toggle('hidden')
		})

		// Highlight input and label with red
		const allBorders = document.querySelectorAll('.border-gray-200')
		const allTexts = document.querySelectorAll('.text-gray-500')
		allBorders.forEach((el) => {
		el.classList.toggle('border-red-600')
		})
		allTexts.forEach((el) => {
		el.classList.toggle('text-red-600')
		})
	}
</script>


@endsection