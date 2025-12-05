@extends('lecteur.layouts')

@section('content')

<!-- HERO VIDEO -->

<section class="relative h-[100vh] w-full overflow-hidden">

    <!-- Vidéo en full screen -->
    <video autoplay muted loop playsinline 
        class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('assets/videos/projet.mp4') }}" type="video/mp4">
    </video>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Contenu -->
    <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
            À la Découverte des Richesses du Bénin
        </h1>
        <p class="text-xl md:text-2xl text-white/90 max-w-3xl mb-8">
            Terre de traditions, d'histoires, de langues, de recettes, de danses et de savoir-faire.
        </p>
        <a href="#contenus"
            class="bg-white text-amber-800 px-8 py-3 rounded-full font-semibold hover:bg-amber-50 transition transform hover:scale-105">
            Explorer la culture
        </a>
    </div>

</section>


<!-- HISTOIRE -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-500/10 to-amber-600/20 z-10"></div>
            <img src="{{ asset('assets/images/Monuments Bio Guera.jpg') }}" class="w-full h-80 object-cover" alt="Histoire du Bénin">
        </div>
        <div>
            <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Histoire & Héritage</span>
            <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Un Passé Puissant et Inspirant</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Le Bénin est le berceau de royaumes prestigieux comme le Dahomey, réputé pour son organisation politique,
                ses femmes guerrières légendaires et ses palais royaux inscrits au patrimoine mondial.
                Entre traditions orales, récits héroïques et rites ancestraux, l'histoire béninoise continue de marquer l'identité du peuple.
            </p>
            <a href="{{ route('histoires.index') }}" class="inline-flex items-center text-amber-700 hover:text-amber-800 font-semibold transition">
                Voir plus d'histoires
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- LANGUES -->
<section id="langues"class="py-20 bg-beige-50">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Diversité Linguistique</span>
            <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Une Palette de Langues et de Cultures</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Le Bénin est un pays multilingue.
                Du fon au yoruba, du baatonu au mina, du dendi au adja, chaque langue porte un univers culturel,
                des valeurs, des expressions et une musique unique.
                Elles sont le lien entre les générations et un pilier de l'identité nationale.
            </p>
            <a href="{{route('langue.index')}}" class="inline-flex items-center text-amber-700 hover:text-amber-800 font-semibold transition">
                Explorer les langues
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-l from-amber-500/10 to-amber-600/20 z-10"></div>
            <img src="{{ asset('assets/images/télécharger (7).jpg') }}" class="w-full h-80 object-cover" alt="Langues du Bénin">
        </div>
    </div>
</section>

<!-- REGIONS -->
<section id="regions"class="py-20 bg-white">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div class="relative rounded-xl overflow-hidden shadow-lg">
            <div class="absolute inset-0 bg-gradient-to-r from-amber-500/10 to-amber-600/20 z-10"></div>
            <img src="{{ asset('assets/images/paysage.jpg') }}" class="w-full h-80 object-cover" alt="Régions du Bénin">
        </div>
        <div>
            <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Territoires & Régions</span>
            <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Un Pays aux Mille Paysages</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Du Sud lacustre aux terres rouges du Centre, des savanes du Nord aux côtes du littoral,
                chaque région du Bénin offre une identité propre : traditions, danses, célébrations, arts, habitats et modes de vie.
                Cette diversité géographique crée une mosaïque culturelle remarquable.
            </p>
            <a href="{{route('region.index')}}" class="inline-flex items-center text-amber-700 hover:text-amber-800 font-semibold transition">
                Découvrir les régions
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Section Contenus -->
<section id="contenus" class="py-20 bg-[#e9dbc6]">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-12 text-amber-800">Nos Contenus Culturels</h2>
        
        <!-- Navigation des sous-sections -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="contenu-category px-6 py-3 bg-amber-700 text-white rounded-full font-semibold hover:bg-amber-800 transition" data-category="histoires">
                Histoires & Contes
            </button>
            <button class="contenu-category px-6 py-3 bg-beige-200 text-gray-700 rounded-full font-semibold hover:bg-amber-700 hover:text-white transition" data-category="recettes">
                Recettes
            </button>
            <button class="contenu-category px-6 py-3 bg-beige-200 text-gray-700 rounded-full font-semibold hover:bg-amber-700 hover:text-white transition" data-category="tradition">
                Tradition
            </button>
        </div>

        <!-- Sous-section Histoires & Contes -->
        <div id="histoires-content" class="contenu-section">
            <h3 class="text-3xl font-bold mb-8 text-amber-800 text-center">
                <a href="{{route('histoires.index')}}" class="hover:text-amber-700 transition">Histoires & Contes du Bénin</a>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Carte 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/King Béhanzin.jpg')}}" 
                             alt="Conte traditionnel" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">La Légende du Roi Béhanzin</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Découvrez l'histoire fascinante du dernier roi du Dahomey et sa résistance contre la colonisation française.</p>
                        <a href="{{route('histoires.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus →</a>
                    </div>
                </div>
                
                <!-- Carte 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (15).jpg')}}" 
                             alt="Conte pour enfants" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Le Lièvre et l'Araignée</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Un conte populaire béninois qui enseigne la sagesse et l'intelligence à travers les aventures des animaux de la forêt.</p>
                        <a href="{{route('histoires.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus →</a>
                    </div>
                </div>
                
                <!-- Carte 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/Oops!.jpg')}}" 
                             alt="Mythe fondateur" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Les Origines d'Abomey</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Plongez dans les mythes fondateurs de la célèbre cité royale d'Abomey et ses rois légendaires.</p>
                        <a href="{{route('histoires.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Lire la suite →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sous-section Recettes -->
        <div id="recettes-content" class="contenu-section hidden">
            <h3 class="text-3xl font-bold mb-8 text-amber-800 text-center">
                <a href="{{route('recettes.index')}}" class="hover:text-amber-700 transition">Recettes Culinaires Béninoises</a>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Carte 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/Fufu and soup.jpg')}}" 
                             alt="Plat béninois" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Pâte d'Igname Pilée</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Apprenez à préparer ce plat traditionnel à base d'igname, un incontournable de la cuisine béninoise.</p>
                        <a href="{{route('recettes.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus →</a>
                    </div>
                </div>
                
                <!-- Carte 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (8).jpg')}}" 
                             alt="Sauce béninoise" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Sauce Gombo</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Découvrez les secrets de cette sauce visqueuse et délicieuse, parfaite accompagnement pour vos plats.</p>
                        <a href="{{route('recettes.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus →</a>
                    </div>
                </div>
                
                <!-- Carte 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/C.jpg')}}" 
                             alt="Dessert béninois" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Beignets</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Une collation sucrée et savoureuse, idéale pour le petit-déjeuner ou le goûter.</p>
                        <a href="{{route('recettes.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus→</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sous-section Tradition -->
        <div id="tradition-content" class="contenu-section hidden">
            <h3 class="text-3xl font-bold mb-8 text-amber-800 text-center">
                <a href="{{route('traditions.index')}}" class="hover:text-amber-700 transition">Traditions et Coutumes</a>
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Carte 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/masque.jpg')}}" 
                             alt="Cérémonie traditionnelle" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Le Guélédé</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Explorez cette tradition masquée du peuple Yoruba, classée au patrimoine culturel immatériel de l'UNESCO.</p>
                        <a href="{{route('traditions.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus →</a>
                    </div>
                </div>
                
                <!-- Carte 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/télécharger (9).jpg')}}" 
                             alt="Mariage traditionnel" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Rites de Mariage</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Découvrez les cérémonies et traditions entourant le mariage dans les différentes ethnies du Bénin.</p>
                        <a href="{{route('traditions.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus →</a>
                    </div>
                </div>
                
                <!-- Carte 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{asset('assets/images/vodunn.jpg')}}" 
                             alt="Artisanat béninois" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-3 text-gray-800">Artisanat Vodoun</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3">Plongez dans l'univers mystique des objets rituels et de l'artisanat lié à la pratique du Vodoun.</p>
                        <a href="{{route('traditions.index')}}" class="text-amber-700 font-semibold hover:text-amber-800 transition">Voir plus →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- IDENTITÉ CULTURELLE -->
