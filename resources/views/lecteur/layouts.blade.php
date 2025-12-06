<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Culture & Langues du Bénin' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   
    <style>
        :root {
            --beige: #f5f5f0;
            --beige-dark: #e8e6df;
            --beige-darker: #d6d4c8;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fefefe;
        }

        .nav-hidden {
            transform: translateY(-100%);
        }
        .nav-visible {
            transform: translateY(0);
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        header, section, main {
        scroll-margin-top: 80px;
        }
        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }
    </style>
</head>
<body class="bg-white text-gray-800">

<!-- NAVBAR -->
<nav id="navbar" class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-md shadow-sm transition-transform duration-300 nav-hidden z-50 border-b border-beige-200">
    <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
        <a class="text-xl font-bold text-amber-800 flex items-center gap-2" 
        href="{{ route('index') }}">

            <img src="{{ asset('assets/images/icon.png') }}" 
                alt="Logo" 
                class="w-10 h-10">

            Benin Découverte
        </a>

        <ul class="hidden md:flex space-x-8">
            <li><a href="{{ route('index') }}#contenus" class="hover:text-amber-700 transition">Contenus</a></li>
            <li><a href="{{ route('index') }}#langues" class="hover:text-amber-700 transition">Langues</a></li>
            <li><a href="{{ route('index') }}#medias" class="hover:text-amber-700 transition">Médias</a></li>
            <li><a href="{{ route('index') }}#regions" class="hover:text-amber-700 transition">Régions</a></li>
            <li><a href="{{ route('a_propos') }}" class="hover:text-amber-700 transition">A propos</a></li>
            <li><a href="{{ route('culturecontact') }}" class="hover:text-amber-700 transition">Contact</a></li>
            <!-- Dans la navbar desktop -->
            @if(Auth::check())
                <li class="relative">
                    <button id="user-menu-toggle" class="flex items-center hover:text-amber-700 transition">
                        <i class="fas fa-user-circle mr-1"></i>
                        {{ Auth::user()->prenom }}
                        <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <ul id="user-menu" class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-50 hidden">
                        <li><a href="{{ route('lecteur.profile.show') }}" class="block px-4 py-2 hover:bg-gray-100">Mon profil</a></li>
                        <li><a href="{{ route('lecteur.profile.commentaires') }}" class="block px-4 py-2 hover:bg-gray-100">Mes commentaires</a></li>
                        <li>
                            <form action="{{ route('lecteur.logout') }}" method="POST" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li><a href="{{ route('lecteur.register') }}" class="hover:text-amber-700 transition">S'inscrire</a></li>
                <li><a href="{{ route('lecteur.login') }}" class="hover:text-amber-700 transition">Connexion</a></li>
            @endif
        </ul>
        <button id="menu-toggle" class="md:hidden">
            <svg class="w-7 h-7 text-amber-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</nav>

