@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mon Profil</h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> Veuillez corriger les erreurs ci-dessous.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('auteur.profile.update') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom *</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" 
                                           value="{{ old('prenom', $auteur->prenom) }}" required>
                                    @error('prenom')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom *</label>
                                    <input type="text" class="form-control" id="nom" name="nom" 
                                           value="{{ old('nom', $auteur->nom) }}" required>
                                    @error('nom')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="{{ old('email', $auteur->email) }}" required>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Sexe</label>
                                    <div>
                                        <span class="form-control-plaintext">
                                            {{ ucfirst($auteur->sexe) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date de naissance</label>
                                    <div>
                                        <span class="form-control-plaintext">
                                            {{ $auteur->date_naissance ? $auteur->date_naissance->format('d/m/Y') : 'Non spécifiée' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date d'inscription</label>
                                    <div>
                                        <span class="form-control-plaintext">
                                            {{ $auteur->date_inscription ? $auteur->date_inscription->format('d/m/Y') : 'Non spécifiée' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Statut du compte</label>
                                    <div>
                                        <span class="badge 
                                            @if($auteur->statut == 'actif') bg-success
                                            @elseif($auteur->statut == 'en attente') bg-warning
                                            @else bg-danger @endif">
                                            {{ $auteur->statut }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check-circle"></i> Mettre à jour le profil
                            </button>
                            <a href="{{ route('auteur.dashboard') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Retour au tableau de bord
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Informations sur le compte -->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Informations du compte</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px;">
                            <span class="text-white fw-bold fs-4">
                                {{ strtoupper(substr($auteur->prenom, 0, 1)) }}{{ strtoupper(substr($auteur->nom, 0, 1)) }}
                            </span>
                        </div>
                        <h5 class="mt-3">{{ $auteur->prenom }} {{ $auteur->nom }}</h5>
                        <p class="text-muted">Auteur</p>
                    </div>

                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Email vérifié</span>
                            <span class="badge bg-success">Oui</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Compte créé</span>
                            <span class="text-muted">
                                {{ $auteur->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Dernière connexion</span>
                            <span class="text-muted">
                                {{ now()->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions rapides -->
            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="card-title mb-0">Actions rapides</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('auteur.contenu.create') }}" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Nouveau contenu
                        </a>
                        <a href="{{ route('auteur.contenu.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-journal-text"></i> Mes contenus
                        </a>
                        <a href="{{ route('auteur.dashboard') }}" class="btn btn-outline-info btn-sm">
                            <i class="bi bi-speedometer2"></i> Tableau de bord
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-control-plaintext {
        padding: 0.375rem 0;
        margin-bottom: 0;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }
    
    .bg-primary {
        background-color: #007bff !important;
    }
</style>
@endpush