@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="p-8">
            <!-- En-tête -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-amber-800">Accéder à la tradition complète</h2>
                <p class="text-gray-600 mt-2">{{ $contenu->titre }}</p>
                @if($contenu->auteur)
                    <p class="text-sm text-gray-500 mt-1">Par {{ $contenu->auteur->name }}</p>
                @endif
            </div>

            <!-- Messages d'erreur/succès -->
            @if(session('error'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Information sur le prix -->
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-6">
                <div class="flex items-center justify-between">
                    <span class="text-gray-700">Prix d'accès:</span>
                    <span class="text-2xl font-bold text-amber-700">{{ number_format(env('FEDAPAY_PRICE_TRADITION', 600), 0, ',', ' ') }} FCFA</span>
                </div>
                <p class="text-sm text-gray-500 mt-2">
                    <i class="fas fa-shield-alt mr-1"></i>
                    Paiement sécurisé via FedaPay
                </p>
            </div>

            <!-- Formulaire de paiement -->
            <form action="{{ route('paiement.tradition.process', $contenu->id) }}" method="POST" id="payment-form">
                @csrf
                
                <div class="space-y-4">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            required 
                            value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-amber-500 focus:border-amber-500 transition duration-150"
                            placeholder="votre@email.com"
                            aria-label="Adresse email pour la transaction"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Téléphone -->
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">
                            Numéro de téléphone <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="tel" 
                            name="telephone" 
                            id="telephone" 
                            required 
                            value="{{ old('telephone', auth()->check() ? auth()->user()->telephone : '') }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-amber-500 focus:border-amber-500 transition duration-150"
                            placeholder="Ex: 66000001"
                            pattern="[0-9]{8,15}"
                            title="Veuillez entrer un numéro de téléphone valide"
                            aria-label="Numéro de téléphone pour la transaction"
                        >
                        <p class="mt-1 text-xs text-gray-500">Format: 8 à 15 chiffres</p>
                        @error('telephone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bouton de paiement -->
                    <div class="pt-4">
                        <button 
                            type="submit" 
                            id="submit-button"
                            class="w-full bg-amber-600 text-white py-3 px-4 rounded-md hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition duration-150 flex items-center justify-center"
                            onclick="this.disabled=true;this.innerHTML='<i class=\'fas fa-spinner fa-spin mr-2\'></i> Traitement en cours...';this.form.submit();"
                        >
                            <i class="fas fa-lock mr-2"></i>
                            Payer maintenant
                        </button>
                    </div>
                </div>
            </form>

            <!-- Informations complémentaires -->
            <div class="mt-6 space-y-3">
                <div class="text-center text-sm text-gray-500">
                    <p><i class="fas fa-redo-alt mr-1"></i> Vous serez redirigé vers FedaPay pour finaliser le paiement</p>
                </div>
                
                <div class="text-center text-xs text-gray-400">
                    <p>En cliquant sur "Payer maintenant", vous acceptez nos 
                        <a href="#" class="text-amber-600 hover:text-amber-800">conditions d'utilisation</a>
                    </p>
                </div>
            </div>

            <!-- Assistance -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-question-circle mr-1"></i>
                        Besoin d'aide ?
                        <a href="mailto:support@votresite.com" class="text-amber-600 hover:text-amber-800 ml-1">
                            Contactez notre support
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript pour améliorer l'expérience utilisateur -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('payment-form');
    const submitButton = document.getElementById('submit-button');
    
    // Validation avant soumission
    form.addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const telephone = document.getElementById('telephone').value;
        
        if (!email || !telephone) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires.');
            return false;
        }
        
        // Validation basique de l'email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            alert('Veuillez entrer une adresse email valide.');
            return false;
        }
        
        // Validation du téléphone (chiffres uniquement)
        const phoneRegex = /^[0-9]{8,15}$/;
        if (!phoneRegex.test(telephone)) {
            e.preventDefault();
            alert('Veuillez entrer un numéro de téléphone valide (8 à 15 chiffres).');
            return false;
        }
        
        // Désactiver le bouton pour éviter les doubles clics
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Traitement en cours...';
    });
});
</script>

<style>
/* Animation pour le focus */
input:focus {
    transition: all 0.3s ease;
}

/* Style pour les champs invalides */
input:invalid {
    border-color: #f87171;
}
</style>
@endsection