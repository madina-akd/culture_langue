
@extends('lecteur.layouts')

@section('content')
    <!-- Hero Section Recettes -->
    <section class="relative h-screen overflow-hidden">
        <img 
        src="{{asset('assets/images/télécharger (10).jpg')}}" 
        alt="Recettes du Bénin" 
        class="absolute inset-0 w-full h-full object-cover"
         >
        <div class="video-overlay"></div>
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Recettes Béninoises</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mb-8">
                Découvrez la richesse gastronomique du Bénin à travers ses plats traditionnels, 
                un véritable voyage culinaire au cœur de l'Afrique de l'Ouest
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#recettes" class="bg-white text-amber-800 px-8 py-3 rounded-full font-semibold hover:bg-amber-50 transition">
                    Découvrir les recettes
                </a>
                <a href="{{ route('auteur.register') }}" class="bg-amber-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-amber-700 transition border border-amber-500">
                    Publier une recette
                </a>
            </div>
            
        </div>
    </section>

    <!-- Section Recettes -->
    <section class="py-20 bg-white" id="recettes">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Gastronomie</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Nos Recettes Traditionnelles</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Des saveurs authentiques qui racontent les recettes culinaire du Bénin</p>
            </div>

             @if($recettes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($recettes as $recette)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                                @if($recette->media->count() > 0)
                                    <img src="{{ asset($recette->media->first()->chemin) }}" 
                                         alt="{{ $recette->titre }}" 
                                         class="w-full h-48 object-cover">
                                @else
                                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                         alt="{{ $recette->titre }}" 
                                         class="w-full h-48 object-cover">
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $recette->titre }}</h3>
                                    <span class="bg-amber-700 text-white px-3 py-1 rounded-full text-sm">
                                        {{ $recette->type->nom ?? 'Recette' }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($recette->texte), 150) }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-700 font-semibold">
                                        min
                                    </span>
                                    <a href="{{ route('paiement.recette.initier', $recette->id) }}" class="text-amber-700 hover:text-amber-800 transition">
                                        Lire la recette<i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                                @if($recette->region)
                                    <div class="mt-3 pt-3 border-t border-gray-100">
                                        <span class="text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            {{ $recette->region->nom_region }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-book-open text-amber-500 text-6xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Aucune recette disponible</h3>
                    <p class="text-gray-600">Revenez bientôt pour découvrir nos délicieux mets.</p>
                </div>
            @endif
        </div>
    </section>



    <!-- Section Richesse Gastronomique -->
    <section class="py-20 bg-[#e9dbc6]" id="richesse-gastronomique">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Valeur Culinaire</span>
                    <h2 class="text-4xl font-bold mt-2 mb-6 text-gray-800">La Richesse de la Gastronomie Béninoise</h2>
                    <div class="space-y-4 text-gray-600">
                        <p class="text-lg">
                            La cuisine béninoise est un véritable trésor culturel qui reflète la diversité ethnique 
                            et l'recette riche de notre pays. Chaque plat raconte une recette, chaque saveur 
                            transporte vers une région spécifique.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-seedling text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Ingrédients Locaux & Frais</h4>
                                    <p class="text-gray-600">Utilisation d'ingrédients 100% locaux : igname, maïs, gombo, arachides, poissons du fleuve...</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-history text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Savoir-Faire Ancestral</h4>
                                    <p class="text-gray-600">Des techniques de préparation transmises de génération en génération depuis des siècles.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-users text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Cuisine Communautaire</h4>
                                    <p class="text-gray-600">Une cuisine qui rassemble, se partage et célèbre les moments importants de la vie.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg h-96"> <!-- Fixons une hauteur ou utilisons une hauteur relative -->
                        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                            <source src="{{ asset('assets/videos/recette.mp4') }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                     </div>
                    <div class="absolute -bottom-6 -left-6 bg-amber-700 text-white p-6 rounded-2xl shadow-lg">
                        <h3 class="text-xl font-bold">+50 Recettes</h3>
                        <p class="text-amber-100">Traditionnelles documentées</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galerie Photos -->
    <section class="py-20 bg-[#f5f5dc]" id="galerie">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Galerie</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Galerie Gastronomique</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Un festin visuel des spécialités culinaires du Bénin</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/Fufu and soup.jpg')}}" 
                             alt="Plat béninois" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Pâte d'Igname</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (8).jpg')}}" 
                             alt="Sauce traditionnelle" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Sauce Gombo</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/riz.jpg')}}" 
                             alt="Riz béninois" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Riz au Gras</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/C.jpg')}}" 
                             alt="Beignets" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Beignets</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection