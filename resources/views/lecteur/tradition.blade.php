@extends('lecteur.layouts')

@section('content')

    <!-- Hero Section Traditions -->
    <section class="relative h-screen overflow-hidden">
        <img 
        src="{{ asset('assets/images/vodun.jpg') }}" 
        alt="Traditions du Bénin" 
        class="absolute inset-0 w-full h-full object-cover"
         >
        <div class="video-overlay"></div>
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Traditions Béninoises</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mb-8">
                Explorez la richesse des coutumes ancestrales, des rituels sacrés 
                et des pratiques culturelles qui définissent l'identité du peuple béninois
            </p>
             <div class="flex flex-col sm:flex-row gap-4">
               <a href="#traditions" class="bg-white text-amber-800 px-8 py-3 rounded-full font-semibold hover:bg-amber-50 transition">
                Découvrir les traditions
               </a>
                <a href="{{ route('auteur.register') }}" class="bg-amber-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-amber-700 transition border border-amber-500">
                    Publier une tradition
                </a>
            </div>
            
        </div>
    </section>

    <!-- Section Traditions -->
    <section class="py-20 bg-white" id="traditions">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Patrimoine Culturel</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Patrimoine Culturel Vivant</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Des pratiques ancestrales qui continuent de rythmer la vie des communautés</p>
            </div>



  @if($traditions->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($traditions as $tradition)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                                @if($tradition->media->count() > 0)
                                    <img src="{{ asset($tradition->media->first()->chemin) }}" 
                                         alt="{{ $tradition->titre }}" 
                                         class="w-full h-48 object-cover">
                                @else
                                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                         alt="{{ $tradition->titre }}" 
                                         class="w-full h-48 object-cover">
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $tradition->titre }}</h3>
                                    <span class="bg-amber-700 text-white px-3 py-1 rounded-full text-sm">
                                        {{ $tradition->type->nom ?? 'tradition' }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($tradition->texte), 150) }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-700 font-semibold">
                                        min
                                    </span>
                                    <a href="{{ route('paiement.tradition.initier', $tradition->id) }}" class="text-amber-700 hover:text-amber-800 transition">
                                        Lire la tradition <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                                @if($tradition->region)
                                    <div class="mt-3 pt-3 border-t border-gray-100">
                                        <span class="text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            {{ $tradition->region->nom_region }}
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
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Aucune tradition disponible</h3>
                    <p class="text-gray-600">Revenez bientôt pour découvrir nos délicieux mets.</p>
                </div>
            @endif
        </div>
    </section>


    <!-- Section Importance des Traditions -->
    <section class="py-20 bg-[#e9dbc6]" id="importance-traditions">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Valeur Culturelle</span>
                    <h2 class="text-4xl font-bold mt-2 mb-6 text-gray-800">Le Lien avec Nos Ancêtres</h2>
                    <div class="space-y-4 text-gray-600">
                        <p class="text-lg">
                            Les traditions béninoises constituent un pont vivant entre le passé et le présent, 
                            préservant notre identité culturelle tout en évoluant avec notre société moderne.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-link text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Continuité Culturelle</h4>
                                    <p class="text-gray-600">Maintien du lien avec nos ancêtres et transmission de leur sagesse.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-balance-scale text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Cadre Social</h4>
                                    <p class="text-gray-600">Les traditions fournissent un cadre moral et social pour la communauté.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-seedling text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Développement Durable</h4>
                                    <p class="text-gray-600">Savoir-faire écologiques et gestion durable des ressources naturelles.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <i class="fas fa-hands-helping text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Cohésion Communautaire</h4>
                                    <p class="text-gray-600">Renforcement des liens sociaux et de l'entraide entre générations.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg h-96"> <!-- Fixons une hauteur ou utilisons une hauteur relative -->
                        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                            <source src="{{ asset('assets/videos/tradi.mp4') }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-amber-700 text-white p-6 rounded-2xl shadow-lg">
                        <h3 class="text-xl font-bold">+200 Ans</h3>
                        <p class="text-amber-100">d'Histoire préservée</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galerie Traditions -->
    <section class="py-20 bg-[#f5f5dc]" id="galerie-traditions">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Galerie</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Traditions en Images</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Captures des pratiques culturelles vivantes à travers le Bénin</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/Guelede mask dancers.jpg')}}" 
                             alt="Cérémonie Guélédé" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Cérémonie Guélédé</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (11).jpg')}}" 
                             alt="Artisanat local" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Artisanat Local</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/rituel.jpg')}}" 
                             alt="Rituel Vodoun" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Rituel Vodoun</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (12).jpg')}}" 
                             alt="Danse traditionnelle" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Danse Traditionnelle</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection