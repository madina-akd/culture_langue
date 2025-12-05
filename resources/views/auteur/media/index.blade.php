@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mes Médias</h3>
                    <a href="{{ route('auteur.media.create') }}" class="btn btn-success">
                        <i class="bi bi-cloud-upload"></i> Ajouter un média
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($medias->count() > 0)
                        <div class="row">
                            @foreach($medias as $media)
                                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body text-center">
                                            <!-- Affichage selon le type de média -->
                                            @if(in_array($media->typeMedia->nom, ['image', 'photo']))
                                                <img src="{{ asset('storage/' . $media->chemin) }}" 
                                                     class="img-fluid rounded" 
                                                     alt="{{ $media->description }}"
                                                     style="max-height: 200px; object-fit: cover;">
                                            @elseif(in_array($media->typeMedia->nom, ['video', 'vidéo']))
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="height: 200px;">
                                                    <i class="bi bi-play-circle-fill display-4 text-primary"></i>
                                                </div>
                                            @elseif(in_array($media->typeMedia->nom, ['audio', 'son']))
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="height: 200px;">
                                                    <i class="bi bi-music-note-beamed display-4 text-success"></i>
                                                </div>
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                                     style="height: 200px;">
                                                    <i class="bi bi-file-earmark display-4 text-secondary"></i>
                                                </div>
                                            @endif

                                            <div class="mt-3">
                                                <h6 class="card-title">{{ Str::limit($media->description, 30) }}</h6>
                                                <p class="text-muted small mb-1">
                                                    <strong>Contenu :</strong> {{ $media->contenu->titre }}
                                                </p>
                                                <p class="text-muted small mb-2">
                                                    <strong>Type :</strong> 
                                                    <span class="badge bg-primary">{{ $media->typeMedia->nom }}</span>
                                                </p>
                                                <p class="text-muted small">
                                                    Ajouté le {{ $media->created_at->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent">
                                            <div class="btn-group w-100">
                                                <a href="{{ route('auteur.media.show', $media->id) }}" 
                                                   class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        onclick="confirmDelete({{ $media->id }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <form id="delete-form-{{ $media->id }}" 
                                                      action="{{ route('auteur.media.destroy', $media->id) }}" 
                                                      method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $medias->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-images display-1 text-muted"></i>
                            <h4 class="text-muted mt-3">Aucun média trouvé</h4>
                            <p class="text-muted">Commencez par ajouter votre premier média.</p>
                            <a href="{{ route('auteur.media.create') }}" class="btn btn-success mt-3">
                                <i class="bi bi-cloud-upload"></i> Ajouter mon premier média
                            </a>
                        </div>
                    @endif
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

<style>
.card {
    transition: transform 0.2s;
}
.card:hover {
    transform: translateY(-5px);
}
</style>
@endsection