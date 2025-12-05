@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h4 class="card-title">Media Details</h4>
        </div>

        <div class="card-body">
            <p><strong>ID :</strong> {{ $media->id }}</p>

            <p><strong>Chemin :</strong> {{ $media->chemin }}</p>

            <p><strong>Description :</strong><br>
                {{ $media->description }}
            </p>

            <p><strong>TypeMedia :</strong> 
                {{ $media->typemedia->nom ?? 'N/A' }}
            </p>

            <p><strong>Contenu :</strong> 
                {{ $media->contenu->titre ?? 'N/A' }}
            </p>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('media.index') }}" class="btn btn-secondary">Back</a>

            <a href="{{ route('media.edit', $media->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

@endsection
