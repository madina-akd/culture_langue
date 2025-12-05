@extends('admin.layouts.app')

@section('content')
<div class="row mb-3">
    <div class="col-sm-6"><h3 class="mb-0">Formulaire TypeContenu</h3></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">TypeContenu Form</li>
        </ol>
    </div>
</div>

<div class="card card-warning card-outline mb-4">
    <!-- Header -->
    <div class="card-header bg-warning-subtle">
        <h5 class="card-title mb-0">Créer un type de contenu</h5>
    </div>

    <!-- Form -->
    <form action="{{ route('typecontenu.store') }}" method="POST">
        @csrf
        <div class="card-body">

            <div class="mb-3">
                <label for="nom" class="form-label">Nom du type de contenu</label>
                <input
                    type="text"
                    id="nom"
                    name="nom"
                    class="form-control bg-white"
                    placeholder="Ex: History..."
                    required
                />
                <div class="invalid-feedback">Veuillez entrer un nom valide.</div>
            </div>

        </div>

        <div class="card-footer d-flex justify-content-between">
            <button type="submit" class="btn btn-warning">Enregistrer</button>
            <a href="{{ route('typecontenu.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
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
