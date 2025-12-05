<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Benin Découverte</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Segoe UI", sans-serif;
      background: linear-gradient(135deg, #0a3d2b 10%, #f1c27d 100%);
      color: white;
    }

    /* NAVBAR */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.3rem 3rem;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo img {
      width: 100px;
      height: 100px;
    }

    .logo-text {
      font-size: 1.8rem;
      font-weight: bold;
      color: #fbbf24;
      text-decoration: none;
    }

    .visit-btn {
      background-color: #fbbf24;
      color: #000;
      padding: 0.5rem 1.3rem;
      border-radius: 20px;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
    }

    .visit-btn:hover {
      background-color: #d97706;
      color: white;
    }

    /* MAIN CONTENT */
    main {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 4rem 3rem;
      gap: 4rem;
      flex-wrap: wrap;
    }

    .content {
      flex: 1;
      min-width: 320px;
    }

    h1 {
      font-size: 3.2rem;
      font-weight: 800;
      margin-bottom: 1rem;
      color: #fbbf24;
    }

    p {
      max-width: 550px;
      font-size: 1.1rem;
      color: #e5e7eb;
      margin-bottom: 2rem;
    }

    .spline-embed {
      flex: 1;
      min-width: 320px;
      height: 480px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .spline-embed iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    @media (max-width: 768px) {
      main {
        flex-direction: column;
        text-align: center;
      }
    }
  </style>
</head>

<body>

  <header>
    <nav class="navbar">

      <!-- LOGO + TEXTE -->
      <div class="logo">
        <img src="{{ asset('assets/images/icon-removebg-preview.png') }}" alt="Benin Découverte"  class="w-15 h-1">
        <a href="{{ route('index') }}" class="logo-text">Benin Découverte</a>
      </div>

      <!-- BOUTON VISITER -->
      <a class="visit-btn" href="{{ route('index') }}">Visiter &gt;</a>

    </nav>
  </header>

  <main>

    <div class="content">
      <h1>Explorez le Bénin autrement</h1>
      <p>
        Découvrez la richesse culturelle, les sites touristiques, la nature et les traditions du Bénin. 
        Une plateforme moderne et immersive pour vous guider à travers les merveilles du pays.
      </p>
    </div>

    <!-- ANIMATION -->
    <div class="spline-embed">
      <iframe src="https://my.spline.design/retrofuturismbganimation-GqosCTdAIfHHoOYTB1yPfY5R/" allowfullscreen></iframe>
    </div>

  </main>

</body>
</html>
