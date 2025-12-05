@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header  justify-content-between align-items-center">
                <h3 class="fw-bold">Liste des Contenus</h3>
                <a href="{{ route('contenu.create') }}" class="btn btn-sm bg-success-subtle float-end" >
                    <i class="bi bi-plus-lg"></i> Ajouter un contenu
                </a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Langue</th>
                            <th>Type</th>
                            <th>Région</th>
                            <th>Auteur</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contenus as $contenu)
                            <tr>
                                <td>{{ $contenu->titre }}</td>
                                <td>{{ $contenu->langue->nom_langue}}</td>
                                <td>{{ $contenu->type->nom}}</td>
                                <td>{{ $contenu->region->nom_region}}</td>
                                <td>{{ optional($contenu->auteur)->nom ?? 'N/A' }}</td>
                                <td>
                                    @if($contenu->statut === 'validé')
                                        <span class="badge bg-success">Validé</span>
                                    @else
                                        <span class="badge bg-warning">En attente</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('contenu.show', $contenu->id) }}" class="text-primary"><i class="bi bi-eye-fill fs-12"></i></a>
                                    <a href="{{ route('contenu.edit', $contenu->id) }}" class="text-warning"><i class="bi bi-pencil-square fs-12"></i></a>
                                    @if(auth()->user()->id_role == 3)
                                    <form action="{{ route('contenu.destroy', $contenu->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-danger" onclick="return confirm('Supprimer ce contenu ?')"><i class="bi bi-trash-fill fs-12"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
