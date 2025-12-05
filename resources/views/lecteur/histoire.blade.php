@extends('lecteur.layouts')

@section('content')
    <!-- Hero Section Histoires & Contes -->
    <section class="relative h-screen overflow-hidden">
        <img 
            src="{{ asset('assets/images/histoire.jpg') }}" 
            alt="Traditions du Bénin" 
            class="absolute inset-0 w-full h-full object-cover"
        >
        <div class="video-overlay"></div>
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Histoires & Contes du Bénin</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mb-8">
                Plongez dans l'univers fascinant des contes traditionnels béninois, 
                où sagesse, humour et leçons de vie se mêlent dans un héritage oral précieux
            </p>
             <div class="flex flex-col sm:flex-row gap-4">
                <a href="#histoires" class="bg-white text-amber-800 px-8 py-3 rounded-full font-semibold hover:bg-amber-50 transition">
                Découvrir les histoires
                </a>
                <a href="{{ route('auteur.register') }}" class="bg-amber-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-amber-700 transition border border-amber-500">
                    Publier une histoire
                </a>
            </div>
            
        </div>
    </section>

    <!-- Section Histoires & Contes -->
    <section class="py-20 bg-white" id="histoires">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Tradition Orale</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Trésors de la Tradition Orale</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Des récits qui traversent les générations, porteurs de notre identité culturelle</p>
            </div>

            @if($histoires->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($histoires as $histoire)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                                @if($histoire->media->count() > 0)
                                    <img src="{{ asset($histoire->media->first()->chemin) }}" 
                                         alt="{{ $histoire->titre }}" 
                                         class="w-full h-48 object-cover">
                                @else
                                    <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                         alt="{{ $histoire->titre }}" 
                                         class="w-full h-48 object-cover">
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $histoire->titre }}</h3>
                                    <span class="bg-amber-700 text-white px-3 py-1 rounded-full text-sm">
                                        {{ $histoire->type->nom ?? 'Histoire' }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($histoire->texte), 150) }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-700 font-semibold">
                                        min
                                    </span>
                                     <a href="{{ route('paiement.histoire.initier', $histoire->id) }}" class="text-amber-700 hover:text-amber-800 transition">
                                           Lire l'histoire <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                                @if($histoire->region)
                                    <div class="mt-3 pt-3 border-t border-gray-100">
                                        <span class="text-sm text-gray-500">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            {{ $histoire->region->nom_region }}
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
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Aucune histoire disponible</h3>
                    <p class="text-gray-600">Revenez bientôt pour découvrir nos contes et histoires.</p>
                </div>
            @endif
        </div>
    </section>



    <!-- Section Importance des Contes -->
    <section class="py-20 bg-[#e9dbc6]" id="importance-contes">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Valeur Culturelle</span>
                    <h2 class="text-4xl font-bold mt-2 mb-6 text-gray-800">L'Art du Conte au Bénin</h2>
                    <div class="space-y-4 text-gray-600">
                        <p class="text-lg">
                            Les contes et histoires traditionnelles sont bien plus que du divertissement. 
                            Ils constituent la mémoire vivante de notre peuple, transmettant valeurs, 
                            sagesse et histoire de génération en génération.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-book text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Transmission des Valeurs</h4>
                                    <p class="text-gray-600">Chaque conte enseigne des leçons de vie, de morale et de sagesse pratique.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-history text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Préservation de l'Histoire</h4>
                                    <p class="text-gray-600">Les récits préservent la mémoire des événements et personnages historiques importants.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-users text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Cohésion Sociale</h4>
                                    <p class="text-gray-600">Les séances de contes rassemblent les communautés et renforcent les liens.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <i class="fas fa-theater-masks text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Art de la Parole</h4>
                                    <p class="text-gray-600">Le conteur maîtrise l'art de captiver son audience par le rythme, les intonations et les gestes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg h-96"> <!-- Fixons une hauteur ou utilisons une hauteur relative -->
                        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                            <source src="{{ asset('assets/videos/griot.mp4') }}" type="video/mp4">
                            Votre navigateur ne supporte pas la lecture de vidéos.
                        </video>
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-amber-700 text-white p-6 rounded-2xl shadow-lg">
                        <h3 class="text-xl font-bold">+100 Contes</h3>
                        <p class="text-amber-100">Documentés et préservés</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galerie Contes -->
    <section class="py-20 bg-[#f5f5dc]" id="galerie-contes">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Galerie</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">L'Univers des Contes en Images</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Scènes de la vie traditionnelle et illustrations des récits populaires</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/conteur.jpg')}}" 
                             alt="Conteur traditionnel" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Conteur en Action</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (13).jpg')}}" 
                             alt="Art traditionnel" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Art Visuel</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (14).jpg')}}" 
                             alt="Cérémonie traditionnelle" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Cérémonie Culturelle</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/masq.jpg')}}" 
                             alt="Masques traditionnels" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Masques Rituels</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Fonction pour calculer le temps de lecture
    function calculateReadingTime(text) {
        const wordsPerMinute = 200;
        const words = text.split(/\s+/).length;
        return Math.ceil(words / wordsPerMinute);
    }
</script>


@endpush