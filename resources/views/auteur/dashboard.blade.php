@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <!-- En-tête du dashboard auteur -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tableau de Bord Auteur</h3>
                    <a href="{{ route('auteur.contenu.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Nouvelle Histoire
                    </a>
                </div>
                <div class="card-body">
                    <p>Bienvenue, <strong>{{ $auteur->prenom }} {{ $auteur->nom }}</strong> !</p>
                    <p class="text-muted">Vous pouvez gérer vos histoires, contes et recettes depuis cet espace.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['total'] }}</h3>
                    <p>Histoires publiées</p>
                </div>
                <div class="icon">
                    <i class="bi bi-journal-text"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['valides'] }}</h3>
                    <p>Validées</p>
                </div>
                <div class="icon">
                    <i class="bi bi-check-circle"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['en_attente'] }}</h3>
                    <p>En attente</p>
                </div>
                <div class="icon">
                    <i class="bi bi-clock"></i>
                </div>
            </div>
        </div>
       
    </div>

    <!-- Derniers contenus -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mes Dernières Histoires</h3>
                    <a href="{{ route('auteur.contenu.index') }}" class="btn btn-primary">
                        Voir tout
                    </a>
                </div>
                <div class="card-body">
                    @if($derniersContenus->count() > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Type</th>
                                    <th>Région</th>
                                    <th>Statut</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($derniersContenus as $contenu)
                                <tr>
                                    <td>{{ Str::limit($contenu->titre, 50) }}</td>
                                    <td>{{ $contenu->type->nom ?? 'N/A' }}</td>
                                    <td>{{ $contenu->region->nom ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($contenu->statut == 'validé') bg-success
                                            @elseif($contenu->statut == 'en attente') bg-warning
                                            @else bg-danger @endif">
                                            {{ $contenu->statut }}
                                        </span>
                                    </td>
                                    <td>{{ $contenu->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('auteur.contenu.show', $contenu->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        @if($contenu->statut == 'en attente')
                                        <a href="{{ route('auteur.contenu.edit', $contenu->id) }}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-journal-text display-1 text-muted"></i>
                            <h4 class="text-muted mt-3">Aucune histoire publiée</h4>
                            <p class="text-muted">Commencez par créer votre première histoire !</p>
                            <a href="{{ route('auteur.contenu.create') }}" class="btn btn-success">
                                <i class="bi bi-plus-circle"></i> Créer ma première histoire
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-journal-text display-4 text-primary"></i>
                    <h5 class="mt-3">Histoires & Contes</h5>
                    <p class="text-muted">Partagez vos récits traditionnels</p>
                    <a href="{{ route('auteur.contenu.create') }}?type=histoire" class="btn btn-outline-primary">
                        Créer une histoire
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-egg-fried display-4 text-success"></i>
                    <h5 class="mt-3">Recettes</h5>
                    <p class="text-muted">Partagez vos recettes traditionnelles</p>
                    <a href="{{ route('auteur.contenu.create') }}?type=recette" class="btn btn-outline-success">
                        Créer une recette
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill display-4 text-warning"></i>
                    <h5 class="mt-3">Traditions</h5>
                    <p class="text-muted">Partagez vos connaissances traditionnelles</p>
                    <a href="{{ route('auteur.contenu.create') }}?type=tradition" class="btn btn-outline-warning">
                        Créer une tradition
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection