@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-white py-12">
    <div class="max-w-4xl mx-auto px-6">
        <article class="prose prose-lg max-w-none">
            @if($tradition->media->count() > 0)
                <img src="{{ asset($tradition->media->first()->chemin) }}" 
                     alt="{{ $tradition->titre }}" 
                     class="w-full h-64 object-cover rounded-lg mb-8">
            @endif
            
            <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $tradition->titre }}</h1>
            
            <div class="flex items-center gap-4 text-gray-600 mb-8">
                @if($tradition->auteur)
                    <span><i class="fas fa-user mr-2"></i>{{ $tradition->auteur->nom }}</span>
                @endif
                <span><i class="fas fa-clock mr-2"></i>{{ $tradition->reading_time }} min de lecture</span>
                @if($tradition->region)
                    <span><i class="fas fa-map-marker-alt mr-2"></i>{{ $tradition->region->nom_region }}</span>
                @endif
            </div>

            <div class="text-gray-700 leading-relaxed">
                {!! $tradition->texte !!}
            </div>
        </article>
        
        <!-- Section Commentaires -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Commentaires ({{ $commentaires->count() }})</h2>
            
            <!-- Affichage des commentaires existants -->
            <div class="space-y-6 mb-8">
                @if($commentaires->count() > 0)
                    @foreach($commentaires as $commentaire)
                        <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm" id="comment-{{ $commentaire->id }}">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center">
                                        @if($commentaire->utilisateur->photo)
                                            <img src="{{ asset($commentaire->utilisateur->photo) }}" 
                                                 alt="{{ $commentaire->utilisateur->nom }}" 
                                                 class="w-12 h-12 rounded-full object-cover">
                                        @else
                                            <i class="fas fa-user text-amber-600 text-xl"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-800 block">
                                            {{ $commentaire->utilisateur->nom }} {{ $commentaire->utilisateur->prenom }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            {{ $commentaire->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Note (étoiles) -->
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $commentaire->note)
                                            <i class="fas fa-star text-amber-500 mr-1"></i>
                                        @else
                                            <i class="far fa-star text-gray-300 mr-1"></i>
                                        @endif
                                    @endfor
                                    <span class="ml-2 text-gray-600 font-semibold">{{ number_format($commentaire->note, 1) }}</span>
                                </div>
                            </div>
                            
                            <!-- Texte du commentaire -->
                            <div class="text-gray-700 mb-4" id="comment-text-{{ $commentaire->id }}">
                                {{ $commentaire->texte }}
                            </div>
                            
                            <!-- Actions -->
                            @if(Auth::check() && Auth::id() == $commentaire->id_utilisateur)
                            <div class="flex space-x-4 pt-4 border-t border-gray-100">
                                <button onclick="editComment({{ $commentaire->id }})" 
                                        class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                    <i class="fas fa-edit mr-2"></i> Modifier
                                </button>
                                <form action="{{ route('lecteur.commentaire.destroy', $commentaire->id) }}" 
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')"
                                            class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center">
                                        <i class="fas fa-trash mr-2"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Formulaire d'édition (caché par défaut) -->
                            <div id="edit-form-{{ $commentaire->id }}" class="hidden mt-4 pt-4 border-t border-gray-200">
                                <form action="{{ route('lecteur.commentaire.update', $commentaire->id) }}" 
                                      method="POST" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Modifier votre commentaire</label>
                                        <textarea name="texte" 
                                                  rows="4"
                                                  class="w-full border border-gray-300 rounded-lg p-3 focus:ring-amber-500 focus:border-amber-500"
                                                  required>{{ $commentaire->texte }}</textarea>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Modifier votre note</label>
                                        <div class="flex items-center space-x-4">
                                            <select name="note" 
                                                    class="border border-gray-300 rounded-lg p-2 focus:ring-amber-500 focus:border-amber-500">
                                                @for($i = 0; $i <= 5; $i += 0.5)
                                                    <option value="{{ $i }}" {{ $commentaire->note == $i ? 'selected' : '' }}>
                                                        {{ $i }} étoile{{ $i > 1 ? 's' : '' }}
                                                    </option>
                                                @endfor
                                            </select>
                                            <div class="text-sm text-gray-500">
                                                Note actuelle : {{ number_format($commentaire->note, 1) }}/5
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex space-x-3">
                                        <button type="submit" 
                                                class="px-5 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 font-medium">
                                            <i class="fas fa-check mr-2"></i> Mettre à jour
                                        </button>
                                        <button type="button" 
                                                onclick="cancelEdit({{ $commentaire->id }})"
                                                class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 font-medium">
                                            <i class="fas fa-times mr-2"></i> Annuler
                                        </button>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-12 text-gray-500 bg-gray-50 rounded-xl">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 rounded-full mb-4">
                            <i class="fas fa-comments text-amber-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Aucun commentaire</h3>
                        <p class="text-gray-600 max-w-md mx-auto">
                            Soyez le premier à partager votre avis sur cette tradition !
                        </p>
                    </div>
                @endif
            </div>
            
            <!-- Formulaire d'ajout de commentaire -->
            @if(Auth::check() && $aPaye)
                <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                        <i class="fas fa-edit mr-3 text-amber-600"></i>
                        Ajouter votre commentaire
                    </h3>
                    <form action="{{ route('lecteur.commentaire.store', $tradition->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="tradition">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Votre commentaire</label>
                                <textarea name="texte" 
                                          rows="5"
                                          class="w-full border border-gray-300 rounded-lg p-4 focus:ring-amber-500 focus:border-amber-500 text-lg"
                                          placeholder="Qu'avez-vous pensé de cette tradition ? Partagez votre avis..."
                                          required></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Votre note</label>
                                <div class="flex items-center space-x-6">
                                    <select name="note" 
                                            class="border border-gray-300 rounded-lg p-3 focus:ring-amber-500 focus:border-amber-500 w-48">
                                        <option value="">Sélectionnez une note</option>
                                        <option value="5">★★★★★ - Excellent</option>
                                        <option value="4.5">★★★★½ - Très bon</option>
                                        <option value="4">★★★★☆ - Bon</option>
                                        <option value="3.5">★★★½☆ - Assez bon</option>
                                        <option value="3">★★★☆☆ - Moyen</option>
                                        <option value="2.5">★★½☆☆ - Passable</option>
                                        <option value="2">★★☆☆☆ - Décevant</option>
                                        <option value="1.5">★½☆☆☆ - Mauvais</option>
                                        <option value="1">★☆☆☆☆ - Très mauvais</option>
                                        <option value="0.5">½☆☆☆☆ - Exécrable</option>
                                        <option value="0">☆☆☆☆☆ - À éviter</option>
                                    </select>
                                    <div class="text-sm text-gray-500">
                                        Donnez une note de 0 à 5 étoiles
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" 
                                    class="px-8 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition font-semibold text-lg">
                                <i class="fas fa-paper-plane mr-3"></i> Publier mon commentaire
                            </button>
                        </div>
                    </form>
                </div>
            @elseif(Auth::check() && !$aPaye)
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-6 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4">
                        <i class="fas fa-lock text-amber-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-amber-800 mb-2">Accès requis</h3>
                    <p class="text-amber-700 mb-4">
                        Vous devez avoir acheté cette tradition pour pouvoir la commenter.
                    </p>
                    <a href="{{ route('paiement.tradition.initier', $tradition->id) }}"
                       class="inline-flex items-center px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        Acheter la tradition
                    </a>
                </div>
            @else
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-8 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 rounded-full mb-6">
                        <i class="fas fa-user-circle text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-amber-800 mb-3">Connectez-vous pour commenter</h3>
                    <p class="text-amber-700 mb-6 max-w-md mx-auto">
                        Pour partager votre avis sur cette tradition, vous devez être connecté à votre compte lecteur.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('lecteur.register') }}" 
                           class="px-8 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-semibold">
                            <i class="fas fa-user-plus mr-3"></i> Créer un compte
                        </a>
                        <a href="{{ route('lecteur.login') }}" 
                           class="px-8 py-3 border-2 border-amber-600 text-amber-600 rounded-lg hover:bg-amber-50 transition font-semibold">
                            <i class="fas fa-sign-in-alt mr-3"></i> Se connecter
                        </a>
                    </div>
                    <p class="text-sm text-amber-600 mt-6">
                        Vous n'avez pas encore de compte ? L'inscription est gratuite et rapide !
                    </p>
                </div>
            @endif
        </div>
        
        <!-- Bouton de retour -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <a href="{{ route('traditions.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                <i class="fas fa-arrow-left mr-3"></i> 
                Retour aux traditions
            </a>
        </div>
    </div>
