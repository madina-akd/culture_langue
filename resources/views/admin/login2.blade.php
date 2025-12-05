<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <title>AdminDina | Vérification 2FA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap & Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}" />
</head>
<body class="login-page bg-light">

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Admin</b>Culture Bénin</a>
    </div>

    <div class="card shadow-sm">
      <div class="card-body login-card-body">

        <p class="login-box-msg">Entrez votre code Google Authenticator</p>

        <!-- Formulaire OTP -->
        <form method="POST" action="{{ route('twofactor.verify') }}">
          @csrf
          <div class="mb-3">
            <input type="text" name="code" class="form-control text-center" placeholder="123456" required>
          </div>
          <button type="submit" class="btn btn-success w-100">
            <i class="bi bi-shield-lock"></i> Vérifier
          </button>
        </form>

        <p class="mt-3 text-center">
          <a href="{{ route('login.form') }}">Retour à la connexion</a>
        </p>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
</body>
</html>
