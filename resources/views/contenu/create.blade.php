@extends('admin.layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row mb-3">
    <div class="col-sm-6">
        <h3 class="mb-0">Créer un Contenu</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('contenu.index') }}">Contenus</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nouveau Contenu</li>
        </ol>
    </div>
</div>

<div class="card card-warning card-outline mb-4">
    <div class="card-header">
        <div class="card-title">Formulaire de création de contenu</div>
    </div>

    <form action="{{ route('contenu.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="card-body">
            <!-- Titre -->
            <div class="mb-3">
                <label for="titre" class="form-label">Titre *</label>
                <input type="text" id="titre" name="titre" class="form-control" 
                       value="{{ old('titre') }}" 
                       placeholder="Ex: Le Roi et le Baobab Sacré" required>
                <div class="invalid-feedback">Veuillez entrer un titre.</div>
                @error('titre')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Texte avec éditeur HTML -->
            <div class="mb-3">
                <label for="texte" class="form-label">Contenu *</label>
                <textarea id="texte" name="texte" class="form-control" rows="12" 
                          placeholder="Rédigez votre contenu ici..." required>{{ old('texte') }}</textarea>
                <div class="invalid-feedback">Veuillez entrer le texte du contenu.</div>
                <div class="form-text">
                    Vous pouvez utiliser du HTML pour formater votre texte : 
                    <code>&lt;strong&gt;gras&lt;/strong&gt;</code>, 
                    <code>&lt;em&gt;italique&lt;/em&gt;</code>, 
                    <code>&lt;p&gt;paragraphe&lt;/p&gt;</code>, 
                    <code>&lt;blockquote&gt;citation&lt;/blockquote&gt;</code>
                </div>
                @error('texte')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Parent -->
            <div class="mb-3">
                <label for="parent_id" class="form-label">Traduction de (Parent)</label>
                <select id="parent_id" name="parent_id" class="form-select">
                    <option value="">-- Aucun (contenu original) --</option>
                    @foreach($contenus as $c)
                        <option value="{{ $c->id }}" {{ old('parent_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->titre }} 
                            @if(strlen($c->texte) > 50) 
                                - {{ substr(strip_tags($c->texte), 0, 50) }}...
                            @endif
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Type -->
            <div class="mb-3">
                <label for="id_type" class="form-label">Type de contenu *</label>
                <select id="id_type" name="id_type" class="form-select" required>
                    <option value="">-- Sélectionner un type --</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('id_type') == $type->id ? 'selected' : '' }}>
                            {{ $type->nom }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Veuillez sélectionner un type.</div>
                @error('id_type')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Région -->
            <div class="mb-3">
                <label for="id_region" class="form-label">Région *</label>
                <select id="id_region" name="id_region" class="form-select" required>
                    <option value="">-- Sélectionner une région --</option>
                    @foreach($regions as $region)
                        <option value="{{ $region->id }}" {{ old('id_region') == $region->id ? 'selected' : '' }}>
                            {{ $region->nom_region }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Veuillez sélectionner une région.</div>
                @error('id_region')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Langue -->
            <div class="mb-3">
                <label for="id_langue" class="form-label">Langue *</label>
                <select id="id_langue" name="id_langue" class="form-select" required>
                    <option value="">-- Sélectionner une langue --</option>
                    @foreach($langues as $langue)
                        <option value="{{ $langue->id }}" {{ old('id_langue') == $langue->id ? 'selected' : '' }}>
                            {{ $langue->nom_langue }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Veuillez sélectionner une langue.</div>
                @error('id_langue')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Auteur -->
            <div class="mb-3">
                <label for="id_auteur" class="form-label">Auteur *</label>
                <select id="id_auteur" name="id_auteur" class="form-select" required>
                    <option value="">-- Sélectionner un auteur --</option>
                    @foreach($utilisateurs as $user)
                        <option value="{{ $user->id }}" {{ old('id_auteur') == $user->id ? 'selected' : '' }}>
                            {{ $user->prenom }} {{ $user->nom }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Veuillez sélectionner un auteur.</div>
                @error('id_auteur')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Statut (pour l'admin) -->
            <div class="mb-3">
                <label for="statut" class="form-label">Statut *</label>
                <select id="statut" name="statut" class="form-select" required>
                    <option value="en attente" {{ old('statut') == 'en attente' ? 'selected' : '' }}>En attente</option>
                    <option value="validé" {{ old('statut') == 'validé' ? 'selected' : '' }}>Validé</option>
                    <option value="rejeté" {{ old('statut') == 'rejeté' ? 'selected' : '' }}>Rejeté</option>
                </select>
                @error('statut')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Date de validation (pour l'admin) -->
            <div class="mb-3">
                <label for="date_validation" class="form-label">Date de validation</label>
                <input type="datetime-local" id="date_validation" name="date_validation" 
                       class="form-control" value="{{ old('date_validation') }}"
                       placeholder="Laissé vide pour une validation automatique">
                @error('date_validation')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Créer le contenu
            </button>
            <a href="{{ route('contenu.index') }}" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Annuler
            </a>
        </div>
    </form>
</div>

<!-- Validation Bootstrap -->
<script>
(() => {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
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
        },
        // Autoriser le HTML basique
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        }
    })
    .catch(error => { 
        console.error(error); 
    });
</script>

<!-- Style pour l'éditeur -->
<style>
.ck-editor__editable {
    min-height: 300px;
}
</style>
@endsection