<!-- Menu mobile -->
<div id="mobile-menu" class="fixed top-0 left-0 w-64 h-full bg-white/95 backdrop-blur-md transform -translate-x-full transition-transform duration-300 ease-in-out z-40 border-r border-beige-200">
    <div class="flex justify-between items-center px-6 py-4 border-b border-beige-200">
        <span class="text-amber-800 font-bold">Menu</span>
        <button id="menu-close" class="text-gray-600 hover:text-amber-700">
            <i class="fas fa-times text-xl"></i>
        </button>
    </div>
    <ul class="flex flex-col space-y-4 px-6 py-6 text-gray-700">
        <li><a href="{{ route('index') }}" class="hover:text-amber-700 transition py-2 block">Accueil</a></li>
        <li><a href="{{ route('index') }}#contenus" class="hover:text-amber-700 transition">Contenus</a></li>
        <li><a href="{{ route('index') }}#langues" class="hover:text-amber-700 transition">Langues</a></li>
        <li><a href="{{ route('index') }}#medias" class="hover:text-amber-700 transition">Médias</a></li>
        <li><a href="{{ route('index') }}#regions" class="hover:text-amber-700 transition">Régions</a></li>
        <li><a href="{{ route('a_propos') }}" class="hover:text-amber-700 transition">A propos</a></li>
        <li><a href="{{ route('culturecontact') }}" class="hover:text-amber-700 transition">Contact</a></li>
    </ul>

    <!-- Section authentification mobile -->
    <div class="px-6 py-4 border-t border-beige-200">
        @if(Auth::check())
            <div class="flex items-center mb-4">
                <i class="fas fa-user-circle mr-3 text-amber-800"></i>
                <span class="font-medium text-amber-800">{{ Auth::user()->prenom }}</span>
            </div>
            <ul class="space-y-2">
                <li><a href="{{ route('lecteur.profile.show') }}" class="block py-2 hover:text-amber-700 transition">Mon profil</a></li>
                <li><a href="{{ route('lecteur.profile.commentaires') }}" class="block py-2 hover:text-amber-700 transition">Mes commentaires</a></li>
                <li>
                    <form action="{{ route('lecteur.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left py-2 hover:text-amber-700 transition">
                            Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        @else
            <div class="space-y-3">
                <a href="{{ route('lecteur.login') }}" class="block w-full bg-amber-700 text-white text-center py-2 rounded-lg hover:bg-amber-800 transition">
                    Connexion
                </a>
                <a href="{{ route('lecteur.register') }}" class="block w-full bg-white text-amber-700 border border-amber-700 text-center py-2 rounded-lg hover:bg-amber-50 transition">
                    S'inscrire
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Contenu principal -->
<main>
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="bg-[#faf3e0] py-12 border-t border-beige-200">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4 text-amber-800">Promotion Culture & Langues du Bénin</h3>
                <p class="text-gray-600">Préservons et partageons la richesse culturelle du Bénin à travers ses histoires, traditions et langues.</p>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-amber-800">Contenus</h4>
                <ul class="space-y-2 text-gray-600">
                    <li><a href="{{ route('histoires.index') }}" class="hover:text-amber-700 transition">Histoires & Contes</a></li>
                    <li><a href="{{ route('recettes.index') }}" class="hover:text-amber-700 transition">Recettes</a></li>
                    <li><a href="{{ route('traditions.index') }}" class="hover:text-amber-700 transition">Tradition</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-amber-800">Navigation</h4>
                <ul class="space-y-2 text-gray-600">
                <li><a href="{{ route('index') }}#contenus" class="hover:text-amber-700 transition">Contenus</a></li>
                <li><a href="{{ route('index') }}#langues" class="hover:text-amber-700 transition">Langues</a></li>
                <li><a href="{{ route('index') }}#medias" class="hover:text-amber-700 transition">Médias</a></li>
                <li><a href="{{ route('index') }}#regions" class="hover:text-amber-700 transition">Régions</a></li>
    
                </ul>
            </div>
           <div>
    <h4 class="font-bold mb-4 text-amber-800">Nous suivre</h4>

    <!-- Icônes réseaux sociaux -->
    <div class="flex space-x-4 mb-4">
        <a href="#" class="w-10 h-10 bg-beige-200 rounded-full flex items-center justify-center hover:bg-amber-700 hover:text-white transition text-gray-600">
            <i class="fab fa-facebook-f"></i>
        </a>

        <a href="#" class="w-10 h-10 bg-beige-200 rounded-full flex items-center justify-center hover:bg-amber-700 hover:text-white transition text-gray-600">
            <i class="fab fa-twitter"></i>
        </a>

        <a href="#" class="w-10 h-10 bg-beige-200 rounded-full flex items-center justify-center hover:bg-amber-700 hover:text-white transition text-gray-600">
            <i class="fab fa-instagram"></i>
        </a>
    </div>

    <!-- Liens simples -->
        <div class="flex flex-col space-y-2">
            <a href="{{ route('a_propos') }}" class="hover:text-amber-700 transition">À propos</a>
            <a href="{{ route('culturecontact') }}" class="hover:text-amber-700 transition">Contact</a>
        </div>
    </div>

        </div>
        <div class="border-t border-beige-300 mt-8 pt-8 text-center text-gray-500">
            <p>&copy; 2023 Promotion Culture & Langues du Bénin. Tous droits réservés.</p>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script>
    // Navigation mobile
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.remove('-translate-x-full');
    });

    menuClose.addEventListener('click', () => {
        mobileMenu.classList.add('-translate-x-full');
    });

    // Navigation de la navbar
    let lastScroll = 0;
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll < lastScroll) {
            navbar.classList.remove('nav-hidden');
            navbar.classList.add('nav-visible');
        } else {
            navbar.classList.remove('nav-visible');
            navbar.classList.add('nav-hidden');
        }

        lastScroll = currentScroll;
    });

    // Gestion du menu utilisateur desktop
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenu = document.getElementById('user-menu');

    if (userMenuToggle && userMenu) {
        userMenuToggle.addEventListener('click', (e) => {
            e.preventDefault();
            userMenu.classList.toggle('hidden');
        });

        // Fermer le menu si on clique ailleurs
        document.addEventListener('click', (e) => {
            if (!userMenuToggle.contains(e.target) && !userMenu.contains(e.target)) {
                userMenu.classList.add('hidden');
            }
        });
    }
</script>
@yield('scripts')
</body>
</html>
