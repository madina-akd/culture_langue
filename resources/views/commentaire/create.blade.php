@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card card-warning card-outline shadow-sm">
        <div class="card-header bg-warning-subtle">
            <h4 class="card-title">Créer un commentaire</h4>
        </div>

        <form action="{{ route('commentaire.store') }}" method="POST">
            @csrf

            <div class="card-body">

                <!-- Texte -->
                <div class="mb-3">
                    <label for="texte" class="form-label">Texte du commentaire</label>
                    <textarea id="texte" name="texte" class="form-control bg-white" rows="4" required>{{ old('texte') }}</textarea>
                </div>

                <!-- Note -->
                <div class="mb-3">
                    <label class="form-label">Note</label>
                    <select name="note" class="form-select bg-white" required>
                        <option value="">-- Sélectionner une note --</option>
                        @for($i = 0; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ old('note') == $i ? 'selected' : '' }}>
                                {{ $i }} ★
                            </option>
                        @endfor
                    </select>
                </div>

                <!-- Utilisateur -->
                <div class="mb-3">
                    <label for="id_utilisateur" class="form-label">Utilisateur</label>
                    <select id="id_utilisateur" name="id_utilisateur" class="form-select bg-white" required>
                        <option value="">-- Sélectionner un utilisateur --</option>
                        @foreach($utilisateurs as $user)
                            <option value="{{ $user->id }}" {{ old('id_utilisateur') == $user->id ? 'selected' : '' }}>
                                {{ $user->nom }} {{ $user->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Contenu -->
                <div class="mb-3">
                    <label for="id_contenu" class="form-label">Contenu lié</label>
                    <select id="id_contenu" name="id_contenu" class="form-select bg-white" required>
                        <option value="">-- Sélectionner un contenu --</option>
                        @foreach($contenus as $contenu)
                            <option value="{{ $contenu->id }}" {{ old('id_contenu') == $contenu->id ? 'selected' : '' }}>
                                {{ $contenu->titre }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('commentaire.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-success">Créer</button>
            </div>
        </form>
    </div>
</div>
@endsection
