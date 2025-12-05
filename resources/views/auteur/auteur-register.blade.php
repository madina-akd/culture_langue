@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-green-700 mb-2">Devenir Auteur</h1>
            <p class="text-gray-600">Créez votre compte pour partager vos histoires et contes</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('auteur.register') }}">
            @csrf
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                    <input type="text" name="prenom" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-500"
                           placeholder="Votre prénom">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                    <input type="text" name="nom" required 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-500"
                           placeholder="Votre nom">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-500"
                       placeholder="votre@email.com">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Sexe</label>
                <select name="sexe" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900">
                    <option value="">Sélectionnez</option>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
            </div>

            

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                <input type="password" name="mot_de_passe" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-500"
                       placeholder="Minimum 8 caractères">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                <input type="password" name="mot_de_passe_confirmation" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-500"
                       placeholder="Confirmez votre mot de passe">
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-300 shadow-md">
                Créer mon compte auteur
            </button>

            <div class="text-center mt-4">
                <p class="text-gray-600">
                    Déjà inscrit ? 
                    <a href="{{ route('auteur.login') }}" class="text-green-600 hover:text-green-700 font-semibold">
                        Se connecter
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    /* Assurer que tout le texte dans les formulaires est bien visible */
    input, select {
        color: #111827 !important; /* gray-900 */
        background-color: white !important;
    }
    
    /* Pour les placeholders */
    input::placeholder {
        color: #6B7280 !important; /* gray-500 */
    }
    
    /* Pour le texte déjà saisi */
    input:not(:placeholder-shown) {
        color: #111827 !important;
    }
    
    /* Pour les selects */
    select {
        color: #111827 !important;
    }
    
    /* Option par défaut du select */
    select option:first-child {
        color: #6B7280; /* gray-500 pour l'option vide */
    }
    
    /* Options normales */
    select option:not(:first-child) {
        color: #111827; /* gray-900 */
    }
</style>
@endpush
@endsection