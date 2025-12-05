@extends('admin.layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-sm-6">
            <h3 class="mb-0">Formulaire Média</h3>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Media</li>
            </ol>
        </div>
    </div>

    <div class="card card-warning card-outline mb-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Modifier un média</h5>
        </div>

        <form action="{{ route('media.update', $media->id) }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                <!-- Chemin -->
                <div class="mb-3">
                    <label for="chemin" class="form-label">Fichier média</label>
                    <input
                        type="file"
                        id="chemin"
                        class="form-control"
                        name="chemin"
                    />
                    <small class="text-muted">Laissez vide pour conserver le fichier actuel : {{ $media->chemin }}</small>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea
                        id="description"
                        class="form-control"
                        name="description"
                        rows="3"
                        required
                    >{{ old('description', $media->description) }}</textarea>
                    <div class="invalid-feedback">Veuillez entrer une description.</div>
                </div>

                <!-- TypeMedia -->
                <div class="mb-3">
                    <label for="id_typemedia" class="form-label">TypeMedia</label>
                    <select id="id_typemedia" name="id_typemedia" class="form-select" required>
                        <option value="">-- Sélectionner un type --</option>
                        @foreach($typemedias as $typemedia)
                            <option value="{{ $typemedia->id }}" 
                                {{ $media->id_typemedia == $typemedia->id ? 'selected' : '' }}>
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
                            <option value="{{ $contenu->id }}" 
                                {{ $media->id_contenu == $contenu->id ? 'selected' : '' }}>
                                {{ $contenu->titre }}
                            </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">Veuillez sélectionner un contenu.</div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('media.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-warning">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

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
@endsection
