@extends('lecteur.layouts')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Connexion Lecteur
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Accédez à votre espace lecteur
            </p>
        </div>
        
        @if($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <ul class="list-disc list-inside text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form class="mt-8 space-y-6" action="{{ route('lecteur.login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required 
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm"
                           placeholder="exemple@email.com">
                </div>
                
                <div class="mb-4">
                    <label for="mot_de_passe" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input id="mot_de_passe" name="mot_de_passe" type="password" autocomplete="current-password" required 
                           class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-amber-500 focus:border-amber-500 focus:z-10 sm:text-sm"
                           placeholder="Votre mot de passe">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                    Se connecter
                </button>
            </div>
            
            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Pas encore de compte ? 
                    <a href="{{ route('lecteur.register') }}" class="font-medium text-amber-600 hover:text-amber-500">
                        Inscrivez-vous
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection