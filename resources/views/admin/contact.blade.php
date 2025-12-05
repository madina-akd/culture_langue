@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Header -->
    <!-- <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold">Tableau de bord Admin</h2>
            <p class="text-muted">Bienvenue dans votre espace d’administration</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="#" class="btn btn-primary">Paramètres</a>
        </div>
    </div> -->

    <!-- Contacts -->
    <div class="card mb-8">
        <div class="card-header bg-success-subtle text-dark">
            <h5 class="card-title mb-0">Contacts</h5>
        </div>
        <div class="card-body">
            <p><i class="bi bi-envelope-fill text-primary"></i> Email : <strong>{{ auth()->user()->email }}</strong></p>
            <p><i class="bi bi-telephone-fill text-success"></i> Téléphone : <strong>+229 01 64 78 00 67</strong></p>
            <p><i class="bi bi-geo-alt-fill text-danger"></i> Adresse : <strong>Cotonou, Bénin</strong></p>
            <p>
                <i class="bi bi-facebook text-primary"></i> 
                <i class="bi bi-twitter text-info"></i> 
                <i class="bi bi-linkedin text-primary"></i>
            </p>
        </div>
    </div>

    
   

</div>
@endsection
