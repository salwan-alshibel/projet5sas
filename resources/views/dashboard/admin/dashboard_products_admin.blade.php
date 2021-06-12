{{-- @extends('dashboard.dashboard') --}}
@extends('dashboard.dashboard_template')

@section('dashboard-content')


<div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">
	<div class="lessDarkable bg-white rounded-lg  ">
		<div class="mx-auto md:max-w-md px-6 py-12 relative w-full">
			<h1 class="text-2xl font-bold mb-8">Ajouter un produit</h1>
			<form id='addProduct' action="{{ route('addProduct', ['id'=>auth()->user()]) }}" class="dashboardForm" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="relative z-0 w-full mb-5">
					<input
					type="text"
					name="title"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					<label for="title" class="absolute duration-300 top-3 -z-1 origin-0">Titre</label>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('title')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror
		
				<div class="relative z-0 w-full mb-5">
					<label for="content" class="py-5 block">Description du produit  :</label>
					<textarea name="content" id="" class="pt-3 pb-2 block w-full px-0 mt-0 bg-white border border-solid border-black text-black" cols="30" rows="10" required></textarea>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('content')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror

				<div class="relative z-0 w-full mb-5">
					<label for="summary" class="py-5 block ">Détails :</label>
					<textarea name="summary" id="" class="pt-3 pb-2 block w-full px-0 mt-0 bg-white border border-solid border-black text-black" cols="30" rows="10" required></textarea>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('summary')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror

				<div class="relative z-0 w-full mb-5">
					<input
					type="text"
					name="slug"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					<label for="slug" class="absolute duration-300 top-3 -z-1 origin-0">Slug (nom dans l'URL)</label>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('slug')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror

				<div class="relative z-0 w-full mb-5">
					<input
					type="text"
					name="quantity"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					<label for="quantity" class="absolute duration-300 top-3 -z-1 origin-0">Quantité</label>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('quantity')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror

				<div class="relative z-0 w-full mb-5">
					<input
					type="text"
					name="price"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					<label for="price" class="absolute duration-300 top-3 -z-1 origin-0">Prix HT</label>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('price')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror


				<div class="relative z-0 w-full mb-5">
					<select
					name="category_id"
					value=""
					onclick="this.setAttribute('value', this.value);"
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					>
					<option value="" selected disabled hidden></option>
					<option value="4">Wahrammer age of sigmar - Order</option>
					<option value="5">Wahrammer age of sigmar - Chaos</option>
					<option value="6">Wahrammer age of sigmar - Death</option>

					<option value="7">Wahrammer 40 000 - Space Marines</option>
					<option value="8">Wahrammer 40 000 - Imperium</option>
					<option value="9">Wahrammer 40 000 - Chaos Armies</option>

					<option value="10">Peintures et Accessoires - Peintures</option>
					<option value="11">Peintures et Accessoires - Pinceaux</option>
					<option value="12">Peintures et Accessoires - Accessoires</option>

					</select>
					<label for="category_id" class="absolute duration-300 top-3 -z-1 origin-0">Catégorie</label>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('category_id')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror

				<div class="relative z-0 w-full mb-5">
					<select
					name="tag_id"
					value=""
					onclick="this.setAttribute('value', this.value);"
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					>
					<option value="" selected disabled hidden></option>
					<option value="1">#Nouveauté</option>
					<option value="2">#Promo</option>
					<option value="3">#Carrousel</option>
					</select>
					<label for="tag_id" class="absolute duration-300 top-3 -z-1 origin-0">Tag (seulement si nécessaire)</label>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('tag')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror

				<div class="relative z-0 w-full mb-5">
					<select
					name="shop"
					value=""
					onclick="this.setAttribute('value', this.value);"
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					>
					<option value="" selected disabled hidden></option>
					<option value="1">Oui</option>
					<option value="0">Non</option>
					</select>
					<label for="shop" class="absolute duration-300 top-3 -z-1 origin-0">Mettre en ligne ?</label>
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				<div class="relative z-0 w-full mb-5">
					<input
					type="file"
					name="first_img"
					placeholder=" "
					required
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					<label for="first_img" class="absolute duration-300 top-3 -z-1 origin-0">Images (Insérer au moins une image)</label>
					<input
					type="file"
					name="second_img"
					placeholder=" "
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					
					<input
					type="file"
					name="third_img"
					placeholder=" "
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					
					<input
					type="file"
					name="fourth_img"
					placeholder=" "
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					
					<input
					type="file"
					name="fifth_img"
					placeholder=" "
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>

					<input
					type="file"
					name="sixth_img"
					placeholder=" "
					class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
					/>
					
					<span class="text-sm text-red-600 hidden" id="error">Ce champ est obligatoire</span>
				</div>

				@error('price')
					<div class="text-red-500 mt-2 text-sm">
						{{ $message }}
					</div>
           		@enderror

				<button
				id="button"
				type="submit"
				form="addProduct"
				class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
				>
				Valider
				</button>
			</form>
		</div>
	</div>
</div>

@endsection