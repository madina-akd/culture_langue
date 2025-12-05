@extends('admin.layouts.app')
@section('content')

<div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        <h3 class="text-2xl font-bold text-green-600 mb-2">Modifier le rôle</h3>
        <p class="text-gray-500 mb-6">Mettez à jour les informations du rôle.</p>

        @if ($errors->any())
            <div class="mb-4 p-4 rounded bg-red-100 text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            @php
                $inputClass = "w-full px-4 py-2 rounded-xl border border-gray-300 bg-white
                               focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500
                               hover:border-green-400 transition text-gray-700 placeholder-gray-400";
            @endphp

            <!-- Nom du rôle -->
            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-1">Nom du rôle</label>
                <input type="text" name="nom" value="{{ old('nom', $role->nom) }}" class="{{ $inputClass }}" required>
                @error('nom')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end space-x-3 mt-4">
                <a href="{{ route('roles.index') }}" class="px-6 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold transition">Annuler</a>
                <button type="submit" class="px-6 py-2 rounded-xl bg-green-600 hover:bg-green-700 text-white font-semibold shadow">Mettre à jour</button>
            </div>

        </form>
    </div>
</div>

@endsection
