<nav class="fixed top-0 left-0 w-full bg-white/95 backdrop-blur-md shadow-md z-50">
    <div class="container mx-auto flex justify-between items-center py-3 px-6">
        
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
            <img src="{{ asset('assets/images/icon .png') }}" class="h-10">
            <span class="text-2xl font-extrabold text-green-700 tracking-wide">Bénin Culture</span>
        </a>

        <!-- Menu desktop -->
        <ul class="hidden md:flex space-x-8 font-medium text-gray-700">
            <li><a href="/" class="hover:text-green-700 transition">Accueil</a></li>
            <li><a href="{{ route('accueil') }}" class="hover:text-green-700 transition">Dashboard</a></li>
        </ul>

        <!-- Bouton mobile -->
        <button id="menu-btn" class="md:hidden text-2xl text-gray-700 focus:outline-none">
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <!-- Menu mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
        <ul class="flex flex-col space-y-4 py-6 px-6 font-medium text-gray-700">
            <li><a href="/" class="hover:text-green-700 transition">Accueil</a></li>
            <li><a href="{{ route('dashboard') }}" class="hover:text-green-700 transition">Dashboard</a></li>
           
        </ul>
    </div>
</nav>

<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
