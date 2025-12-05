@extends('lecteur.layouts')
@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-sA+e2XgqQjH1f9gq8kq2n0b3G+KxQY1Z4f6bM2w5r1w=" crossorigin=""/>
<style>
html,body,#map { height: 100%; margin: 0; padding: 0; }
body { font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; }
.app { display: grid; grid-template-columns: 320px 1fr; height: 100vh; }
.sidebar { padding: 12px; border-right: 1px solid #eee; overflow-y: auto; background: #fbfbfb; }
.sidebar h2 { margin: 0 0 8px 0; font-size: 18px; }
.regions { list-style: none; padding: 0; margin: 0; }
.regions li { padding: 6px 8px; margin-bottom: 6px; cursor: pointer; border-radius: 6px; }
.regions li:hover { background: #f0f0f0; }
.info { margin-top: 8px; font-size: 14px; color: #333; }
#map { width: 100%; height: 100%; }
.leaflet-container { background: #e6f2ff; }
.highlight { weight: 3; color: #2a9df4; opacity: 1; }
</style>
@endsection

@section('content')
    <!-- Hero Section Régions -->
    <section class="relative h-screen overflow-hidden">
        <img 
        src="{{ asset('assets/images/benin.png') }}" 
        alt="Régions du Bénin" 
        class="absolute inset-0 w-full h-full object-cover"
         >
        <div class="video-overlay"></div>
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Régions du Bénin</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mb-8">
                Explorez la diversité géographique et culturelle des 12 départements du Bénin, 
                chacun avec ses spécificités et son patrimoine unique
            </p>
            
            <a href="#regions" class="bg-white text-amber-800 px-8 py-3 rounded-full font-semibold hover:bg-amber-50 transition">
                Découvrir les régions
            </a>
        </div>
    </section>

    <!-- Section Régions -->
    <section class="py-20 bg-white" id="regions">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Géographie Culturelle</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Les 12 Départements du Bénin</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">De la côte atlantique aux savanes du nord, chaque région offre un visage unique du Bénin</p>
            </div>

            @if($regions->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($regions as $region)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                                <!-- Image de fond avec code couleur basé sur le nom de la région -->
                                <div class="w-full h-48 bg-gradient-to-br from-amber-100 to-amber-200 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-amber-800">{{ substr($region->nom_region, 0, 3) }}</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $region->nom_region }}</h3>
                                    @php
                                        $badgeColors = [
                                            'Atlantique' => 'bg-amber-700',
                                            'Littoral' => 'bg-amber-600',
                                            'Ouémé' => 'bg-amber-800',
                                            'Plateau' => 'bg-amber-500',
                                            'Zou' => 'bg-amber-600',
                                            'Collines' => 'bg-green-600',
                                            'Borgou' => 'bg-amber-700',
                                            'Alibori' => 'bg-amber-800',
                                            'Atacora' => 'bg-amber-600',
                                            'Donga' => 'bg-amber-500',
                                            'Mono' => 'bg-amber-700',
                                            'Couffo' => 'bg-amber-600'
                                        ];
                                        $badgeColor = $badgeColors[$region->nom_region] ?? 'bg-amber-700';
                                        
                                        $badgeTexts = [
                                            'Atlantique' => 'Côte',
                                            'Littoral' => 'Portuaire',
                                            'Ouémé' => 'Historique',
                                            'Plateau' => 'Agricole',
                                            'Zou' => 'Royal',
                                            'Collines' => 'Vallonné',
                                            'Borgou' => 'Nord',
                                            'Alibori' => 'Frontalier',
                                            'Atacora' => 'Montagneux',
                                            'Donga' => 'Central',
                                            'Mono' => 'Lacustre',
                                            'Couffo' => 'Agricole'
                                        ];
                                        $badgeText = $badgeTexts[$region->nom_region] ?? 'Région';
                                    @endphp
                                    <span class="{{ $badgeColor }} text-white px-3 py-1 rounded-full text-sm">
                                        {{ $badgeText }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4">
                                     {{ Str::limit(strip_tags($region->description ?? 'Région du Bénin riche en culture et traditions.' ), 150) }}
                                </p>
                                <div class="flex justify-between items-center">
                                    @if($region->localisation)
                                        <span class="text-amber-700 font-semibold">{{ $region->localisation }}</span>
                                    @else
                                        <span class="text-amber-700 font-semibold">Bénin</span>
                                    @endif
                                    <a href="{{ route('region.show', $region->id) }}" class="text-amber-700 hover:text-amber-800 transition">
                                        Explorer <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                                @if($region->population || $region->superficie)
                                    <div class="mt-3 pt-3 border-t border-gray-100 flex justify-between text-sm text-gray-500">
                                        @if($region->population)
                                            <span> {{ number_format($region->population, 0, ',', ' ') }} hab.</span>
                                        @endif
                                        @if($region->superficie)
                                            <span> {{ number_format($region->superficie, 0, ',', ' ') }} km²</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-map text-amber-500 text-6xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Aucune région disponible</h3>
                    <p class="text-gray-600">Les données régionales seront bientôt disponibles.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- ... le reste de votre code (Section Carte du Bénin et Galerie) reste inchangé ... -->

    <!-- Section Carte du Bénin -->
    <section class="py-20 bg-[#e9dbc6]" id="carte-benin">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Géographie</span>
                    <h2 class="text-4xl font-bold mt-2 mb-6 text-gray-800">Une Mosaïque de Paysages et de Cultures</h2>
                    <div class="space-y-4 text-gray-600">
                        <p class="text-lg">
                            Le Bénin s'étend sur 112 622 km², offrant une diversité géographique remarquable 
                            qui influence directement les cultures et modes de vie de ses habitants.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-water text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Région Côtière</h4>
                                    <p class="text-gray-600">Plages, lagunes et villes portuaires caractérisent le sud du pays.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-mountain text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Région des Plateaux</h4>
                                    <p class="text-gray-600">Terres fertiles et paysages vallonnés au centre du pays.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-tree text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Région du Nord</h4>
                                    <p class="text-gray-600">Savanes, parcs nationaux et terres d'élevage.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg bg-white p-6">
                        <!-- Carte simplifiée du Bénin -->
                        <aside class="sidebar">
                            <h2>Carte interactive du Bénin</h2>
                            <p>Cliquez sur une région sur la carte ou sélectionnez-la dans la liste pour explorer.</p>
                             <div class="map-container mb-8">
                                   <!-- Google Maps iframe -->
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4047319.963345527!2d0.72212455!3d8.3076355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1034deb3127e6901%3A0x8b06b4a3a9c1389d!2sB%C3%A9nin!5e0!3m2!1sfr!2sfr!4v1689682880249!5m2!1sfr!2sfr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            </aside>


                            <div id="map"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-amber-700 text-white p-6 rounded-2xl shadow-lg">
                        <h3 class="text-xl font-bold">12 Départements</h3>
                        <p class="text-amber-100">77 Communes</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galerie Régions -->
    <section class="py-20 bg-[#f5f5dc]" id="galerie-regions">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Galerie</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Régions en Images</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">La diversité géographique et culturelle à travers tout le Bénin</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/cote.jpg')}}" 
                             alt="Côte Atlantique" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Côte Atlantique</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/no.jpg')}}" 
                             alt="Nord Bénin" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Nord Bénin</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/R.jpg')}}" 
                             alt="Région Centrale" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Région Centrale</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/sud.jpg')}}" 
                             alt="Sud-Ouest" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Sud-Ouest</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialisation de la carte
    const map = L.map('map').setView([9.3077, 2.3158], 7);
    
    // Ajout du fond de carte
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    
    // Exemple de marqueurs (à remplacer par des données dynamiques)
    const markers = [
        { lat: 6.4969, lng: 2.6043, title: 'Cotonou', type: 'city' },
        { lat: 6.3176, lng: 2.4667, title: 'Ouidah', type: 'historic' },
        { lat: 7.1907, lng: 2.1000, title: 'Abomey', type: 'historic' }
    ];
    
    // Ajout des marqueurs sur la carte
    markers.forEach(marker => {
        L.marker([marker.lat, marker.lng])
            .bindPopup(marker.title)
            .addTo(map);
    });
    
    // Gestion des filtres
    const filterButtons = document.querySelectorAll('[data-filter]');
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;
            // Logique de filtrage à implémenter
        });
    });
});

        // Simple script for mobile menu toggle (could be enhanced)
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.md\\:hidden');
            const navLinks = document.querySelector('.md\\:flex');
            
            mobileMenuButton.addEventListener('click', function() {
                navLinks.classList.toggle('hidden');
                navLinks.classList.toggle('flex');
                navLinks.classList.toggle('flex-col');
                navLinks.classList.toggle('absolute');
                navLinks.classList.toggle('top-16');
                navLinks.classList.toggle('left-0');
                navLinks.classList.toggle('right-0');
                navLinks.classList.toggle('bg-green-800');
                navLinks.classList.toggle('p-4');
                navLinks.classList.toggle('space-y-4');
                navLinks.classList.toggle('space-x-8');
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (!navLinks.classList.contains('hidden')) {
                        mobileMenuButton.click();
                    }
                });
            });
        });
</script>

@endsection
