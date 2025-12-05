<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activer l'authentification à deux facteurs - Les Langues du Bénin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .card-header {
            background: linear-gradient(135deg, #4caf50, #2e7d32);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            text-align: center;
        }
        .qr-code-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        .step-number {
            background: #4caf50;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="mb-0">🔒 Activation de l'authentification à deux facteurs</h4>
                    </div>
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p class="mb-1">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="mb-4">
                            <p class="mb-3"><strong>Bonjour {{ $user->prenom }} {{ $user->nom }},</strong></p>
                            <p class="text-muted">Pour sécuriser votre compte, vous devez activer l'authentification à deux facteurs.</p>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="step-number">1</span>
                                <h6 class="mb-0">Téléchargez Google Authenticator</h6>
                            </div>
                            <p class="text-muted ms-5">Sur votre téléphone, installez l'application <strong>Google Authenticator</strong> depuis l'App Store ou Google Play Store.</p>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="step-number">2</span>
                                <h6 class="mb-0">Scannez le QR Code</h6>
                            </div>
                            <p class="text-muted ms-5 mb-3">Ouvrez Google Authenticator et scannez ce code QR :</p>
                            
                            <div class="text-center">
                                <div class="qr-code-container">
                                    @if($qrCodeSvg)
                                        {!! $qrCodeSvg !!}
                                    @else
                                        <div class="alert alert-warning">
                                            <p>QR Code non disponible. Utilisez la clé manuelle :</p>
                                            <code class="fs-5">{{ $secret }}</code>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-2">
                                <span class="step-number">3</span>
                                <h6 class="mb-0">Entrez le code de vérification</h6>
                            </div>
                            <p class="text-muted ms-5">Entrez le code à 6 chiffres généré par l'application :</p>
                            
                            <form method="POST" action="{{ route('twofactor.activate') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <input type="text" 
                                                   class="form-control form-control-lg @error('code') is-invalid @enderror" 
                                                   id="code" 
                                                   name="code" 
                                                   required 
                                                   maxlength="6"
                                                   placeholder="000000"
                                                   pattern="[0-9]{6}"
                                                   inputmode="numeric"
                                                   autofocus
                                                   style="font-size: 1.2rem; text-align: center; letter-spacing: 5px;">
                                            @error('code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success btn-lg w-100">
                                            Activer
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="alert alert-info">
                            <small>
                                <strong>Clé secrète manuelle (alternative) :</strong><br>
                                <code class="fs-6">{{ $secret }}</code><br>
                                <em>Utilisez cette clé si vous ne pouvez pas scanner le QR Code. Ajoutez-la manuellement dans Google Authenticator.</em>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-focus sur le champ code
        document.getElementById('code')?.focus();
        
        // Auto-move to next input (si vous voulez 6 champs séparés)
        // Vous pouvez implémenter un système à 6 champs si préféré
    </script>
</body>
</html>