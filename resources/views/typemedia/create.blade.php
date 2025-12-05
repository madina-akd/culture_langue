@extends('admin.layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col-sm-6">
        <h3 class="mb-0">Formulaire</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">TypeMedia Form</li>
        </ol>
    </div>
</div>

<div class="card card-warning card-outline mb-4">
    <div class="card-header bg-warning-subtle">
        <div class="card-title">Créer un TypeMedia</div>
    </div>

    <form action="{{ route('typemedia.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du TypeMedia</label>
                <input
                    type="text"
                    id="nom"
                    class="form-control"
                    name="nom"
                    placeholder="Ex: Vidéo"
                    required
                />
                <div class="invalid-feedback">Veuillez entrer un nom valide.</div>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input
                    type="number"
                    id="prix"
                    class="form-control"
                    name="prix"
                    placeholder="Ex: 2000"
                    required
                />
                <div class="invalid-feedback">Veuillez entrer un prix valide.</div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <button type="submit" class="btn btn-warning">Enregistrer</button>
            <a href="{{ route('typemedia.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
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
