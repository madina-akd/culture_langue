@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-white py-12">
    <div class="max-w-4xl mx-auto px-6">
        <div class="mb-8">
            <a href="{{ route('langue.index') }}" class="text-amber-700 hover:text-amber-800 transition mb-4 inline-block">
                <i class="fas fa-arrow-left mr-2"></i> Retour aux langues
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-beige-200">
            <div class="bg-amber-100 py-12 flex items-center justify-center">
                <span class="text-8xl font-bold text-amber-800">{{ $langue->code_langue }}</span>
            </div>
            
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <h1 class="text-4xl font-bold text-gray-800">{{ $langue->nom_langue }}</h1>
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
                    <span class="{{ $badgeColor }} text-white px-4 py-2 rounded-full text-lg font-semibold">
                        {{ $badgeText }}
                    </span>
                </div>

                <div class="prose prose-lg max-w-none text-gray-700 mb-8">
                    <p class="text-xl leading-relaxed">
                        {{ $langue->description ?? 'Description de la langue à venir.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-amber-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-amber-800 mb-2">Code ISO</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $langue->code_langue }}</p>
                    </div>
                    <div class="bg-amber-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-amber-800 mb-2">Statut</h3>
                        <p class="text-xl text-gray-800">{{ $badgeText }}</p>
                    </div>
                </div>

                @if($contenus->count() > 0)
                    <div class="mt-12">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Contenus disponibles en {{ $langue->nom_langue }}</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($contenus as $contenu)
                                <div class="bg-white border border-beige-200 rounded-lg p-4 hover:shadow-md transition">
                                    <h4 class="font-semibold text-gray-800 mb-2">{{ $contenu->titre }}</h4>
                                    <p class="text-sm text-gray-600 mb-3">{{ Str::limit(strip_tags($contenu->texte), 100) }}</p>
                                    <span class="text-xs text-amber-700 bg-amber-100 px-2 py-1 rounded">
                                        {{ $contenu->type->nom ?? 'Contenu' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection