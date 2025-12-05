@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-green-700 mb-2">Connexion Auteur | Culture Bénin</h1>
            <p class="text-gray-600">Accédez à votre espace auteur</p>
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

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('auteur.login') }}">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-500"
                       placeholder="votre@email.com">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                <input type="password" name="mot_de_passe" required 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-gray-900 placeholder-gray-500"
                       placeholder="Votre mot de passe">
                @error('mot_de_passe')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" 
                    class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-300 shadow-md mb-4">
                Se connecter
            </button>

            <div class="text-center">
                <p class="text-gray-600">
                    Pas encore de compte ? 
                    <a href="{{ route('auteur.register') }}" class="text-green-600 hover:text-green-700 font-semibold">
                        S'inscrire comme auteur
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    /* Assurer que le texte dans les inputs est bien visible */
    input {
        color: #111827 !important; /* gray-900 */
    }
    
    /* Pour le placeholder */
    input::placeholder {
        color: #6B7280 !important; /* gray-500 */
    }
    
    /* Pour le texte déjà saisi */
    input:not(:placeholder-shown) {
        color: #111827 !important;
    }
</style>
@endpush
@endsection