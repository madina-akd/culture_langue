@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
        
        <h3 class="text-2xl font-bold text-green-600 mb-4">
            Détails de la langue
        </h3>

        <div class="space-y-4 text-gray-700">
            <p><span class="font-semibold text-gray-800">ID :</span> {{ $langue->id }}</p>
            <p><span class="font-semibold text-gray-800">Nom de la langue :</span> {{ $langue->nom_langue }}</p>
            <p><span class="font-semibold text-gray-800">Code :</span> {{ $langue->code_langue }}</p>
            <p><span class="font-semibold text-gray-800">Description :</span><br>{{ $langue->description }}</p>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('langues.index') }}" 
               class="px-5 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition">
               Retour
            </a>

            <a href="{{ route('langues.edit', $langue->id) }}" 
               class="px-5 py-2 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold shadow transition">
               Modifier
            </a>
        </div>

    </div>
</div>

@endsection
