@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="fw-bold">Liste des Médias</h3>
                <a href="{{ route('media.create') }}" class="btn btn-sm bg-success-subtle float-end">
                    <i class="bi bi-plus-lg"></i> Ajouter un média
                </a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Chemin</th>
                            <th>Description</th>
                           
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medias as $media)
                            <tr>
                                <td>{{ $media->id }}</td>
                                <td>{{ $media->chemin }}</td>
                                <td>{{ $media->description }}</td>
                               
                                <td>
                                    <a href="{{ route('media.show', $media) }}" class="text-primary"><i class="bi bi-eye-fill fs-12"></i></a>
                                    <a href="{{ route('media.edit', $media->id) }}" class="text-warning"><i class="bi bi-pencil-square fs-12"></i></a>
                                    @if(auth()->user()->id_role == 3)
                                    <form action="{{ route('media.destroy', $media->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-danger" onclick="return confirm('Supprimer ce média ?')"><i class="bi bi-trash-fill fs-12"></i></button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            
        </div>
    </div>
</div>
@endsection
