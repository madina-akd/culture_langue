@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h4 class="card-title">Contenu Details</h4>
        </div>

        <div class="card-body">
            <p><strong>ID :</strong> {{ $contenu->id }}</p>

            <p><strong>Titre :</strong> {{ $contenu->titre }}</p>

            <p><strong>Texte :</strong><br>
                {{ $contenu->texte }}
            </p>

            <p><strong>Langue :</strong> {{ $contenu->langue->nom_langue }}</p>

            <p><strong>Type :</strong> {{ $contenu->type->nom }}</p>

            <p><strong>Région :</strong> {{ $contenu->region->nom_region}}</p>

            <p><strong>Auteur :</strong> {{ $contenu->auteur->nom}}</p>

            @if($contenu->parent_id)
                <p><strong>Traduction de :</strong> {{ $contenu->parent->titre }}</p>
            @endif

            <p><strong>Statut :</strong> 
                @if($contenu->statut === 'validé')
                    <span class="badge bg-success">Validé</span>
                @else
                    <span class="badge bg-warning">En attente</span>
                @endif
            </p>

            @if($contenu->statut === 'validé')
                <p><strong>Modérateur :</strong> {{ $contenu->moderateur->nom }}</p>
                <p><strong>Date de validation :</strong> {{ $contenu->date_validation }}</p>
            @endif
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('contenu.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('contenu.edit', $contenu->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

@endsection
