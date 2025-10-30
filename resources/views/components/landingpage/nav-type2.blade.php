<nav id="navbar"
    class="navbar fixed w-full z-50 top-0 left-0
     {{ Route::is('beranda') ? 'md:bg-transparent bg-transparent' : 'bg-main' }}">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4 text-white">
        <!-- Logo dan Nama -->
        <div class="flex items-center space-x-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/4/4a/Logo_Kabupaten_Kutai_Kartanegara.png"
                class="w-10 h-10" alt="Logo">
            <div>
                <h1 class="text-lg md:text-xl font-bold">Desa Kersik</h1>
                <p class="text-xs md:text-sm -mt-1">Kabupaten Kutai Kartanegara</p>
            </div>
        </div>

        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-8 font-semibold">
            <li><a href="{{ route('beranda') }}" class="hover:text-gray-200">Home</a></li>
            <li><a href="{{ route('profil') }}" class="hover:text-gray-200">Profil Desa</a></li>
            <li><a href="{{ route('infografis') }}" class="hover:text-gray-200">Infografis</a></li>
            <li><a href="{{ route('apbdes') }}" class="hover:text-gray-200">APBDes</a></li>
            <li><a href="{{ route('berita') }}" class="hover:text-gray-200">Berita</a></li>
            <li><a href="{{ route('belanja') }}" class="hover:text-gray-200">Belanja</a></li>
        </ul>

        <!-- Tombol Mobile -->
        <button id="menu-btn" class="md:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-main text-white font-semibold px-6 py-4 space-y-3">
        <a href="{{ route('beranda') }}" class="block hover:text-gray-200">Home</a>
        <a href="{{ route('profil') }}" class="block hover:text-gray-200">Profil Desa</a>
        <a href="{{ route('infografis') }}" class="block hover:text-gray-200">Infografis</a>
        <a href="{{ route('apbdes') }}" class="block hover:text-gray-200">APBdes</a>
        <a href="{{ route('berita') }}" class="block hover:text-gray-200">Berita</a>
        <a href="{{ route('belanja') }}" class="block hover:text-gray-200">Belanja</a>
    </div>
</nav>


<script>
    // Navbar scroll effect
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.getElementById("navbar");

        if (navbar) {
            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) {
                    navbar.classList.add("scrolled");
                } else {
                    navbar.classList.remove("scrolled");
                }
            });
        }
    });

    // Mobile menu toggle
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener("click", () => {
            mobileMenu.classList.toggle("hidden");
        });
    }
</script>
