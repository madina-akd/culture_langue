@extends('lecteur.layouts')

@section('content')
<!-- Hero Section Contact -->
<section class="relative h-screen overflow-hidden">
    <img 
        src="{{ asset('assets/images/Contacts icon.jpg') }}" 
        alt="Contactez-nous" 
        class="absolute inset-0 w-full h-full object-cover"
    >
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 h-full flex flex-col justify-center items-center text-center px-4 md:px-6">
        <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold text-white mb-4 md:mb-6">Contact</h1>
        <p class="text-lg sm:text-xl md:text-2xl text-white/90 max-w-xl md:max-w-3xl mb-6 md:mb-8">
            Une question ? Une suggestion ? Ou vous souhaitez contribuer ? 
            N'hésitez pas à nous contacter !
        </p>
    </div>
</section>

<!-- Section Formulaire de Contact -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            
            <!-- Informations de Contact -->
            <div>
                <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Contact</span>
                <h2 class="text-3xl sm:text-4xl font-bold mt-2 mb-6 text-gray-800">Restons en Contact</h2>
                <p class="text-gray-600 text-lg mb-8">
                    Que vous ayez des questions sur notre plateforme, souhaitez devenir contributeur, 
                    ou simplement partager vos impressions, nous serions ravis d'échanger avec vous.
                </p>

                <div class="space-y-6">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-amber-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Fondateur</h3>
                            <p class="text-gray-600">Madina AKADI</p>
                            <p class="text-sm text-gray-500">Étudiante en Informatique de Gestion - 3ème année</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-envelope text-amber-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600">
                                <a href="mailto:akadimadina0@gmail.com" class="underline hover:text-amber-700">akadimadina0@gmail.com</a>
                            </p>
                            <p class="text-sm text-gray-500">Nous répondons sous 24h</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-amber-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Localisation</h3>
                            <p class="text-gray-600">Bénin</p>
                            <p class="text-sm text-gray-500">Plateforme dédiée à la culture béninoise</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-amber-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Temps de Réponse</h3>
                            <p class="text-gray-600">24-48 heures</p>
                            <p class="text-sm text-gray-500">Pour toutes vos demandes</p>
                        </div>
                    </div>
                </div>

                <!-- Section Devenir Auteur -->
                <div class="mt-12 p-6 bg-amber-50 rounded-xl border border-amber-200">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">💡 Souhaitez-vous devenir auteur ?</h3>
                    <p class="text-gray-600 mb-4">
                        Passionné(e) par la culture béninoise ? Vous avez des connaissances à partager 
                        sur les recettes traditionnelles, les contes, les langues ou les traditions ?
                    </p>
                    <p class="text-gray-600 mb-4">
                        Rejoignez notre équipe de contributeurs et aidez-nous à enrichir cette plateforme 
                        dédiée à la préservation de notre héritage culturel.
                    </p>
                    <a href="{{ route('auteur.register') }}" class="inline-block bg-amber-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-amber-700 transition">
                        Créer un compte contributeur
                    </a>
                </div>
            </div>

            <!-- Formulaire de Contact -->
            <div class="bg-gray-50 rounded-2xl p-6 sm:p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Envoyez-nous un message</h3>
                
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prénom *</label>
                            <input type="text" id="prenom" name="prenom" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                        
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom *</label>
                            <input type="text" id="nom" name="nom" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                        <input type="email" id="email" name="email" required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                    </div>

                    <div>
                        <label for="sujet" class="block text-sm font-medium text-gray-700 mb-2">Sujet *</label>
                        <select id="sujet" name="sujet" required 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition">
                            <option value="">Sélectionnez un sujet</option>
                            <option value="question">Question générale</option>
                            <option value="contribution">Devenir contributeur</option>
                            <option value="suggestion">Suggestion d'amélioration</option>
                            <option value="partenariat">Partenariat</option>
                            <option value="bug">Signaler un problème</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                        <textarea id="message" name="message" rows="6" required 
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                                  placeholder="Décrivez votre demande en détail..."></textarea>
                    </div>

                    <button type="submit" 
                            class="w-full bg-amber-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-amber-700 transition focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        Envoyer le message
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- Section FAQ -->
<section class="py-16 md:py-20 bg-[#f5f5dc]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12 md:mb-16">
            <span class="text-amber-700 font-semibold text-sm uppercase tracking-wide">Aide</span>
            <h2 class="text-3xl sm:text-4xl font-bold mt-2 mb-4 text-gray-800">Questions Fréquentes</h2>
            <p class="text-gray-600 text-lg">Trouvez rapidement des réponses à vos questions</p>
        </div>

        <div class="space-y-6 sm:space-y-8">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-beige-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Comment puis-je contribuer au site ?</h3>
                <p class="text-gray-600">
                    Vous pouvez contribuer en créant un compte contributeur. Une fois connecté, vous pourrez 
                    soumettre des recettes, des contes, des articles sur les langues ou les traditions. 
                    Tous les contenus sont vérérés avant publication.
                </p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-beige-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Le site est-il gratuit ?</h3>
                <p class="text-gray-600">
                    Oui, notre plateforme est entièrement gratuite et accessible à tous. 
                    Nous croyons que la culture doit être partagée librement.
                </p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-beige-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Puis-je utiliser les contenus pour mon travail ?</h3>
                <p class="text-gray-600">
                    Les contenus sont libres d'accès pour un usage éducatif et personnel. 
                    Pour un usage commercial, veuillez nous contacter pour obtenir une autorisation.
                </p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-beige-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Comment sont vérifiés les contenus ?</h3>
                <p class="text-gray-600">
                    Chaque contenu soumis est vérifié par notre équipe pour s'assurer de son authenticité 
                    et de sa pertinence avant publication.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Messages de succès / erreur -->
@if(session('success'))
<div class="max-w-7xl mx-auto px-4 sm:px-6 pt-6">
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Succès !</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
</div>
@endif

@if(session('error'))
<div class="max-w-7xl mx-auto px-4 sm:px-6 pt-6">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
        <strong class="font-bold">Erreur !</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
</div>
@endif
@endsection
