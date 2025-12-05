@extends('auteur.layouts')

@section('content')
<div class="container-fluid">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mes Contenus</h3>
                    <a href="{{ route('auteur.contenu.create') }}" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Nouveau Contenu
                    </a>
                </div>
                <div class="card-body">
                    <!-- Filtres -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                           <div class="btn-group" role="group">
                                <a href="{{ route('auteur.contenu.index') }}" 
                                class="btn btn-outline-primary {{ !request('type') ? 'active' : '' }}">
                                    Tous
                                </a>
                                <a href="{{ route('auteur.contenu.index', ['type' => 'histoire']) }}" 
                                class="btn btn-outline-primary {{ in_array(request('type'), ['histoire', 'conte']) ? 'active' : '' }}">
                                    Histoires & Contes
                                </a>
                                <a href="{{ route('auteur.contenu.index', ['type' => 'recette']) }}" 
                                class="btn btn-outline-success {{ request('type') == 'recette' ? 'active' : '' }}">
                                    Recettes
                                </a>
                                <a href="{{ route('auteur.contenu.index', ['type' => 'tradition']) }}" 
                                class="btn btn-outline-warning {{ in_array(request('type'), ['tradition', 'danse', 'coutume']) ? 'active' : '' }}">
                                    Traditions
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <span class="text-muted">
                                {{ $contenus->total() }} contenu(s) trouvé(s)
                                @if($typeFiltre)
                                    dans "{{ $typeFiltre }}"
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Tableau des contenus -->
                    @if($contenus->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Type</th>
                                        <th>Région</th>
                                        <th>Langue</th>
                                        <th>Statut</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contenus as $contenu)
                                    <tr>
                                        <td>
                                            <strong>{{ Str::limit($contenu->titre, 60) }}</strong>
                                            @if($contenu->created_at->gt(now()->subDays(7)))
                                                <span class="badge bg-info ms-1">Nouveau</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{ $contenu->type->nom ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>{{ $contenu->region->nom_region ?? 'N/A' }}</td>
                                        <td>{{ $contenu->langue->nom_langue ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge 
                                                @if($contenu->statut == 'validé') bg-success
                                                @elseif($contenu->statut == 'en attente') bg-warning
                                                @else bg-danger @endif">
                                                {{ $contenu->statut }}
                                            </span>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $contenu->created_at->format('d/m/Y') }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('auteur.contenu.show', $contenu->id) }}" 
                                                   class="btn btn-primary" title="Voir">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                
                                                @if($contenu->statut == 'en attente')
                                                <a href="{{ route('auteur.contenu.edit', $contenu->id) }}" 
                                                   class="btn btn-warning" title="Modifier">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                
                                                <form action="{{ route('auteur.contenu.destroy', $contenu->id) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger" 
                                                            title="Supprimer"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contenu ?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <span class="btn btn-secondary disabled" title="Non modifiable">
                                                    <i class="bi bi-lock"></i>
                                                </span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $contenus->links() }}
                        </div>
                    @else
                        <!-- Message vide -->
                        <div class="text-center py-5">
                            <i class="bi bi-journal-text display-1 text-muted"></i>
                            <h4 class="text-muted mt-3">Aucun contenu trouvé</h4>
                            <p class="text-muted">
                                @if($typeFiltre)
                                    Aucun contenu de type "{{ $typeFiltre }}" n'a été trouvé.
                                @else
                                    Vous n'avez pas encore créé de contenu.
                                @endif
                            </p>
                            <a href="{{ route('auteur.contenu.create') }}" class="btn btn-success mt-3">
                                <i class="bi bi-plus-circle"></i> Créer votre premier contenu
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Légende des statuts -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Légende des statuts</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="badge bg-success me-2">Validé</span>
                            <small class="text-muted">Contenu approuvé et publié</small>
                        </div>
                        <div class="col-md-3">
                            <span class="badge bg-warning me-2">En attente</span>
                            <small class="text-muted">En cours de validation</small>
                        </div>
                        
                        <div class="col-md-3">
                            <span class="badge bg-info me-2">Nouveau</span>
                            <small class="text-muted">Créé il y a moins de 7 jours</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn-group .btn {
        border-radius: 4px !important;
        margin: 0 2px;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .badge {
        font-size: 0.75em;
    }
</style>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('.datatable')) {
            $('.datatable').DataTable().destroy();
        }

        $('.datatable').DataTable({
            destroy: true,
            "pageLength": 10,
            "lengthMenu": [5, 10, 25, 50],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            },
            "order": [[5, 'desc']], 
            "columnDefs": [
                { "orderable": false, "targets": [6] }
            ]
        });
    });
</script>

@endpush