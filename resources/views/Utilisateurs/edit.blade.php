@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
        
        <h3 class="text-2xl font-bold text-green-600 mb-2">
            Modifier l'utilisateur
        </h3>
        <p class="text-gray-500 mb-6">Modifiez les informations de l'utilisateur ci-dessous.</p>

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

        <form action="{{ route('utilisateur.update', $utilisateur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @php
                    $input = "w-full px-4 py-2 rounded-xl border border-gray-300 bg-white
                              focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500
                              hover:border-green-400 transition text-gray-700 placeholder-gray-400";
                @endphp

                <!-- Nom -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom', $utilisateur->nom) }}" class="{{ $input }}" required>
                    @error('nom')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Prénom -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom', $utilisateur->prenom) }}" class="{{ $input }}" required>
                    @error('prenom')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $utilisateur->email) }}" class="{{ $input }}" required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="{{ $input }}">
                    <small class="text-gray-500">Laisser vide pour garder l'ancien mot de passe</small>
                </div>

                <!-- Confirmation mot de passe -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Confirmation mot de passe</label>
                    <input type="password" name="mot_de_passe_confirmation" class="{{ $input }}">
                </div>

                <!-- Rôle -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Rôle</label>
                    <select name="id_role" class="{{ $input }}" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $utilisateur->id_role == $role->id ? 'selected' : '' }}>
                                {{ $role->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Langue -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Langue</label>
                    <select name="id_langue" class="{{ $input }}">
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id }}" {{ $utilisateur->id_langue == $langue->id ? 'selected' : '' }}>
                                {{ $langue->nom_langue }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sexe -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Sexe</label>
                    <select name="sexe" class="{{ $input }}">
                        <option value="masculin" {{ $utilisateur->sexe == 'masculin' ? 'selected' : '' }}>Masculin</option>
                        <option value="feminin" {{ $utilisateur->sexe == 'feminin' ? 'selected' : '' }}>Féminin</option>
                    </select>
                </div>

                <!-- Date de naissance -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Date de naissance</label>
                    <input type="date" name="date_naissance" value="{{ old('date_naissance', \Carbon\Carbon::parse($utilisateur->date_naissance)->format('Y-m-d')) }}" class="{{ $input }}">
                </div>

                <!-- Photo -->
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Photo</label>
                    <input type="file" name="photo" class="{{ $input }}">
                    @if($utilisateur->photo)
                        <img src="{{ asset($utilisateur->photo) }}" class="mt-3 rounded-xl shadow-md w-28 h-28 object-cover">
                    @endif
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3 mt-8">
                <a href="{{ route('utilisateur.index') }}" class="px-6 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition">
                    Annuler
                </a>

                <button type="submit" class="px-6 py-2 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold shadow">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
