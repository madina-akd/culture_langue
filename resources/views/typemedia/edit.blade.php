@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header bg-warning-subtle">
            <h4 class="card-title">Modifier TypeMedia</h4>
        </div>

        <form action="{{ route('typemedia.update', $typemedia->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Nom du TypeMedia</label>
                    <input type="text" class="form-control" name="nom" 
                           value="{{ $typemedia->nom }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prix</label>
                    <input type="number" class="form-control" name="prix" 
                           value="{{ $typemedia->prix }}" required>
                </div>

            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('typemedia.index') }}" class="btn btn-secondary">Annuler</a>
                <button type="submit" class="btn btn-warning">Mettre à jour</button>
            </div>
        </form>

    </div>
</div>

@endsection
