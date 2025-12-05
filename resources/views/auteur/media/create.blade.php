@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ajouter un Média</h3>
                    <a href="{{ route('auteur.media.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> Veuillez corriger les erreurs ci-dessous.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('auteur.media.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Fichier -->
                                <div class="mb-3">
                                    <label for="chemin" class="form-label">Fichier média *</label>
                                    <input type="file" class="form-control" id="chemin" name="chemin" 
                                           accept="image/*,video/*,audio/*,.pdf,.doc,.docx" required>
                                    <div class="form-text">
                                        Types acceptés : Images (JPEG, PNG, GIF), Vidéos (MP4, AVI, MOV), 
                                        Audio (MP3, WAV), Documents (PDF, DOC, DOCX). Taille max : 10MB
                                    </div>
                                    @error('chemin')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea class="form-control" id="description" name="description" 
                                              rows="3" placeholder="Décrivez votre média..." required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Type de média -->
                                <div class="mb-3">
                                    <label for="id_typemedia" class="form-label">Type de média *</label>
                                    <select class="form-select" id="id_typemedia" name="id_typemedia" required>
                                        <option value="">-- Sélectionnez un type --</option>
                                        @foreach($typesMedia as $type)
                                            <option value="{{ $type->id }}" {{ old('id_typemedia') == $type->id ? 'selected' : '' }}>
                                                {{ $type->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_typemedia')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Contenu associé -->
                                <div class="mb-3">
                                    <label for="id_contenu" class="form-label">Contenu associé *</label>
                                    <select class="form-select" id="id_contenu" name="id_contenu" required>
                                        <option value="">-- Sélectionnez un contenu --</option>
                                        @foreach($contenus as $contenu)
                                            <option value="{{ $contenu->id }}" {{ old('id_contenu') == $contenu->id ? 'selected' : '' }}>
                                                {{ $contenu->titre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_contenu')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Aperçu du fichier -->
                                <div class="mb-3">
                                    <label class="form-label">Aperçu</label>
                                    <div id="filePreview" class="border rounded p-3 text-center bg-light" style="min-height: 150px;">
                                        <i class="bi bi-cloud-arrow-up display-4 text-muted"></i>
                                        <p class="text-muted mt-2 mb-0">Aperçu du fichier</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-cloud-upload"></i> Uploader le média
                                </button>
                                <a href="{{ route('auteur.media.index') }}" class="btn btn-secondary">
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

<script>
// Aperçu du fichier
document.getElementById('chemin').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('filePreview');
    
    if (file) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
            };
            reader.readAsDataURL(file);
        } else if (file.type.startsWith('video/')) {
            preview.innerHTML = `
                <i class="bi bi-play-circle-fill display-4 text-primary"></i>
                <p class="mt-2 mb-0">${file.name}</p>
                <small class="text-muted">Vidéo</small>
            `;
        } else if (file.type.startsWith('audio/')) {
            preview.innerHTML = `
                <i class="bi bi-music-note-beamed display-4 text-success"></i>
                <p class="mt-2 mb-0">${file.name}</p>
                <small class="text-muted">Audio</small>
            `;
        } else {
            preview.innerHTML = `
                <i class="bi bi-file-earmark display-4 text-secondary"></i>
                <p class="mt-2 mb-0">${file.name}</p>
                <small class="text-muted">Document</small>
            `;
        }
    }
});

// Validation Bootstrap
(() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
@endsection