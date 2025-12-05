@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-white py-12">
    <div class="max-w-6xl mx-auto px-6">
        <div class="mb-8">
            <a href="{{ route('region.index') }}" class="text-amber-700 hover:text-amber-800 transition mb-4 inline-block">
                <i class="fas fa-arrow-left mr-2"></i> Retour aux régions
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-beige-200 mb-8">
            <div class="bg-gradient-to-br from-amber-100 to-amber-200 py-16 flex items-center justify-center">
                <span class="text-6xl font-bold text-amber-800">{{ substr($region->nom_region, 0, 3) }}</span>
            </div>
            
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <h1 class="text-4xl font-bold text-gray-800">{{ $region->nom_region }}</h1>
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
                    @endphp
                    <span class="{{ $badgeColor }} text-white px-4 py-2 rounded-full text-lg font-semibold">
                        Département
                    </span>
                </div>

                <div class="prose prose-lg max-w-none text-gray-700 mb-8">
                    <p class="text-xl leading-relaxed">
                        {{ $region->description ?? 'Description de la région à venir.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    @if($region->population)
                    <div class="bg-amber-50 rounded-lg p-6 text-center">
                        <h3 class="text-lg font-semibold text-amber-800 mb-2">Population</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($region->population, 0, ',', ' ') }}</p>
                        <p class="text-sm text-gray-600">habitants</p>
                    </div>
                    @endif
                    
                    @if($region->superficie)
                    <div class="bg-amber-50 rounded-lg p-6 text-center">
                        <h3 class="text-lg font-semibold text-amber-800 mb-2">Superficie</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ number_format($region->superficie, 0, ',', ' ') }}</p>
                        <p class="text-sm text-gray-600">km²</p>
                    </div>
                    @endif
                    
                    @if($region->localisation)
                    <div class="bg-amber-50 rounded-lg p-6 text-center">
                        <h3 class="text-lg font-semibold text-amber-800 mb-2">Localisation</h3>
                        <p class="text-xl text-gray-800">{{ $region->localisation }}</p>
                    </div>
                    @endif
                </div>

                @if($contenus->count() > 0)
                    <div class="mt-12">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Contenus de la région {{ $region->nom_region }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($contenus as $contenu)
                                <div class="bg-white border border-beige-200 rounded-lg p-4 hover:shadow-md transition">
                                    @if($contenu->media->count() > 0)
                                        <img src="{{ asset($contenu->media->first()->chemin) }}" 
                                             alt="{{ $contenu->titre }}" 
                                             class="w-full h-32 object-cover rounded-lg mb-3">
                                    @endif
                                    <h4 class="font-semibold text-gray-800 mb-2">{{ $contenu->titre }}</h4>
                                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit(strip_tags($contenu->texte), 100) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xs text-amber-700 bg-amber-100 px-2 py-1 rounded">
                                            {{ $contenu->type->nom ?? 'Contenu' }}
                                        </span>
                                        <a href="{{ route('histoires.show', $contenu->id) }}" class="text-amber-700 hover:text-amber-800 text-sm">
                                            Lire <i class="fas fa-arrow-right ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-book-open text-amber-300 text-4xl mb-4"></i>
                        <p class="text-gray-600">Aucun contenu disponible pour cette région pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection