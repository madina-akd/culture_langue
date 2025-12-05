@extends('admin.layouts.app')
@section('content')
 <div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="fw-bold">Listes des utilisateurs</h3>
                <a href="{{ route('utilisateur.create') }}" class="btn btn-sm bg-success-subtle float-end">Add users</a>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($utilisateurs as $user)
                            <tr>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->statut === 'validé')
                                        <span class="badge bg-success">Validé</span>
                                    @else
                                        <span class="badge bg-warning">En attente</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('utilisateur.show', $user->id) }}" class="text-primary"><i class="bi bi-eye-fill fs-12"></i></a>
                                    <a href="{{ route('utilisateur.edit', $user->id) }}" class="text-warning"><i class="bi bi-pencil-square fs-12"></i></a>
                                    @if(auth()->user()->id_role == 3)
                                    <form action="{{ route('utilisateur.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-danger" onclick="return confirm('Supprimer cet utilisateur ?')"> <i class="bi bi-trash-fill fs-12"></i></button>
                                    </form>
                                    @endif
                                @if(auth()->user()->id_role == 3)
                                    @if($user->statut === 'validé')
                                        <!-- Bouton désapprouver -->
                                        <form action="{{ route('utilisateurs.desapprouver', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button class="btn btn-sm btn-secondary" onclick="return confirm('Remettre en attente ?')">
                                                Désapprouver
                                            </button>
                                        </form>
                                    @else
                                        <!-- Bouton valider -->
                                        <form action="{{ route('utilisateurs.valider', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button class="btn btn-sm btn-success" onclick="return confirm('Valider cette inscription ?')">
                                                Valider
                                            </button>
                                        </form>
                                    @endif
                                 @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
