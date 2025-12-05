@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 text-center">
        <!-- Icône de confirmation -->
        <div class="mb-6">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- Message de confirmation -->
        <h1 class="text-3xl font-bold text-green-700 mb-4">Inscription Soumise !</h1>
        
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
            <p class="text-lg text-blue-800 mb-4">
                <strong>Votre inscription a été reçue avec succès !</strong>
            </p>
            <p class="text-gray-700 mb-2">
                Votre compte auteur est actuellement <span class="font-semibold text-orange-600">en attente de validation</span> par notre équipe administrative.
            </p>
            <p class="text-gray-700">
                Vous recevrez un email de confirmation une fois votre compte validé.
            </p>
        </div>

        <!-- Informations supplémentaires -->
        <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <h3 class="font-semibold text-gray-800 mb-2">📋 Prochaines étapes :</h3>
            <ul class="text-left text-gray-600 space-y-2">
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">✓</span>
                    Votre inscription a été enregistrée
                </li>
                <li class="flex items-start">
                    <span class="text-blue-600 mr-2">⏳</span>
                    Validation en cours par l'administration
                </li>
                <li class="flex items-start">
                    <span class="text-purple-600 mr-2">📧</span>
                    Réception d'un email de confirmation
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">🚀</span>
                    Accès à votre espace auteur après validation
                </li>
            </ul>
        </div>

        <!-- Bouton de connexion -->
        <div class="space-y-4">
            <p class="text-gray-600">
                Une fois votre compte validé, vous pourrez vous connecter et commencer à publier vos histoires.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('auteur.login') }}" 
                   class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-300 shadow-md">
                    Se connecter
                </a>
                <a href="{{ route('a_propos') }}" 
                   class="border border-green-600 text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-50 transition-colors duration-300">
                    Retour aux histoires
                </a>
            </div>

            <p class="text-sm text-gray-500 mt-4">
                Vous avez des questions ? 
                <a href="mailto:contact@benin-contes.com" class="text-green-600 hover:text-green-700">
                    Contactez-nous
                </a>
            </p>
        </div>
    </div>
</div>
@endsection