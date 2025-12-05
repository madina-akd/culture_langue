@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header bg-warning-subtle">
            <h4 class="card-title mb-0">Détails du TypeContenu</h4>
        </div>

        <div class="card-body">
            <p><strong>ID :</strong> {{ $typecontenu->id }}</p>
            <p><strong>Nom :</strong> {{ $typecontenu->nom }}</p>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('typecontenu.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('typecontenu.edit', $typecontenu->id) }}" class="btn btn-warning">Modifier</a>
        </div>
    </div>
</div>
@endsection
