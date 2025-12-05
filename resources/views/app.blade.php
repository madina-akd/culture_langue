<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Site')</title>

    <!-- Styles globaux -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    @yield('styles')
</head>
<body class="antialiased bg-gray-50">

    <!-- Navbar globale -->
    @include('includes.navbar')

    <!-- Contenu spécifique à chaque page -->
    <main>
        @yield('content')
    </main>

    <!-- Footer global -->
    @include('includes.footer')

    @yield('scripts')
</body>
</html>
