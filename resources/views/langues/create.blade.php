@extends('admin.layouts.app')

@section('content')

<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        <div class="mb-6 flex justify-between items-center">
            <h3 class="text-2xl font-bold text-green-600">Créer une langue</h3>
            <a href="{{ route('langues.index') }}" class="px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition">
                Retour
            </a>
        </div>

        <!-- Affichage des erreurs globales -->
        @if ($errors->any())
            <div class="mb-4 p-4 rounded bg-red-100 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('langues.store') }}" method="POST" class="space-y-6">
            @csrf

            @php
                $input = "w-full px-4 py-2 rounded-xl border border-gray-300 bg-white
                          focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500
                          hover:border-green-400 transition text-gray-700 placeholder-gray-400";
            @endphp

            <!-- Code de langue -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Code de la langue</label>
                <input type="text" name="code_langue" value="{{ old('code_langue') }}" placeholder="Ex: FR" class="{{ $input }}" required>
                @error('code_langue')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nom de langue -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Nom de la langue</label>
                <input type="text" name="nom_langue" value="{{ old('nom_langue') }}" placeholder="Ex: French" class="{{ $input }}" required>
                @error('nom_langue')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Description</label>
                <textarea name="description" rows="4" placeholder="Ex: French is ..." class="{{ $input }}" required>{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="flex justify-end gap-4 mt-6">
                <a href="{{ route('langues.index') }}" class="px-6 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition">
                    Annuler
                </a>

                <button type="submit" class="px-6 py-2 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold shadow transition">
                    Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>

@endsection
