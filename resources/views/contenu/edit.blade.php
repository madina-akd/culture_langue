@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h4 class="card-title">Modifier le Contenu</h4>
        </div>

        <form action="{{ route('contenu.update', $contenu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <!-- Titre -->
                <div class="mb-3">
                    <label class="form-label">Titre *</label>
                    <input type="text" class="form-control" name="titre" 
                           value="{{ old('titre', $contenu->titre) }}" required>
                    @error('titre')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Texte avec éditeur HTML -->
                <div class="mb-3">
                    <label class="form-label">Contenu *</label>
                    <textarea id="texte" name="texte" class="form-control" rows="12" required>
                        @php
                            // Afficher le HTML sans l'échapper
                            echo old('texte', $contenu->texte);
                        @endphp
                    </textarea>
                    <div class="form-text">
                        Vous pouvez utiliser du HTML pour formater votre texte.
                    </div>
                    @error('texte')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label class="form-label">Type de contenu *</label>
                    <select name="id_type" class="form-select" required>
                        <option value="">-- Sélectionner un type --</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ old('id_type', $contenu->id_type) == $type->id ? 'selected' : '' }}>
                                {{ $type->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_type')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Région -->
                <div class="mb-3">
                    <label class="form-label">Région *</label>
                    <select name="id_region" class="form-select" required>
                        <option value="">-- Sélectionner une région --</option>
                        @foreach($regions as $region)
                            <option value="{{ $region->id }}" {{ old('id_region', $contenu->id_region) == $region->id ? 'selected' : '' }}>
                                {{ $region->nom_region }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_region')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Langue -->
                <div class="mb-3">
                    <label class="form-label">Langue *</label>
                    <select name="id_langue" class="form-select" required>
                        <option value="">-- Sélectionner une langue --</option>
                        @foreach($langues as $langue)
                            <option value="{{ $langue->id }}" {{ old('id_langue', $contenu->id_langue) == $langue->id ? 'selected' : '' }}>
                                {{ $langue->nom_langue }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_langue')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Auteur -->
                <div class="mb-3">
                    <label class="form-label">Auteur *</label>
                    <select name="id_auteur" class="form-select" required>
                        <option value="">-- Sélectionner un auteur --</option>
                        @foreach($utilisateurs as $user)
                            <option value="{{ $user->id }}" {{ old('id_auteur', $contenu->id_auteur) == $user->id ? 'selected' : '' }}>
                                {{ $user->prenom }} {{ $user->nom }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_auteur')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Parent (traduction) -->
                <div class="mb-3">
                    <label class="form-label">Traduction de (Parent)</label>
                    <select name="parent_id" class="form-select">
                        <option value="">-- Aucun (contenu original) --</option>
                        @foreach($contenus as $c)
                            @if($c->id != $contenu->id)
                                <option value="{{ $c->id }}" {{ old('parent_id', $contenu->parent_id) == $c->id ? 'selected' : '' }}>
                                    {{ $c->titre }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('parent_id')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Section modération -->
                <div class="border-top pt-3 mt-3">
                    <h5 class="text-warning">Modération</h5>
                    
                    <!-- Statut -->
                    <div class="mb-3">
                        <label class="form-label">Statut *</label>
                        <select name="statut" id="statutSelect" class="form-select" required>
                            <option value="en attente" {{ old('statut', $contenu->statut) == 'en attente' ? 'selected' : '' }}>En attente</option>
                            <option value="validé" {{ old('statut', $contenu->statut) == 'validé' ? 'selected' : '' }}>Validé</option>
                            <option value="rejeté" {{ old('statut', $contenu->statut) == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
                        </select>
                        @error('statut')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Modérateur -->
                    <div class="mb-3" id="moderateurField" style="display: {{ in_array($contenu->statut, ['validé', 'rejeté']) ? 'block' : 'none' }}">
                        <label class="form-label">Modérateur</label>
                        <select name="id_moderateur" class="form-select">
                            <option value="">-- Sélectionner un modérateur --</option>
                            @foreach($utilisateurs as $user)
                                <option value="{{ $user->id }}" {{ old('id_moderateur', $contenu->id_moderateur) == $user->id ? 'selected' : '' }}>
                                    {{ $user->prenom }} {{ $user->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_moderateur')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Date de validation -->
                    <div class="mb-3" id="dateValidationField" style="display: {{ in_array($contenu->statut, ['validé', 'rejeté']) ? 'block' : 'none' }}">
                        <label class="form-label">Date de validation</label>
                        <input type="datetime-local" class="form-control" name="date_validation"
                               value="{{ old('date_validation', $contenu->date_validation ? \Carbon\Carbon::parse($contenu->date_validation)->format('Y-m-d\TH:i') : '') }}">
                        @error('date_validation')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('contenu.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Annuler
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
// Initialisation de l'éditeur
ClassicEditor
    .create(document.querySelector('#texte'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', '|',
                'undo', 'redo', '|',
                'link', 'mediaEmbed'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraphe', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: 'h2', title: 'Titre 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Titre 3', class: 'ck-heading_heading3' }
            ]
        }
    })
    .catch(error => { 
        console.error(error); 
    });

// Gestion de l'affichage des champs de modération
document.getElementById('statutSelect').addEventListener('change', function() {
    const isModere = this.value === 'validé' || this.value === 'rejeté';
    document.getElementById('moderateurField').style.display = isModere ? 'block' : 'none';
    document.getElementById('dateValidationField').style.display = isModere ? 'block' : 'none';
});
</script>

<style>
.ck-editor__editable {
    min-height: 300px;
}
</style>

@endsection