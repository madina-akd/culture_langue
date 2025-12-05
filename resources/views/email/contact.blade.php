<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouveau message de contact - Culture Bénin</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #d97706, #b45309); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f8fafc; padding: 20px; border: 1px solid #e2e8f0; }
        .footer { background: #f1f5f9; padding: 15px; text-align: center; font-size: 12px; color: #64748b; border-radius: 0 0 10px 10px; }
        .info-item { margin-bottom: 10px; }
        .label { font-weight: bold; color: #475569; }
        .message-box { background: white; padding: 15px; border-left: 4px solid #d97706; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouveau Message de Contact</h1>
            <p>Patrimoine Culturel Béninois</p>
        </div>
        
        <div class="content">
            <h2>Informations du contact</h2>
            
            <div class="info-item">
                <span class="label">Nom complet :</span>
                {{ $prenom }} {{ $nom }}
            </div>
            
            <div class="info-item">
                <span class="label">Email :</span>
                <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
            
            <div class="info-item">
                <span class="label">Sujet :</span>
                {{ ucfirst($sujet) }}
            </div>
            
            <div class="info-item">
                <span class="label">Date d'envoi :</span>
                {{ now()->format('d/m/Y à H:i') }}
            </div>
            
            <h3>Message :</h3>
            <div class="message-box">
                {!! nl2br(e($message)) !!}
            </div>
        </div>
        
        <div class="footer">
            <p>Ce message a été envoyé depuis le formulaire de contact du site Culture Bénin.</p>
            <p>© {{ date('Y') }} Patrimoine Béninois. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>