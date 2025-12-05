@extends('admin.layouts.app')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-sm-6">
            <h3 class="mb-0">Formulaire Média</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Media Form</li>
            </ol>
        </div>
    </div>

    <div class="card card-warning card-outline mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Créer un média</h5>
        </div>

        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="card-body">

                <!-- Fichier -->
                <div class="mb-3">
                    <label for="chemin" class="form-label">Fichier média</label>
                    <input type="file" id="chemin" class="form-control" name="chemin" required>
                    <div class="invalid-feedback">Veuillez sélectionner un fichier.</div>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="Ex: Vidéo promotionnelle..." required>{{ old('description') }}</textarea>
                    <div class="invalid-feedback">Veuillez entrer une description.</div>
                </div>

                <!-- TypeMedia -->
                <div class="mb-3">
                    <label for="id_typemedia" class="form-label">TypeMedia</label>
                    <select id="id_typemedia" name="id_typemedia" class="form-select" required>
                        <option value="">-- Sélectionner un type --</option>
                        @foreach($typemedias as $typemedia)
                            <option value="{{ $typemedia->id }}" {{ old('id_typemedia') == $typemedia->id ? 'selected' : '' }}>
                                {{ $typemedia->nom }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Veuillez sélectionner un type de média.</div>
                </div>

                <!-- Contenu -->
                <div class="mb-3">
                    <label for="id_contenu" class="form-label">Contenu</label>
                    <select id="id_contenu" name="id_contenu" class="form-select" required>
                        <option value="">-- Sélectionner un contenu --</option>
                        @foreach($contenus as $contenu)
                            <option value="{{ $contenu->id }}" {{ old('id_contenu') == $contenu->id ? 'selected' : '' }}>
                                {{ $contenu->titre }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Veuillez sélectionner un contenu.</div>
                </div>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-warning">Enregistrer</button>
                <a href="{{ route('media.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>

<script>
(() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
@endsection