<section class="py-20 bg-[#f5f5dc]">
    <div class="container mx-auto px-6 text-center">
        <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Identité Culturelle</span>
        <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">La Fierté d'un Peuple</h2>
        <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed mb-12">
            Masques, cérémonies, textiles, rites, musiques, percussion, danses sacrées, humour,
            solidarité, respect des anciens…
            L'identité culturelle du Bénin est une force vivante, transmise depuis des siècles.
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-beige-50 p-5 rounded-lg shadow-sm border border-beige-200">
                <h4 class="font-semibold text-gray-800">Art & Artisanat</h4>
            </div>
            <div class="bg-beige-50 p-5 rounded-lg shadow-sm border border-beige-200">
                <h4 class="font-semibold text-gray-800">Croyances & Spiritualité</h4>
            </div>
            <div class="bg-beige-50 p-5 rounded-lg shadow-sm border border-beige-200">
                <h4 class="font-semibold text-gray-800">Danses & Musiques</h4>
            </div>
            <div class="bg-beige-50 p-5 rounded-lg shadow-sm border border-beige-200">
                <h4 class="font-semibold text-gray-800">Traditions & Rituels</h4>
            </div>
        </div>
    </div>
</section>

<!-- MEDIAS -->
<section id="medias" class="py-20 bg-beige-700">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Galerie Médias</h2>

        <div class="flex overflow-x-auto gap-6 pb-4 snap-x snap-mandatory">
            @foreach($medias as $media)
                <div class="snap-center shrink-0 w-80 h-64 rounded-xl overflow-hidden shadow-lg transform hover:scale-105 transition duration-300 border border-beige-200">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                        <img src="{{ asset($media->chemin) }}" class="w-full h-full object-cover" alt="Media">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    // Navigation entre les sections de contenus
    document.addEventListener('DOMContentLoaded', function() {
        const categories = document.querySelectorAll('.contenu-category');
        const sections = document.querySelectorAll('.contenu-section');

        function showSection(sectionId) {
            sections.forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId + '-content').classList.remove('hidden');
            
            // Mettre à jour les boutons actifs
            categories.forEach(btn => {
                if (btn.dataset.category === sectionId) {
                    btn.classList.remove('bg-beige-200', 'text-gray-700');
                    btn.classList.add('bg-amber-700', 'text-white');
                } else {
                    btn.classList.remove('bg-amber-700', 'text-white');
                    btn.classList.add('bg-beige-200', 'text-gray-700');
                }
            });
        }

        categories.forEach(btn => {
            btn.addEventListener('click', function() {
                showSection(this.dataset.category);
            });
        });

        // Afficher la première section par défaut
        showSection('histoires');
    });
</script>

@endsection