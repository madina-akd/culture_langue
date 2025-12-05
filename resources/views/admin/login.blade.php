<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <title>AdminDina | Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />

  <!-- Bootstrap & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}" />
  
  <style>
    .login-page {
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      min-height: 100vh;
      display: flex;
      align-items: center;
    }
    .login-logo img {
      width: 80px;
      height: 80px;
      margin-bottom: 15px;
      border-radius: 50%;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .login-logo a {
      font-size: 1.8rem;
      font-weight: 700;
      color: #2e7d32;
      text-decoration: none;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .login-card-body {
      padding: 2rem;
    }
    .btn-success {
      background: linear-gradient(135deg, #4caf50, #2e7d32);
      border: none;
    }
    .btn-success:hover {
      background: linear-gradient(135deg, #2e7d32, #1b5e20);
      transform: translateY(-2px);
    }
  </style>
</head>
<body class="login-page bg-light">

  <div class="login-box">
    <!-- Logo avec votre image -->
    <div class="login-logo text-center">
      <img
        src="{{ asset('assets/images/icon.png') }}"
        alt="AdminDina Logo"
        class="brand-image opacity-75 shadow"
      />
      <br>
      <a href="#"><b>AdminDina</b></a>
      <p class="text-muted mt-2">Culture Bénin</p>
    </div>

    <!-- Card -->
    <div class="card shadow-sm">
      <div class="card-body login-card-body">

        <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

        <!-- Affichage des erreurs -->
        @if($errors->any())
          <div class="alert alert-danger">
            @foreach($errors->all() as $error)
              <p class="mb-0"><i class="bi bi-exclamation-triangle me-2"></i>{{ $error }}</p>
            @endforeach
          </div>
        @endif

        @if(session('success'))
          <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
          </div>
        @endif

        <!-- Formulaire -->
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-3">
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-envelope"></i>
              </span>
              <input type="email" name="email" class="form-control" placeholder="Adresse email" value="{{ old('email') }}" required>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-lock"></i>
              </span>
              <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-success w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
              </button>
            </div>
          </div>
        </form>

        <!-- Options supplémentaires -->
        <div class="mt-4">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Se souvenir de moi</label>
          </div>
        </div>

        <!-- Liens supplémentaires -->
        <div class="mt-4 text-center">
          <p class="mb-2">
           
              <i class="bi bi-key me-1"></i>Mot de passe oublié ?
            </a>
          </p>
          <p class="mb-0">
            <a href="{{ route('auteur.register') }}" class="text-decoration-none">
              <i class="bi bi-person-plus me-1"></i>Créer un compte auteur
            </a>
          </p>
        </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
  
  <script>
    // Focus sur le champ email au chargement
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelector('input[name="email"]').focus();
    });
  </script>
</body>
</html>