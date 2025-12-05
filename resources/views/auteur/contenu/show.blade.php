@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Détail du Contenu</h3>
                    <div class="btn-group">
                        <a href="{{ route('auteur.contenu.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Retour
                        </a>
                        @if($contenu->statut == 'en attente')
                        <a href="{{ route('auteur.contenu.edit', $contenu->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil"></i> Modifier
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="text-primary">{{ $contenu->titre }}</h2>
                            
                            <div class="mb-4">
                                {!! $contenu->texte !!}
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Informations</h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>Type :</strong> {{ $contenu->type->nom ?? 'N/A' }}</p>
                                    <p><strong>Région :</strong> {{ $contenu->region->nom ?? 'N/A' }}</p>
                                    <p><strong>Langue :</strong> {{ $contenu->langue->nom ?? 'N/A' }}</p>
                                    <p><strong>Statut :</strong> 
                                        <span class="badge 
                                            @if($contenu->statut == 'validé') bg-success
                                            @elseif($contenu->statut == 'en attente') bg-warning
                                            @else bg-danger @endif">
                                            {{ $contenu->statut }}
                                        </span>
                                    </p>
                                    <p><strong>Créé le :</strong> {{ $contenu->created_at->format('d/m/Y à H:i') }}</p>
                                    @if($contenu->date_validation && $contenu->date_validation !== '0000-00-00 00:00:00')
                                        <p><strong>Validé le :</strong> 
                                            @php
                                                try {
                                                    echo \Carbon\Carbon::parse($contenu->date_validation)->format('d/m/Y');
                                                } catch (\Exception $e) {
                                                    echo 'Date invalide';
                                                }
                                            @endphp
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection