@extends('admin.layouts.app')

@section('content')

<div class="max-w-6xl mx-auto mt-10">

    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-green-600">Liste des Régions</h3>
        <a href="{{ route('regions.create') }}" class="px-4 py-2 rounded-xl bg-green-100 hover:bg-green-200 text-green-700 font-semibold transition">
            Ajouter une Région
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class="mb-6">
        <input type="text" id="searchInput" placeholder="Rechercher une région..." 
               class="w-full md:w-1/3 px-4 py-2 border border-gray-300 bg-white rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
    </div>

    <!-- Zone des cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="rolesContainer">

        @foreach($regions as $region)
            <div class="role-card" data-name="{{ strtolower($region->nom_region) }}">
                <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-100 hover:shadow-lg transition">

                    <!-- Contenu -->
                    <h4 class="text-lg font-bold text-gray-700 mb-2">{{ $region->nom_region }}</h4>

                    <!-- Actions -->
                    <div class="flex justify-between mt-4 space-x-2">
                        <a href="{{ route('regions.show', $region->id) }}" class="text-blue-600 hover:text-blue-800">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="{{ route('regions.edit', $region->id) }}" class="text-yellow-500 hover:text-yellow-700">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @if(auth()->user()->id_role == 3)
                        <form action="{{ route('regions.destroy', $region->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Supprimer cette région ?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach

    </div>

</div>

<!-- SCRIPT DE RECHERCHE -->
<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        let search = this.value.toLowerCase();
        document.querySelectorAll('.role-card').forEach(card => {
            card.style.display = card.dataset.name.includes(search) ? 'block' : 'none';
        });
    });
</script>

@endsection
