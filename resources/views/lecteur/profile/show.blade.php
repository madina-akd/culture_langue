@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-6">
        <!-- En-tête du profil -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center space-x-6">
                <div class="w-24 h-24 bg-amber-100 rounded-full flex items-center justify-center">
                    @if($lecteur->photo)
                        <img src="{{ asset('assets/images/' . $lecteur->photo) }}"
                             alt="{{ $lecteur->prenom }}"
                             class="w-24 h-24 rounded-full object-cover">
                    @else
                        <i class="fas fa-user text-amber-600 text-3xl"></i>
                    @endif
                </div>
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">
                        {{ $lecteur->prenom }} {{ $lecteur->nom }}
                    </h1>
                    <p class="text-gray-600 mb-4">{{ $lecteur->email }}</p>
                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                        <span><i class="fas fa-calendar mr-1"></i> Membre depuis {{ $lecteur->date_inscription->format('M Y') }}</span>
                        <span><i class="fas fa-venus-mars mr-1"></i> {{ ucfirst($lecteur->sexe) }}</span>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('lecteur.profile.edit') }}"
                       class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-medium">
                        <i class="fas fa-edit mr-2"></i> Modifier
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                <div class="text-3xl font-bold text-amber-600 mb-2">{{ $commentaires->total() }}</div>
                <div class="text-gray-600">Commentaires</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                <div class="text-3xl font-bold text-amber-600 mb-2">{{ $commentaires->avg('note') ? number_format($commentaires->avg('note'), 1) : 'N/A' }}</div>
                <div class="text-gray-600">Note moyenne</div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                <div class="text-3xl font-bold text-amber-600 mb-2">{{ $commentaires->max('note') ?? 'N/A' }}</div>
                <div class="text-gray-600">Note maximale</div>
            </div>
        </div>

        <!-- Onglets -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="border-b border-gray-200">
                <nav class="flex">
                    <a href="#commentaires"
                       class="tab-link active px-6 py-4 text-gray-600 hover:text-amber-600 border-b-2 border-transparent hover:border-amber-600 transition">
                        <i class="fas fa-comments mr-2"></i> Mes commentaires
                    </a>
                   
                </nav>
            </div>

            <!-- Contenu des onglets -->
            <div class="p-6">
                <!-- Commentaires -->
                <div id="commentaires" class="tab-content">
                    @if($commentaires->count() > 0)
                        <div class="space-y-6">
                            @foreach($commentaires as $commentaire)
                                <div class="bg-gray-50 rounded-lg p-6 hover:bg-white hover:shadow-sm transition">
                                    <div class="flex items-start space-x-4">
                                        <!-- Image du contenu -->
                                        <div class="flex-shrink-0">
                                            @if($commentaire->contenu && $commentaire->contenu->media->first())
                                                <img src="{{ asset($commentaire->contenu->media->first()->chemin) }}"
                                                     alt="{{ $commentaire->contenu->titre }}"
                                                     class="w-16 h-16 rounded-lg object-cover">
                                            @else
                                                <div class="w-16 h-16 bg-amber-100 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-image text-amber-600"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Contenu du commentaire -->
                                        <div class="flex-1">
                                            <div class="flex items-start justify-between mb-3">
                                                <div class="flex-1">
                                                    <h4 class="font-semibold text-gray-800 mb-1">
                                                        @if($commentaire->contenu)
                                                            <a href="{{ route('histoires.show', $commentaire->contenu->id) }}"
                                                               class="hover:text-amber-600 transition">
                                                                {{ $commentaire->contenu->titre }}
                                                            </a>
                                                        @else
                                                            <span class="text-gray-500 italic">Contenu supprimé</span>
                                                        @endif
                                                    </h4>
                                                    <div class="flex items-center space-x-4 text-sm text-gray-500">
                                                        <span><i class="fas fa-calendar mr-1"></i> {{ $commentaire->created_at->format('d/m/Y') }}</span>
                                                        <span><i class="fas fa-clock mr-1"></i> {{ $commentaire->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>

                                                <!-- Note -->
                                                <div class="flex items-center">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star text-lg {{ $i <= $commentaire->note ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                                    @endfor
                                                </div>
                                            </div>

                                            <!-- Texte du commentaire -->
                                            <p class="text-gray-700 leading-relaxed">{{ $commentaire->commentaire }}</p>

                                            <!-- Actions -->
                                            <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200">
                                                <div class="flex space-x-3">
                                                    <a href="{{ route('lecteur.commentaire.edit', $commentaire->id) }}"
                                                       class="px-3 py-1 text-sm bg-amber-100 text-amber-700 rounded-full hover:bg-amber-200 transition">
                                                        <i class="fas fa-edit mr-1"></i> Modifier
                                                    </a>
                                                    <form action="{{ route('lecteur.commentaire.destroy', $commentaire->id) }}"
                                                          method="POST"
                                                          class="inline"
                                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition">
                                                            <i class="fas fa-trash mr-1"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>

                                                @if($commentaire->contenu)
                                                    <a href="{{ route('histoires.show', $commentaire->contenu->id) }}"
                                                       class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition">
                                                        <i class="fas fa-eye mr-1"></i> Voir le contenu
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $commentaires->links() }}
                        </div>
                    @else
                        <!-- État vide -->
                        <div class="text-center py-12">
                            <i class="fas fa-comments text-6xl text-gray-300 mb-6"></i>
                            <h3 class="text-2xl font-semibold text-gray-600 mb-4">Aucun commentaire trouvé</h3>
                            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                                Vous n'avez pas encore laissé de commentaires sur les contenus. Découvrez nos histoires et partagez vos impressions !
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('histoires.index') }}"
                                   class="px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-medium">
                                    <i class="fas fa-book-open mr-2"></i> Découvrir les histoires
                                </a>
                                <a href="{{ route('recettes.index') }}"
                                   class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                                    <i class="fas fa-utensils mr-2"></i> Explorer les recettes
                                </a>
                                <a href="{{ route('traditions.index') }}"
                                   class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium">
                                    <i class="fas fa-users mr-2"></i> Découvrir les traditions
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                
                
            </div>
        </div>
    </div>
</div>

<script>
    // Gestion des onglets
    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Retirer la classe active de tous les liens
                tabLinks.forEach(l => {
                    l.classList.remove('active', 'text-amber-600', 'border-amber-600');
                    l.classList.add('text-gray-600', 'border-transparent');
                });

                // Ajouter la classe active au lien cliqué
                this.classList.add('active', 'text-amber-600', 'border-amber-600');
                this.classList.remove('text-gray-600', 'border-transparent');

                // Masquer tous les contenus
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Afficher le contenu correspondant
                const targetId = this.getAttribute('href').substring(1);
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.remove('hidden');
                }
            });
        });
    });
</script>
@endsection
