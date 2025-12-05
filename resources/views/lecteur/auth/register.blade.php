@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Inscription Lecteur
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Rejoignez notre communauté de lecteurs
            </p>
        </div>
        
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <ul class="list-disc list-inside text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form class="mt-8 space-y-6" action="{{ route('lecteur.register') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input id="nom" name="nom" type="text" required 
                               class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm"
                               placeholder="Votre nom">
                    </div>
                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                        <input id="prenom" name="prenom" type="text" required 
                               class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm"
                               placeholder="Votre prénom">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required 
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm"
                           placeholder="exemple@email.com">
                </div>
                
                <div class="mb-4">
                    <label for="sexe" class="block text-sm font-medium text-gray-700 mb-1">Sexe</label>
                    <select id="sexe" name="sexe" required 
                            class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm">
                        <option value="">Sélectionnez</option>
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Feminin</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input id="mot_de_passe" name="mot_de_passe" type="password" autocomplete="new-password" required 
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm"
                           placeholder="Minimum 8 caractères">
                </div>
                
                <div class="mb-4">
                    <label for="mot_de_passe_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmation</label>
                    <input id="mot_de_passe_confirmation" name="mot_de_passe_confirmation" type="password" autocomplete="new-password" required 
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm"
                           placeholder="Confirmez votre mot de passe">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                    S'inscrire
                </button>
            </div>
            
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Vous avez déjà un compte ? 
                    <a href="{{ route('lecteur.login') }}" class="font-medium text-amber-600 hover:text-amber-500">
                        Connectez-vous
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection