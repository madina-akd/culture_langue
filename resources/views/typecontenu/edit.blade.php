@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header bg-warning-subtle">
            <h4 class="card-title mb-0">Modifier TypeContenu</h4>
        </div>

        <form action="{{ route('typecontenu.update', $typecontenu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du type de contenu</label>
                    <input type="text" id="nom" name="nom" class="form-control bg-white"
                           value="{{ old('nom', $typecontenu->nom) }}" required>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('typecontenu.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection
