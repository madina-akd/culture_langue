@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header bg-warning-subtle">
            <h4 class="card-title">Détails du TypeMedia</h4>
        </div>

        <div class="card-body">
            <p><strong>ID :</strong> {{ $typemedia->id }}</p>
            <p><strong>Nom :</strong> {{ $typemedia->nom }}</p>
            <p><strong>Prix :</strong> {{ number_format($typemedia->prix, 0, ',', ' ') }} FCFA</p>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('typemedia.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('typemedia.edit', $typemedia->id) }}" class="btn btn-warning">Modifier</a>
        </div>
    </div>
</div>

@endsection
