@extends('admin.layouts.app')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">Liste des Rôles</h3>

        <a href="{{ route('roles.create') }}" class="btn bg-success-subtle">
            <i class="bi bi-plus-lg"></i> Nouveau rôle
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class="mb-4">
        <input type="text" id="searchInput" class="form-control"
               placeholder="Rechercher un rôle...">
    </div>

    <!-- Zone des cards -->
    <div class="row g-4" id="rolesContainer">

        @foreach($roles as $role)
            <div class="col-md-4 role-card" data-name="{{ strtolower($role->nom) }}">

                <div class="card shadow-sm border-0 h-100">
                    
                  
                  <div class="card-header">
                    <h3 class="card-title">{{$role-> nom}}</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                    <div class="card-body">

                        <p class="mb-2">
                            
                             @if($role->utilisateurs->count() > 0)
                            <span><strong>People :</strong> {{ $role->utilisateurs->count() }}</span>
                              @else
                                  <span class="text-muted">Aucun utilisateur</span>
                              @endif
                              </p>

                       

                    </div>

                    <div class="card-footer d-flex justify-content-between">

                        <a href="{{ route('roles.show', $role->id) }}" class="text-primary">
                            <i class="bi bi-eye-fill fs-12"></i>
                        </a>

                        <a href="{{ route('roles.edit', $role->id) }}" class="text-warning">
                            <i class="bi bi-pencil-square fs-12"></i>
                        </a>
                         @if(auth()->user()->id_role == 3)
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link text-danger p-0"
                                    onclick="return confirm('Supprimer ce rôle ?')">
                                <i class="bi bi-trash-fill fs-12"></i>
                            </button>
                        </form>
                        @endif

                    </div>

                </div>
            </div>
        @endforeach

    </div>

</div>

<!-- SCRIPT DE RECHERCHE LIVE -->
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let search = this.value.toLowerCase();
        let cards = document.querySelectorAll('.role-card');

        cards.forEach(card => {
            let name = card.getAttribute('data-name');
            card.style.display = name.includes(search) ? 'block' : 'none';
        });
    });
</script>

@endsection
