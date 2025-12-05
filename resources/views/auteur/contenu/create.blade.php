@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Créer un Nouveau Contenu</h3>
                    <a href="{{ route('auteur.contenu.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('auteur.contenu.store') }}">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Titre -->
                                <div class="mb-3">
                                    <label for="titre" class="form-label">Titre *</label>
                                    <input type="text" class="form-control" id="titre" name="titre" 
                                           value="{{ old('titre') }}" required placeholder="Titre de votre histoire, recette ou tradition">
                                    @error('titre')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Contenu -->
                                <div class="mb-3">
                                    <label for="texte" class="form-label">Contenu *</label>
                                    <textarea class="form-control" id="texte" name="texte" rows="12" 
                                              required placeholder="Rédigez votre contenu ici...">{{ old('texte') }}</textarea>
                                    @error('texte')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        Vous pouvez utiliser du HTML basique : &lt;strong&gt;, &lt;em&gt;, &lt;p&gt;, &lt;br&gt;
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Type -->
                                <div class="mb-3">
                                    <label for="id_type" class="form-label">Type de contenu *</label>
                                    <select class="form-select" id="id_type" name="id_type" required>
                                        <option value="">Sélectionnez un type</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ old('id_type') == $type->id ? 'selected' : '' }}>
                                                {{ $type->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Région -->
                                <div class="mb-3">
                                    <label for="id_region" class="form-label">Région *</label>
                                    <select class="form-select" id="id_region" name="id_region" required>
                                        <option value="">Sélectionnez une région</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}" {{ old('id_region') == $region->id ? 'selected' : '' }}>
                                                {{ $region->nom_region }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_region')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Langue -->
                                <div class="mb-3">
                                    <label for="id_langue" class="form-label">Langue *</label>
                                    <select class="form-select" id="id_langue" name="id_langue" required>
                                        <option value="">Sélectionnez une langue</option>
                                        @foreach($langues as $langue)
                                            <option value="{{ $langue->id }}" {{ old('id_langue') == $langue->id ? 'selected' : '' }}>
                                                {{ $langue->nom_langue }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_langue')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Informations -->
                                <div class="alert alert-info">
                                    <h6><i class="bi bi-info-circle"></i> Information</h6>
                                    <p class="mb-0 small">
                                        Votre contenu sera soumis à validation avant publication.
                                        Vous pourrez le modifier tant qu'il est "en attente".
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i> Soumettre pour validation
                                </button>
                                <a href="{{ route('auteur.contenu.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle"></i> Annuler
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection