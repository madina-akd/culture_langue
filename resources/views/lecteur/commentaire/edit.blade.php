@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-6">
        <!-- En-tête -->
        <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Modifier le commentaire</h1>
                    <p class="text-gray-600">
                        Modifier votre commentaire sur : <span class="font-semibold">{{ $commentaire->contenu->titre }}</span>
                    </p>
                </div>
                <a href="{{ route('lecteur.profile.show') }}"
                   class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                    <i class="fas fa-arrow-left mr-2"></i> Retour au profil
                </a>
            </div>
        </div>

        <!-- Formulaire d'édition -->
        <div class="bg-white rounded-xl shadow-sm p-8">
            <form action="{{ route('lecteur.commentaire.update', $commentaire->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Note -->
                <div class="mb-6">
                    <label for="note" class="block text-sm font-medium text-gray-700 mb-3">
                        Note (sur 5 étoiles)
                    </label>
                    <div class="flex items-center space-x-2">
                        @for($i = 1; $i <= 5; $i++)
                            <input type="radio"
                                   id="note-{{ $i }}"
                                   name="note"
                                   value="{{ $i }}"
                                   {{ $commentaire->note == $i ? 'checked' : '' }}
                                   class="sr-only peer">
                            <label for="note-{{ $i }}"
                                   class="cursor-pointer text-2xl peer-checked:text-yellow-400 text-gray-300 hover:text-yellow-400 transition">
                                <i class="fas fa-star"></i>
                            </label>
                        @endfor
                    </div>
                </div>

                <!-- Commentaire -->
                <div class="mb-6">
                    <label for="texte" class="block text-sm font-medium text-gray-700 mb-3">
                        Votre commentaire
                    </label>
                    <textarea id="texte"
                              name="texte"
                              rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-vertical"
                              placeholder="Partagez votre avis sur ce contenu..."
                              required>{{ $commentaire->texte }}</textarea>
                </div>

                <!-- Boutons d'action -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('lecteur.profile.show') }}"
                       class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                        Annuler
                    </a>
                    <button type="submit"
                            class="px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-medium">
                        <i class="fas fa-save mr-2"></i> Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Gestion des étoiles interactives
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('input[name="note"]');

        stars.forEach((star, index) => {
            star.addEventListener('change', function() {
                // Mettre à jour l'affichage des étoiles
                stars.forEach((s, i) => {
                    const label = s.nextElementSibling;
                    if (i <= index) {
                        label.classList.add('text-yellow-400');
                        label.classList.remove('text-gray-300');
                    } else {
                        label.classList.add('text-gray-300');
                        label.classList.remove('text-yellow-400');
                    }
                });
            });
        });
    });
</script>
@endsection
