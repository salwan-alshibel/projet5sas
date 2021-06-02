{{-- @extends('dashboard.dashboard') --}}
@extends('dashboard.dashboard_template')

@section('dashboard-content')

<div class="darkable min-h-screen bg-dusty-gray-200 p-0 md:p-12">
    <div class="lessDarkable bg-white rounded-lg  ">
        <div class="mx-auto md:max-w-md px-6 py-12 relative w-full">
            <h1 class="text-2xl font-bold mb-8">Mot de passe</h1>
            <form id='changePwd' action="{{ route('dashboard.updatePassword', ['id'=>auth()->user()]) }}" class="dashboardForm" method="POST">
				@csrf
                <div class="relative z-0 w-full mb-5">
                    <input type="password" name="old_password" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />

                    <label for="old_password" class="absolute duration-300 top-3 -z-1 origin-0">Mot de passe actuel</label>
                    <span class="text-sm text-red-600 hidden" id="error">Un nom est obligatoire</span>
                </div>
                <div class="text-red-500 mt-2 text-sm">
					{{ session('old_pwd_error') }}
				</div>
                <div class="text-green-500 mt-2 text-sm">
					{{ session('new_pwd_succes') }}
				</div>

                <div class="relative z-0 w-full mb-5">
                    <input type="password" name="new_password" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />

                    <label for="new_password" class="absolute duration-300 top-3 -z-1 origin-0">Nouveau mot de passe</label>
                    <span class="text-sm text-red-600 hidden" id="error">Les mots de passe ne correspondent pas</span>
                </div>

				@error('new_password_confirmation')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
            	@enderror


                <div class="relative z-0 w-full mb-5">
                    <input type="password" name="new_password_confirmation" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />

                    <label for="new_password_confirmation" class="absolute duration-300 top-3 -z-1 origin-0">Confirmer mot de passe</label>
                    <span class="text-sm text-red-600 hidden" id="error">Les mots de passe ne correspondent pas</span>
                </div>

				@error('new_password_confirmation')
				<div class="text-red-500 mt-2 text-sm">
					{{ $message }}
				</div>
            	@enderror
				
                <button id="button" type="submit" form="changePwd"
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none">
                    Valider
                </button>
            </form>
        </div>
    </div>
</div>


@endsection
