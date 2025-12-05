@extends('lecteur.layouts')

@section('content')
    <!-- Hero Section À Propos -->
    <section class="relative h-screen overflow-hidden">
        <img 
        src="{{ asset('assets/images/télécharger (17).jpg') }}" 
        alt="À Propos de nous" 
        class="absolute inset-0 w-full h-full object-cover"
        >
        <div class="video-overlay"></div>
        <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">À Propos</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mb-8">
                Découvrez l'histoire derrière notre plateforme dédiée à la préservation 
                et à la promotion du patrimoine culturel béninois
            </p>
        </div>
    </section>

    <!-- Section Notre Mission -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Notre Vision</span>
                    <h2 class="text-4xl font-bold mt-2 mb-6 text-gray-800">Préserver le Patrimoine Culturel Béninois</h2>
                    <div class="space-y-6 text-gray-600">
                        <p class="text-lg leading-relaxed">
                            Notre plateforme est née d'une passion profonde pour la richesse culturelle du Bénin. 
                            Nous nous engageons à documenter, préserver et partager les trésors de notre héritage 
                            culturel avec les générations présentes et futures.
                        </p>
                        
                        <p class="text-lg leading-relaxed">
                            À travers les recettes traditionnelles, les contes, les langues et les traditions, 
                            nous créons une bibliothèque vivante de notre identité culturelle, accessible à tous.
                        </p>

                        <div class="bg-amber-50 rounded-xl p-6 border-l-4 border-amber-600">
                            <h3 class="font-semibold text-amber-800 mb-2">Notre Mission</h3>
                            <p class="text-gray-700">
                                Digitaliser et rendre accessible le patrimoine culturel immatériel du Bénin 
                                pour assurer sa transmission aux générations futures.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg">
                        <img src="{{ asset('assets/images/télécharger (18).jpg') }}" 
                             alt="Culture béninoise" class="w-full h-96 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-amber-500/10 to-amber-600/20 z-10"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-amber-700 text-white p-6 rounded-2xl shadow-lg">
                        <h3 class="text-xl font-bold">+200</h3>
                        <p class="text-amber-100">Contenus culturels</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fondateur -->
    <section class="py-20 bg-[#e9dbc6]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Équipe</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Rencontrez le Fondateur</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Passionné par la technologie et la culture béninoise</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-lg max-w-md mx-auto">
                        <div class="bg-gradient-to-br from-amber-100 to-amber-200 h-96 flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-32 h-32 bg-amber-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-amber-800">MA</span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800">Madina AKADI</h3>
                                <p class="text-amber-700 font-semibold">Étudiante en Informatique de Gestion</p>
                                <p class="text-gray-600 mt-2">3ème Année</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-6">Mon Parcours</h3>
                    <div class="space-y-6 text-gray-600">
                        <p class="text-lg leading-relaxed">
                            Je suis Madina AKADI, étudiante en troisième année d'Informatique de Gestion. 
                            Ce projet est né de ma passion pour la programmation web et mon amour profond 
                            pour la culture béninoise.
                        </p>
                        
                        <p class="text-lg leading-relaxed">
                            En tant que jeune développeuse, j'ai voulu créer une plateforme qui utilise 
                            la technologie moderne pour préserver et promouvoir notre héritage culturel. 
                            Chaque ligne de code de ce site est écrite avec la conviction que notre 
                            culture mérite d'être célébrée et partagée avec le monde.
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <i class="fas fa-code text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Expertise Technique</h4>
                                    <p class="text-gray-600">Développement web full-stack avec les dernières technologies</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-heart text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Passion Culturelle</h4>
                                    <p class="text-gray-600">Amour profond pour les traditions et l'héritage béninois</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-graduation-cap text-amber-700 mt-1 mr-4"></i>
                                <div>
                                    <h4 class="font-semibold text-amber-800 mb-1">Formation Académique</h4>
                                    <p class="text-gray-600">Étudiant en Informatique de Gestion - 3ème année</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Devenir Auteur -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Contribution</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Devenez Auteur</h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">Rejoignez notre communauté de passionnés de culture béninoise</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-amber-50 rounded-xl border border-amber-200">
                    <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-pen-fancy text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Partagez Vos Connaissances</h3>
                    <p class="text-gray-600">
                        Partagez vos recettes familiales, contes traditionnels ou connaissances 
                        sur les langues et traditions de votre région.
                    </p>
                </div>

                <div class="text-center p-8 bg-amber-50 rounded-xl border border-amber-200">
                    <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Rejoignez une Communauté</h3>
                    <p class="text-gray-600">
                        Intégrez une communauté dynamique de personnes passionnées par 
                        la préservation de la culture béninoise.
                    </p>
                </div>

                <div class="text-center p-8 bg-amber-50 rounded-xl border border-amber-200">
                    <div class="w-16 h-16 bg-amber-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-share-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Contribuez à la Préservation</h3>
                    <p class="text-gray-600">
                        Aidez à préserver notre héritage culturel pour les générations 
                        futures en partageant votre savoir.
                    </p>
                </div>
            </div>

            <div class="text-center mt-12">
                <div class="bg-gradient-to-r from-amber-600 to-amber-700 rounded-2xl p-8 text-white max-w-4xl mx-auto">
                    <h3 class="text-2xl font-bold mb-4">Vous souhaitez contribuer ?</h3>
                    <p class="text-amber-100 mb-6 text-lg">
                        Que vous soyez un passionné de cuisine traditionnelle, un conteur, 
                        ou simplement quelqu'un qui souhaite partager ses connaissances 
                        sur la culture béninoise, nous serions ravis de vous accueillir.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('culturecontact') }}" class="bg-white text-amber-700 px-8 py-3 rounded-full font-semibold hover:bg-amber-50 transition">
                            Nous Contacter
                        </a>
                        <a href="{{ route('auteur.register') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-amber-700 transition">
                            Créer un Compte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Nos Valeurs -->
    <section class="py-20 bg-[#f5f5dc]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Engagement</span>
                <h2 class="text-4xl font-bold mt-2 mb-4 text-gray-800">Nos Valeurs</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-authenticity text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Authenticité</h3>
                    <p class="text-gray-600">Nous nous engageons à préserver l'authenticité des traditions et savoirs partagés.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Partage</h3>
                    <p class="text-gray-600">Nous croyons au pouvoir du partage pour préserver notre héritage culturel.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-gem text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Qualité</h3>
                    <p class="text-gray-600">Chaque contenu est vérifié pour assurer sa qualité et son exactitude.</p>
                </div>

                <div class="text-center">
                    <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Passion</h3>
                    <p class="text-gray-600">Notre travail est guidé par l'amour de la culture béninoise.</p>
                </div>
            </div>
        </div>
    </section>
@endsection