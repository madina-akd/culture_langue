@extends('admin.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto mt-10">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-green-600">Liste des Commentaires</h3>
        <a href="{{ route('commentaire.create') }}" class="px-4 py-2 rounded-xl bg-green-100 hover:bg-green-200 text-green-700 font-semibold transition">
            <i class="bi bi-plus-lg"></i> Ajouter un commentaire
        </a>
    </div>

    @php $lastDate = null; @endphp

    @foreach($commentaires as $commentaire)
        @php $dateLabel = \Carbon\Carbon::parse($commentaire->created_at)->format('d M. Y'); @endphp

        @if($lastDate !== $dateLabel)
            <div class="text-gray-500 font-semibold my-4">{{ $dateLabel }}</div>
            @php $lastDate = $dateLabel; @endphp
        @endif

        <div class="bg-white shadow-md rounded-2xl p-6 mb-4 border border-gray-100">
            <div class="flex justify-between items-start mb-2">
                <div class="text-gray-700 font-medium">
                    <a href="#" class="hover:underline">
                        {{ optional($commentaire->utilisateur)->nom }} {{ optional($commentaire->utilisateur)->prenom }}
                    </a> 
                    a commenté sur <strong>{{ optional($commentaire->contenu)->titre }}</strong>
                </div>
                <span class="text-gray-400 text-sm">
                    <i class="bi bi-clock-fill"></i> {{ $commentaire->created_at->diffForHumans() }}
                </span>
            </div>

            <div class="text-gray-600 mb-3">
                {{ Str::limit($commentaire->texte, 150) }}
            </div>

            <div class="flex gap-3">
                <a href="{{ route('commentaire.show', $commentaire->id) }}" class="px-3 py-1 rounded-lg bg-yellow-100 text-yellow-700 hover:bg-yellow-200 transition">
                    <i class="bi bi-eye-fill"></i> Voir
                </a>
                @if(auth()->user()->id_role == 3)
                <form action="{{ route('commentaire.destroy', $commentaire->id) }}" method="POST" onsubmit="return confirm('Supprimer ce commentaire ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 rounded-lg bg-red-100 text-red-700 hover:bg-red-200 transition">
                        <i class="bi bi-trash-fill"></i> Supprimer
                    </button>
                </form>
                @endif
            </div>
        </div>
    @endforeach

</div>
@endsection
