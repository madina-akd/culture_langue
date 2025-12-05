@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-2xl mx-auto px-6">
        <div class="bg-white rounded-xl shadow-sm p-8">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Modifier mon profil</h1>
                <p class="text-gray-600">Mettez à jour vos informations personnelles</p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-600 mr-3"></i>
                        <span class="text-green-800">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lecteur.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Photo de profil -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Photo de profil</label>
                        <div class="flex items-center space-x-6">
                            <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center">
                                @if($lecteur->photo)
                                    <img src="{{ asset('assets/images/'. $lecteur->photo) }}"
                                         alt="{{ $lecteur->prenom }}"
                                         class="w-20 h-20 rounded-full object-cover">
                                @else
                                    <i class="fas fa-user text-amber-600 text-2xl"></i>
                                @endif
                            </div>
                            <div>
                                <input type="file" name="photo" id="photo"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                                <p class="mt-1 text-sm text-gray-500">JPG, PNG ou GIF (max. 2MB)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Informations personnelles -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom', $lecteur->nom) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                                   required>
                        </div>

                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                            <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $lecteur->prenom) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                                   required>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $lecteur->email) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                               required>
                    </div>

                    <div>
                        <label for="sexe" class="block text-sm font-medium text-gray-700 mb-2">Sexe</label>
                        <select id="sexe" name="sexe"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
                                required>
                            <option value="">Sélectionnez</option>
                            <option value="masculin" {{ old('sexe', $lecteur->sexe) == 'masculin' ? 'selected' : '' }}>Masculin</option>
                            <option value="feminin" {{ old('sexe', $lecteur->sexe) == 'feminin' ? 'selected' : '' }}>Féminin</option>
                        </select>
                    </div>

                    <!-- Changement de mot de passe -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-medium text-gray-800 mb-4">Changer le mot de passe</h3>
                        <p class="text-sm text-gray-600 mb-4">Laissez vide si vous ne souhaitez pas changer votre mot de passe</p>

                        <div class="space-y-4">
                            <div>
                                <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-2">Nouveau mot de passe</label>
                                <input type="password" id="mot_de_passe" name="mot_de_passe"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                                <p class="mt-1 text-sm text-gray-500">Minimum 8 caractères</p>
                            </div>

                            <div>
                                <label for="mot_de_passe_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                                <input type="password" id="mot_de_passe_confirmation" name="mot_de_passe_confirmation"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('lecteur.profile.show') }}"
                       class="px-4 py-2 text-gray-600 hover:text-gray-800 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Retour au profil
                    </a>

                    <div class="flex space-x-3">
                        <button type="submit"
                                class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition font-medium">
                            <i class="fas fa-save mr-2"></i> Enregistrer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
