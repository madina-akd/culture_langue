@extends('admin.layouts.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10">

    <div class="bg-white shadow-xl rounded-xl overflow-hidden">

        {{-- Header --}}
        <div class="px-6 py-4 border-b bg-gray-50">
            <h3 class="text-xl font-semibold text-gray-700">
                {{ $utilisateur->nom }} {{ $utilisateur->prenom }}
            </h3>
        </div>

        {{-- Body --}}
        <div class="p-6 space-y-5">

            {{-- Photo --}}
            @if($utilisateur->photo)
                <div>
                    <p class="text-gray-700 font-medium mb-2">Photo :</p>
                    <img src="{{ asset($utilisateur->photo) }}"
                         class="w-32 h-32 rounded-lg shadow-md object-cover border">
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <p class="text-gray-700">
                    <span class="font-semibold">Email :</span>
                    {{ $utilisateur->email }}
                </p>

                <p class="text-gray-700">
                    <span class="font-semibold">Rôle :</span>
                    {{ $utilisateur->role?->nom ?? 'N/A' }}
                </p>

                <p class="text-gray-700">
                    <span class="font-semibold">Langue :</span>
                    {{ $utilisateur->langue?->nom_langue ?? 'N/A' }}
                </p>

                <p class="text-gray-700">
                    <span class="font-semibold">Sexe :</span>
                    {{ $utilisateur->sexe ?? 'N/A' }}
                </p>

                <p class="text-gray-700">
                    <span class="font-semibold">Statut :</span>
                    {{ $utilisateur->statut ?? 'N/A' }}
                </p>

                <p class="text-gray-700">
                    <span class="font-semibold">Date de naissance :</span>
                    {{ $utilisateur->date_naissance?->format('d/m/Y') ?? 'N/A' }}
                </p>

                <p class="text-gray-700">
                    <span class="font-semibold">Date inscription :</span>
                    {{ $utilisateur->date_inscription?->format('d/m/Y') ?? 'N/A' }}
                </p>

            </div>
        </div>

        {{-- Footer --}}
        <div class="px-6 py-4 border-t bg-gray-50 flex justify-end space-x-3">
            <a href="{{ route('utilisateur.index') }}"
               class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium transition">
                Retour
            </a>

            <a href="{{ route('utilisateur.edit', $utilisateur->id) }}"
               class="px-4 py-2 rounded-lg bg-success-subtle text-gray-700 font-medium transition">
                Modifier
            </a>
        </div>

    </div>

</div>

@endsection
