@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card card-warning card-outline shadow-sm">
        <div class="card-header bg-warning-subtle">
            <h4 class="card-title">Détails du Commentaire</h4>
        </div>

        <div class="card-body">

            <p><strong>Auteur :</strong> {{ $commentaire->utilisateur->nom }} {{ $commentaire->utilisateur->prenom }}</p>
            <p><strong>Contenu lié :</strong> {{ $commentaire->contenu->titre }}</p>
            <p><strong>Date :</strong> {{ $commentaire->created_at->format('d M Y H:i') }}</p>

            <p><strong>Texte :</strong></p>
            <div class="p-3 mb-3 bg-white border rounded">
                {{ $commentaire->texte }}
            </div>

            <p><strong>Note :</strong></p>
            <div>
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $commentaire->note)
                        <i class="bi bi-star-fill text-warning fs-5"></i>
                    @else
                        <i class="bi bi-star text-secondary fs-5"></i>
                    @endif
                @endfor
            </div>

        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('commentaire.index') }}" class="btn btn-secondary">Retour</a>
        </div>
    </div>
</div>
@endsection
