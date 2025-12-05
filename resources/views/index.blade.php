@extends('app')

@section('title', 'Culture du Bénin')

@section('styles')
<!-- Import Montserrat -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Montserrat', sans-serif; }

    .bg-beninoise { 
        background: linear-gradient(135deg, #006e51 0%, #f2c94c 50%, #b91c1c 100%); 
    }

    .pattern {
        background-image: url('{{ asset("assets/images/pattern-africain.png") }}');
        background-size: 380px;
        opacity: .08;
    }
</style>
@endsection

@section('content')

@include('includes.navbar')

<!-- HERO SECTION -->
<!-- HERO SECTION -->
<section class="relative h-[90vh] flex items-center justify-center text-white overflow-hidden">
    <img src="{{ asset('assets/images/art.jpg') }}" 
         class="absolute inset-2 w-full h-full object-cover z-0">
    <div class="absolute inset-0 bg-black/60 z-0"></div>
    <div class="absolute inset-0 pattern z-0"></div>

    <div class="relative z-10 text-center px-6 max-w-3xl">
        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight drop-shadow-lg">
            Héritage & Culture du Bénin
        </h1>
        <p class="text-lg md:text-xl mt-4 font-light">
            Découvrez la richesse historique, linguistique et artistique d’un peuple vibrant.
        </p>
        <a href="#contenu" 
           class="mt-8 inline-block bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-8 py-3 rounded-full shadow-lg transition">
           Explorer
        </a>
    </div>
</section>

<!-- SECTION CULTURE -->
<section id="contenu" class="py-20 px-6 md:px-20 bg-white text-center">
    <h2 class="text-4xl font-bold text-green-700 mb-6">Culture du Bénin</h2>
    <p class="text-gray-700 text-lg leading-relaxed max-w-4xl mx-auto">
        Le Bénin est un pays de traditions millénaires, berceau du Vodoun et riche d’une diversité
        linguistique, artistique et régionale. Ses masques, ses bronzes, ses rythmes et ses textiles
        témoignent d’un héritage vivant qui continue d’inspirer le monde.
    </p>
</section>

<!-- CARDS ICONIQUES -->
<section class="py-16 px-6 md:px-20 bg-gray-100">
    <div class="grid md:grid-cols-3 gap-8">
        <!-- LANGUES -->
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition">
            <img src="{{ asset('assets/images/benin-language.jpg') }}" 
                 class="rounded-xl w-full h-48 object-cover mb-4">
            <h3 class="text-2xl font-bold text-green-700 mb-2">Langues</h3>
            <p class="text-gray-600">Plus de 15 langues vivantes préservées.</p>
        </div>

        <!-- REGIONS -->
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col">
            <img src="{{ asset('assets/images/regions.jpg') }}" 
                 class="rounded-xl w-full h-48 object-cover mb-4">
            <h3 class="text-2xl font-bold text-green-700 mb-2">Régions</h3>
            <p class="text-gray-600 flex-1">12 départements riches d'identité et d’histoire.</p>
        </div>

        <!-- ART -->
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col">
            <img src="{{ asset('assets/images/vodun.jpg') }}" 
                 class="rounded-xl w-full h-48 object-cover mb-4">
            <h3 class="text-2xl font-bold text-green-700 mb-2">Traditions & Arts</h3>
            <p class="text-gray-600 flex-1">Masques, bronzes, rythmes, textiles et rituels.</p>
        </div>
    </div>
</section>

<!-- TYPES DE MEDIAS -->
<section id="typemedia" class="py-20 px-6 md:px-20 bg-white text-center">
    <h2 class="text-4xl font-bold text-green-700 mb-4">Types de Médias</h2>
    <p class="text-gray-600 text-lg max-w-3xl mx-auto">
        Images, vidéos, audios, chants traditionnels... une immersion sensorielle dans la culture béninoise.
    </p>
</section>

<!-- TYPES DE CONTENUS -->
<section id="typecontenu" class="py-20 px-6 md:px-20 bg-gray-50 text-center">
    <h2 class="text-4xl font-bold text-green-700 mb-4">Types de Contenus</h2>
    <p class="text-gray-600 text-lg max-w-3xl mx-auto">
        Contenus issus des catégories référencées en base : histoire, gastronomie, contes, rituels et plus encore.
    </p>
</section>




@endsection
