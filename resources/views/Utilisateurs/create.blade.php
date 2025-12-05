@extends('admin.layouts.app')

@section('content')
@if(session('success'))
    <div class="mb-4 p-4 rounded bg-green-100 text-green-800 flex justify-between items-center">
        <div>{{ session('success') }}</div>
        <button type="button" onclick="this.parentElement.style.display='none';" aria-label="Close">
            &times;
        </button>
    </div>
@endif
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-
        
        <h3 class="text-2xl font-bold text-green-600 mb-2">
            Nouvel Utilisateur
        </h3>
        <p class="text-gray-500 mb-6">Remplissez les informations pour créer un nouvel utilisateur.</p>

        <!-- Affichage des erreurs globales -->
        @if ($errors->any())
            <div class="mb-4 p-4 rounded bg-red-100 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('utilisateur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $input = "w-full px-4 py-2 rounded-xl border border-gray-300 bg-white
                              focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500
                              hover:border-green-400 transition text-gray-700 placeholder-gray-400";
                @endphp

                <!-- Nom -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="{{ $input }}" required>
                    @error('nom')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Prénom -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" class="{{ $input }}" required>
                    @error('prenom')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="{{ $input }}" required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="{{ $input }}" required>
                    @error('mot_de_passe')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirmation mot de passe -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Confirmation mot de passe</label>
                    <input type="password" name="mot_de_passe_confirmation" class="{{ $input }}" required>
                </div>

                <!-- Rôle -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Rôle</label>
                    <select name="id_role" class="{{ $input }}" required>
                        <option value="">Sélectionner un rôle</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ old('id_role') == $role->id ? 'selected' : '' }}>
                                {{ $role->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_role')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Langue -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Langue</label>
                    <select name="id_langue" class="{{ $input }}">
                        <option value="">Sélectionner une langue</option>
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id }}" {{ old('id_langue') == $langue->id ? 'selected' : '' }}>
                                {{ $langue->nom_langue }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_langue')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Sexe -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Sexe</label>
                    <select name="sexe" class="{{ $input }}">
                        <option value="">Sélectionner</option>
                        <option value="masculin" {{ old('sexe') == 'masculin' ? 'selected' : '' }}>Masculin</option>
                        <option value="feminin" {{ old('sexe') == 'feminin' ? 'selected' : '' }}>Féminin</option>
                    </select>
                    @error('sexe')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Date de naissance -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Date de naissance</label>
                    <input type="date" name="date_naissance" value="{{ old('date_naissance') }}" class="{{ $input }}">
                    @error('date_naissance')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Photo -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Photo</label>
                    <input type="file" name="photo"
                        class="w-full px-4 py-2 rounded-xl border border-gray-300 bg-white
                               focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500
                               hover:border-green-400 transition text-gray-700" />
                    @error('photo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- BUTTONS -->
            <div class="flex justify-end space-x-3 mt-8">
                <a href="{{ route('utilisateur.index') }}"
                    class="px-6 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 
                           text-gray-700 font-semibold transition">
                    Annuler
                </a>

                <button type="submit"
                    class="px-6 py-2 rounded-xl bg-green-600 hover:bg-green-700 
                           text-white font-semibold shadow">
                    Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
