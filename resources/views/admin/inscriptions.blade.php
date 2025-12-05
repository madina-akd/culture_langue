@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-sm w-50">
        <div class="card-header text-center bg-white">
            <h3 class="mb-0">Créer un compte</h3>
            <p class="text-muted">Veuillez remplir les informations ci-dessous</p>
        </div>

        <div class="card-body">
            <form action="{{ route('utilisateur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nom -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" class="form-control" placeholder="Votre nom" required>
                </div>

                <!-- Prénom -->
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" class="form-control" placeholder="Votre prénom" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" name="email" class="form-control" placeholder="exemple@mail.com" required>
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label>
                    <input type="password" name="mot_de_passe" class="form-control" placeholder="********" required>
                </div>

                <!-- Confirmation mot de passe -->
                <div class="mb-3">
                    <label for="mot_de_passe_confirmation" class="form-label">Confirmer mot de passe</label>
                    <input type="password" name="mot_de_passe_confirmation" class="form-control" placeholder="********" required>
                </div>

                <!-- Rôle -->
                <div class="mb-3">
                    <label for="id_role" class="form-label">Rôle</label>
                    <select name="id_role" class="form-select" required>
                        <option value="">Sélectionner un rôle</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Langue -->
                <div class="mb-3">
                    <label for="id_langue" class="form-label">Langue</label>
                    <select name="id_langue" class="form-select">
                        <option value="">Sélectionner une langue</option>
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id }}">{{ $langue->nom_langue }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Sexe -->
                <div class="mb-3">
                    <label for="sexe" class="form-label">Sexe</label>
                    <select name="sexe" class="form-select">
                        <option value="">Sélectionner</option>
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Féminin</option>
                    </select>
                </div>

                <!-- Date de naissance -->
                <div class="mb-3">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                    <input type="date" name="date_naissance" class="form-control">
                </div>

                <!-- Photo -->
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo de profil</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <!-- Boutons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success w-50">S'inscrire</button>
                    <a href="{{ route('utilisateur.index') }}" class="btn btn-secondary w-50 ms-2">Annuler</a>
                </div>
            </form>
        </div>

        <div class="card-footer text-center bg-white">
            <p class="mb-0">Déjà inscrit ? <a href="{{ route('login.form') }}">Se connecter</a></p>
        </div>
    </div>
</div>
@endsection
