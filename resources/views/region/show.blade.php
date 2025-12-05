@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h4 class="card-title">Region Details</h4>
        </div>

        <div class="card-body">

            <p><strong>ID :</strong> {{ $region->id }}</p>

            <p><strong>Region Name :</strong> {{ $region->nom_region }}</p>
              <p><strong>Description :</strong><br>
                {{ $region->description }}
            </p>
            <p><strong>Population :</strong> {{ $region->population }}</p>
             <p><strong>Superficie :</strong> {{ $region->superficie }} km²</p>
              <p><strong>Localisation :</strong> {{ $region->localisation }}</p>

           

        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('regions.index') }}" class="btn btn-secondary">Back</a>

            <a href="{{ route('regions.edit', $region->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>

@endsection
