@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Détails du Média</h3>
                    <div class="btn-group">
                        <a href="{{ route('auteur.media.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Retour
                        </a>
                        <button type="button" class="btn btn-danger" 
                                onclick="confirmDelete({{ $media->id }})">
                            <i class="bi bi-trash"></i> Supprimer
                        </button>
                        <form id="delete-form-{{ $media->id }}" 
                              action="{{ route('auteur.media.destroy', $media->id) }}" 
                              method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Affichage du média -->
                            @if(in_array($media->typeMedia->nom, ['image', 'photo']))
                                <img src="{{ asset('storage/' . $media->chemin) }}" 
                                     class="img-fluid rounded shadow" 
                                     alt="{{ $media->description }}">
                            @elseif(in_array($media->typeMedia->nom, ['video', 'vidéo']))
                                <div class="text-center py-5 bg-light rounded">
                                    <i class="bi bi-play-circle-fill display-1 text-primary"></i>
                                    <p class="mt-3">Vidéo : {{ $media->description }}</p>
                                    <a href="{{ asset('storage/' . $media->chemin) }}" 
                                       class="btn btn-primary" target="_blank">
                                        <i class="bi bi-download"></i> Télécharger la vidéo
                                    </a>
                                </div>
                            @elseif(in_array($media->typeMedia->nom, ['audio', 'son']))
                                <div class="text-center py-5 bg-light rounded">
                                    <i class="bi bi-music-note-beamed display-1 text-success"></i>
                                    <p class="mt-3">Audio : {{ $media->description }}</p>
                                    <audio controls class="w-100 mt-3">
                                        <source src="{{ asset('storage/' . $media->chemin) }}" type="audio/mpeg">
                                        Votre navigateur ne supporte pas l'élément audio.
                                    </audio>
                                </div>
                            @else
                                <div class="text-center py-5 bg-light rounded">
                                    <i class="bi bi-file-earmark display-1 text-secondary"></i>
                                    <p class="mt-3">Document : {{ $media->description }}</p>
                                    <a href="{{ asset('storage/' . $media->chemin) }}" 
                                       class="btn btn-secondary" target="_blank">
                                        <i class="bi bi-download"></i> Télécharger le document
                                    </a>
                                </div>
                            @endif
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Informations</h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>Description :</strong> {{ $media->description }}</p>
                                    <p><strong>Type :</strong> 
                                        <span class="badge bg-primary">{{ $media->typeMedia->nom }}</span>
                                    </p>
                                    <p><strong>Contenu associé :</strong> 
                                        <a href="{{ route('auteur.contenu.show', $media->id_contenu) }}" class="text-decoration-none">
                                            {{ $media->contenu->titre }}
                                        </a>
                                    </p>
                                    <p><strong>Taille :</strong> 
                                        {{ round(filesize(public_path('storage/' . $media->chemin)) / 1024 / 1024, 2) }} MB
                                    </p>
                                    <p><strong>Ajouté le :</strong> 
                                        {{ $media->created_at->format('d/m/Y à H:i') }}
                                    </p>
                                    <p><strong>URL :</strong> 
                                        <input type="text" class="form-control form-control-sm" 
                                               value="{{ asset('storage/' . $media->chemin) }}" 
                                               readonly onclick="this.select()">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(mediaId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce média ? Cette action est irréversible.')) {
        document.getElementById('delete-form-' + mediaId).submit();
    }
}
</script>
@endsection