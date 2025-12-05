@extends('lecteur.layouts')

@section('content')

    <section class="relative h-screen overflow-hidden">
        <img 
        src="{{ asset('assets/images/lang.png') }}" 
        alt="Langues du Bénin" 
        class="absolute inset-0 w-full h-full object-cover"
         >
        <div class="video-overlay"></div>
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">Langues du Bénin</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mb-8">
                Découvrez la richesse linguistique du Bénin, un patrimoine culturel vivant 
                qui unit les communautés et préserve l'identité nationale
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#langues" class="bg-white text-amber-800 px-8 py-3 rounded-full font-semibold hover:bg-amber-50 transition">
                Explorer les langues
                </a>
                <a href="{{ route('auteur.register') }}" class="bg-amber-600 text-white px-8 py-3 rounded-full font-semibold hover:bg-amber-700 transition border border-amber-500">
                    Publier une langue
                </a>
            </div>
            
        </div>
    </section>

    <!-- Section Langues Principales -->
    <section class="py-20 bg-white" id="langues">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Diversité Linguistique</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Les Langues Nationales du Bénin</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Plus de 50 langues locales coexistent au Bénin, témoignant de sa richesse culturelle</p>
            </div>

            @if($langues->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($langues as $langue)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                                <!-- Code langue comme image de fond -->
                                <div class="w-full h-48 bg-amber-100 flex items-center justify-center">
                                    <span class="text-6xl font-bold text-amber-800">{{ $langue->code_langue }}</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="text-xl font-bold text-gray-800">{{ $langue->nom_langue }}</h3>
                                    @php
                                        $badgeColors = [
                                            'Français' => 'bg-blue-600',
                                            'Fon' => 'bg-amber-700',
                                            'Yoruba' => 'bg-amber-600',
                                            'Bariba' => 'bg-amber-800',
                                            'Dendi' => 'bg-amber-500',
                                            'Adja' => 'bg-amber-600'
                                        ];
                                        $badgeColor = $badgeColors[$langue->nom_langue] ?? 'bg-amber-700';
                                        $badgeText = $langue->nom_langue == 'Français' ? 'Langue Officielle' : 'Langue Nationale';
                                    @endphp
                                    <span class="{{ $badgeColor }} text-white px-3 py-1 rounded-full text-sm">
                                        {{ $badgeText }}
                                    </span>
                                </div>
                                <p class="text-gray-600 mb-4">
 
                                    {{ Str::limit(strip_tags($langue->description ?? 'Langue parlée au Bénin.' ), 150) }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-700 font-semibold">Code: {{ $langue->code_langue }}</span>
                                    <a href="{{ route('langue.show', $langue->id) }}" class="text-amber-700 hover:text-amber-800 transition">
                                        En savoir plus <i class="fas fa-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-language text-amber-500 text-6xl mb-4"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Aucune langue disponible</h3>
                    <p class="text-gray-600">Les données linguistiques seront bientôt disponibles.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Section Importance des Langues -->
    <section class="py-20 bg-[#e9dbc6]" id="importance-langues">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Patrimoine Linguistique</span>
                    <h2 class="text-4xl font-bold mt-2 mb-6 text-gray-800">La Langue, Cœur de l'Identité Culturelle</h2>
                    <div class="space-y-4 text-gray-600">
                        <p class="text-lg">
                            Les langues du Bénin ne sont pas seulement des moyens de communication, 
                            mais des véhicules de savoir, de traditions et d'identité culturelle.
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-book text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Transmission des Savoirs</h4>
                                    <p class="text-gray-600">Les langues locales préservent les connaissances ancestrales et les traditions orales.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-users text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Cohésion Sociale</h4>
                                    <p class="text-gray-600">Elles renforcent les liens communautaires et l'appartenance culturelle.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-theater-masks text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Expression Culturelle</h4>
                                    <p class="text-gray-600">Chaque langue porte sa propre vision du monde et ses expressions artistiques.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <i class="fas fa-seedling text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Diversité Biologique</h4>
                                    <p class="text-gray-600">Les langues préservent des connaissances uniques sur la biodiversité locale.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{asset('assets/images/benin-language.jpg')}}" 
                             alt="Communauté linguistique" class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-amber-700 text-white p-6 rounded-2xl shadow-lg">
                        <h3 class="text-xl font-bold">+50 Langues</h3>
                        <p class="text-amber-100">Recensées au Bénin</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galerie Langues -->
    <section class="py-20 bg-[#f5f5dc]" id="galerie-langues">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Galerie</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Langues en Images</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">La diversité linguistique à travers les communautés béninoises</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/fon_3.jpg')}}" 
                             alt="Communauté Fon" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Communauté Fon</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/yoruba.jpg')}}" 
                             alt="Cérémonie Yoruba" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Cérémonie Yoruba</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/bariba.jpg')}}" 
                             alt="Artisanat Bariba" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Artisanat Bariba</span>
                    </div>
                </div>
                
                <div class="relative group overflow-hidden rounded-xl border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/dendi.png')}}" 
                             alt="Marché Dendi" class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <span class="text-white font-semibold">Marché Dendi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection