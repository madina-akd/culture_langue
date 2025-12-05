@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">Paramètres</h2>

    <!-- Onglets -->
    <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab">
                Profil
            </button>
        </li>
        <li class="nav-item " role="presentation">
            <button class="nav-link " id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
                Sécurité
            </button>
        </li>
        
       
    </ul>

    <!-- Contenu des onglets -->
    <div class="tab-content mt-3" id="settingsTabsContent">
        <!-- Profil -->
        <div class="tab-pane fade show active" id="profile" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" value="{{ old('nom', auth()->user()->nom) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo de profil</label>
                            <input type="file" name="photo" class="form-control">
                            @if(auth()->user()->photo)
                                <img src="{{ asset('assets/images/'.auth()->user()->photo) }}" class="mt-2 rounded-circle" width="80">
                            @endif
                        </div>
                        <button class="btn bg-success-subtle">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sécurité -->
        <div class="tab-pane fade" id="security" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.updatePassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Mot de passe actuel</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmer mot de passe</label>
                            <input type="password" name="new_password_confirmation" class="form-control">
                        </div>
                        <button class="btn btn-danger">Changer mot de passe</button>
                    </form>
                </div>
            </div>
        </div>

       
        
        </div>
    </div>
</div>
@endsection
