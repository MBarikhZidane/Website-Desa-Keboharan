<nav class="fixed top-0 left-0 w-full bg-[#F4F5EE] shadow-md z-50">
    <div class="container mx-auto h-20 flex justify-between items-center px-4">
        <!-- Logo -->
        <div class="logo flex items-center gap-2">
            <div class="ikon px-3 py-2 bg-main rounded-full text-xl md:text-2xl">
                <i class="bi bi-building text-white"></i>
            </div>
            <div class="logo-text">
                <h1 class="font-bold text-sm lg:text-lg">Desa Keboharan</h1>
                <p class="leading-relaxed text-[10px] md:text-xs lg:text-sm text-gray-600">
                    Krian, Sidoarjo
                </p>
            </div>
        </div>

        <!-- Tombol hamburger (mobile) -->
        <button id="menu-btn" class="md:hidden text-2xl focus:outline-none">
            <i class="bi bi-list"></i>
        </button>

        <!-- Menu desktop -->
        <ul id="menu" class="hidden md:flex items-center text-gray-600 font-bold space-x-2">
            <li
                class="px-3 py-[6px] rounded-md flex items-center
    {{ request()->routeIs('beranda') ? 'bg-main text-white' : 'hover:bg-main hover:text-white' }}">
                <i class="bi bi-house-door"></i>
                <a href="{{ route('beranda') }}" class="ml-1 text-sm">Beranda</a>
            </li>

            <li
                class="px-3 py-[6px] rounded-md flex items-center {{ request()->routeIs('profil') ? 'bg-main text-white' : 'hover:bg-main hover:text-white' }}">
                <i class="bi bi-person"></i>
                <a href="{{ route('profil') }}" class="ml-1 text-sm">Profil Desa</a>
            </li>
            <li
                class="px-3 py-[6px] rounded-md flex items-center
    {{ request()->routeIs('infografis') ? 'bg-main text-white' : 'hover:bg-main hover:text-white' }}">
                <i class="bi bi-person-vcard"></i>
                <a href="{{ route('infografis') }}" class="ml-1 text-sm">Infografis</a>
            </li>

            <li
                class="px-3 py-[6px] rounded-md flex items-center
    {{ request()->routeIs('apbdes') ? 'bg-main text-white' : 'hover:bg-main hover:text-white' }}">
                <i class="bi bi-geo-alt"></i>
                <a href="{{ route('apbdes') }}" class="ml-1 text-sm">APBDes</a>
            </li>

            <li
                class="px-3 py-[6px] rounded-md flex items-center
    {{ request()->routeIs('berita') ? 'bg-main text-white' : 'hover:bg-main hover:text-white' }}">
                <i class="bi bi-newspaper"></i>
                <a href="{{ route('berita') }}" class="ml-1 text-sm">Berita</a>
            </li>

            <li
                class="px-3 py-[6px] rounded-md flex items-center
    {{ request()->routeIs('belanja') ? 'bg-main text-white' : 'hover:bg-main hover:text-white' }}">
                <i class="bi bi-bag"></i>
                <a href="{{ route('belanja') }}" class="ml-1 text-sm">Belanja</a>
            </li>

        </ul>
    </div>

<div id="mobile-menu" class="hidden flex-col gap-2 px-6 pb-4 md:hidden text-gray-600 bg-[#F4F5EE] shadow-md">
    <ul class="space-y-1 px-3">

        <!-- Beranda -->
        <li class="{{ request()->routeIs('beranda') ? 'bg-main text-white' : '' }}">
            <a href="{{ route('beranda') }}"
               class="flex items-center gap-2 w-full px-4 py-2 rounded-md hover:bg-main hover:text-white">
                <i class="bi bi-house-door"></i>
                <span>Beranda</span>
            </a>
        </li>

        <!-- Profil -->
        <li class="{{ request()->routeIs('profil') ? 'bg-main text-white' : '' }}">
            <a href="{{ route('profil') }}"
               class="flex items-center gap-2 w-full px-4 py-2 rounded-md hover:bg-main hover:text-white">
                <i class="bi bi-person"></i>
                <span>Profil Desa</span>
            </a>
        </li>

        <!-- Infografis -->
        <li class="{{ request()->routeIs('infografis') ? 'bg-main text-white' : '' }}">
            <a href="{{ route('infografis') }}"
               class="flex items-center gap-2 w-full px-4 py-2 rounded-md hover:bg-main hover:text-white">
                <i class="bi bi-person-vcard"></i>
                <span>Infografis</span>
            </a>
        </li>

        <!-- APBDes -->
        <li class="{{ request()->routeIs('apbdes') ? 'bg-main text-white' : '' }}">
            <a href="{{ route('apbdes') }}"
               class="flex items-center gap-2 w-full px-4 py-2 rounded-md hover:bg-main hover:text-white">
                <i class="bi bi-geo-alt"></i>
                <span>APBDes</span>
            </a>
        </li>

        <!-- Berita -->
        <li class="{{ request()->routeIs('berita') ? 'bg-main text-white' : '' }}">
            <a href="{{ route('berita') }}"
               class="flex items-center gap-2 w-full px-4 py-2 rounded-md hover:bg-main hover:text-white">
                <i class="bi bi-newspaper"></i>
                <span>Berita</span>
            </a>
        </li>

        <!-- Belanja -->
        <li class="{{ request()->routeIs('belanja') ? 'bg-main text-white' : '' }}">
            <a href="{{ route('belanja') }}"
               class="flex items-center gap-2 w-full px-4 py-2 rounded-md hover:bg-main hover:text-white">
                <i class="bi bi-bag"></i>
                <span>Belanja</span>
            </a>
        </li>

    </ul>
</div>

</nav>