</div>

<script>
    // Fonction pour afficher le formulaire d'édition
    function editComment(commentId) {
        // Masquer tous les autres formulaires d'édition
        document.querySelectorAll('[id^="edit-form-"]').forEach(form => {
            form.classList.add('hidden');
        });

        // Masquer tous les textes de commentaire
        document.querySelectorAll('[id^="comment-text-"]').forEach(text => {
            text.classList.remove('hidden');
        });

        // Afficher le formulaire d'édition pour ce commentaire
        document.getElementById('edit-form-' + commentId).classList.remove('hidden');

        // Masquer le texte du commentaire
        document.getElementById('comment-text-' + commentId).classList.add('hidden');
    }

    // Fonction pour annuler l'édition
    function cancelEdit(commentId) {
        document.getElementById('edit-form-' + commentId).classList.add('hidden');
        document.getElementById('comment-text-' + commentId).classList.remove('hidden');
    }

    // Gestion AJAX pour les formulaires (optionnel)
    document.addEventListener('DOMContentLoaded', function() {
        // Ajouter des écoutes d'événements pour les formulaires si besoin
        const commentForms = document.querySelectorAll('form[action*="commentaire"]');

        commentForms.forEach(form => {
            // Vous pouvez ajouter une validation supplémentaire ici
            form.addEventListener('submit', function(e) {
                const note = form.querySelector('select[name="note"]');
                if (note && note.value === "") {
                    e.preventDefault();
                    alert('Veuillez sélectionner une note avant de soumettre.');
                    return false;
                }

                // Afficher un indicateur de chargement
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> En cours...';
                    submitBtn.disabled = true;
                }
            });
        });

        // Mise en surbrillance du commentaire après soumission
        const urlParams = new URLSearchParams(window.location.search);
        const commentId = urlParams.get('comment');
        if (commentId) {
            const commentElement = document.getElementById('comment-' + commentId);
            if (commentElement) {
                commentElement.scrollIntoView({ behavior: 'smooth' });
                commentElement.classList.add('bg-amber-50', 'border-amber-300');

                // Retirer la surbrillance après 3 secondes
                setTimeout(() => {
                    commentElement.classList.remove('bg-amber-50', 'border-amber-300');
                }, 3000);
            }
        }
    });
</script>
@endsection
