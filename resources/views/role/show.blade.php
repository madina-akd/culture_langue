@extends('admin.layouts.app')
@section('content')

<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        <h3 class="text-2xl font-bold text-green-600 mb-4">Détails du rôle</h3>

        <div class="space-y-3 text-gray-700">
            <p><strong>ID :</strong> {{ $role->id }}</p>
            <p><strong>Nom du rôle :</strong> {{ $role->nom }}</p>
            <p><strong>Liste des utilisateurs :</strong>
                @if($role->utilisateurs->count())
                    @foreach($role->utilisateurs as $user)
                        {{ $user->nom }} {{ $user->prenom }}@if(!$loop->last), @endif
                    @endforeach
                @else
                    Aucun utilisateur
                @endif
            </p>
        </div>

        <div class="flex justify-between mt-6">
            <a href="{{ route('roles.index') }}" class="px-6 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition">Retour</a>
            <a href="{{ route('roles.edit', $role->id) }}" class="px-6 py-2 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold shadow">Modifier</a>
        </div>

    </div>
</div>

@endsection
