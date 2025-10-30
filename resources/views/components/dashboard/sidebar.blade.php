@php
    $isKependudukanActive = request()->routeIs('dashboard.kependudukan.*');
    $isAnggaranActive = request()->routeIs('dashboard.anggaran.*');
    $isProfilActive = request()->routeIs('dashboard.profil-desa.*');
@endphp

<div id="sidebar"
    class="fixed lg:static inset-y-0 left-0 w-64 bg-main text-white shadow-lg min-h-screen transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out" style="z-index: 10;">

    <!-- Header -->
    <div class="p-6 border-b border-main-light">
        <h1 class="text-xl font-bold">Dashboard Admin</h1>
        <p class="text-sm text-gray-300 mt-1">Selamat datang kembali</p>
    </div>

    <!-- NAV -->
    <nav class="mt-6">
        <ul class="space-y-2 px-4">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard.home') }}"
                    class="menu-item flex items-center px-4 py-3 rounded-lg transition-colors duration-200
        hover:bg-white/10
        {{ request()->routeIs('dashboard.home') ? 'bg-white/10' : '' }}">

                    <i class="bi bi-house text-2xl mr-3"></i>
                    Dashboard
                </a>
            </li>


            {{-- Kependudukan --}}
            <li>
                <div class="menu-item flex items-center justify-between px-4 py-3 rounded-lg cursor-pointer"
                    onclick="toggleSubmenu('kependudukan-menu')">

                    <div class="flex items-center">
                        {{-- ICON Users --}}
                        <i class="bi bi-person-fill text-2xl mr-3"></i>
                        Kependudukan
                    </div>

                    {{-- Arrow --}}
                    <i class="bi bi-chevron-down"></i>
                </div>

                <ul id="kependudukan-menu"
                    class="submenu ml-8 mt-2 space-y-1 overflow-hidden transition-all duration-300
                    {{ $isKependudukanActive ? 'max-h-96' : 'max-h-0' }}">

                    {{-- Agama --}}
                    <li>
                        <a href="{{ route('dashboard.kependudukan.agama') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.kependudukan.agama') ? 'bg-white/10' : '' }}">
                            Agama
                        </a>
                    </li>

                    {{-- Dusun --}}
                    <li>
                        <a href="{{ route('dashboard.kependudukan.dusun') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.kependudukan.dusun') ? 'bg-white/10' : '' }}">

                            Dusun
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.kependudukan.pendidikan') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.kependudukan.pendidikan') ? 'bg-white/10' : '' }}">

                            Pendidikan
                        </a>
                    </li>

                </ul>
            </li>

            {{-- Anggaran --}}
            <li>
                <div class="menu-item flex items-center justify-between px-4 py-3 rounded-lg cursor-pointer"
                    onclick="toggleSubmenu('anggaran-menu')">

                    <div class="flex items-center">

                        {{-- ICON Wallet --}}
                        <i class="bi bi-cash text-2xl mr-3"></i>

                        Anggaran
                    </div>

                    {{-- Arrow --}}
                    <i class="bi bi-chevron-down"></i>

                </div>

                <ul id="anggaran-menu"
                    class="submenu ml-8 mt-2 space-y-1 overflow-hidden transition-all duration-300
                    {{ $isAnggaranActive ? 'max-h-96' : 'max-h-0' }}">

                    <li>
                        <a href="{{ route('dashboard.anggaran.pendapatan') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.anggaran.pendapatan') ? 'bg-white/10' : '' }}">

                            Pendapatan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.anggaran.pengeluaran') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.anggaran.pengeluaran') ? 'bg-white/10' : '' }}">
                            Pengeluaran
                        </a>
                    </li>

                </ul>
            </li>

            {{-- PROFIL DESA --}}
            <li>
                <div class="menu-item flex items-center justify-between px-4 py-3 rounded-lg cursor-pointer"
                    onclick="toggleSubmenu('profil-menu')">
                    <div class="flex items-center">

                        {{-- ICON Map --}}
                        <i class="bi bi-bank text-2xl mr-3"></i>

                        Profil Desa
                    </div>

                    {{-- Arrow --}}
                    <i class="bi bi-chevron-down"></i>

                </div>

                <ul id="profil-menu"
                    class="submenu ml-8 mt-2 space-y-1 overflow-hidden transition-all duration-300
                    {{ $isProfilActive ? 'max-h-96' : 'max-h-0' }}">

                    <li>
                        <a href="{{ route('dashboard.profil-desa.carousel') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.profil-desa.carousel') ? 'bg-white/10' : '' }}">
                            Carousel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.profil-desa.visimisi') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.profil-desa.visimisi') ? 'bg-white/10' : '' }}">
                            Visi & Misi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.profil-desa.petalokasi') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.profil-desa.petalokasi') ? 'bg-white/10' : '' }}">
                            Lokasi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.profil-desa.organisasi') }}"
                            class="submenu-item flex items-center px-4 py-2 rounded-lg
                            {{ request()->routeIs('dashboard.profil-desa.organisasi') ? 'bg-white/10' : '' }}">
                            Organisasi
                        </a>
                    </li>

                </ul>
            </li>
                        <li>
                <a href="{{ route('dashboard.berita') }}"
                    class="menu-item flex items-center px-4 py-3 rounded-lg transition-colors duration-200
        hover:bg-white/10
        {{ request()->routeIs('dashboard.berita') ? 'bg-white/10' : '' }}">

        <i class="bi bi-newspaper text-2xl mr-3"></i>
                    Berita
                </a>
            </li>
                        <li>
                <a href="{{ route('dashboard.produk') }}"
                    class="menu-item flex items-center px-4 py-3 rounded-lg transition-colors duration-200
        hover:bg-white/10
        {{ request()->routeIs('dashboard.produk') ? 'bg-white/10' : '' }}">

        <i class="bi bi-basket text-2xl mr-3"></i>
                    Produk
                </a>
            </li>

                        <li>
                <a href="{{ route('dashboard.galeri') }}"
                    class="menu-item flex items-center px-4 py-3 rounded-lg transition-colors duration-200
        hover:bg-white/10
        {{ request()->routeIs('dashboard.galeri') ? 'bg-white/10' : '' }}">

        <i class="bi bi-image text-2xl mr-3"></i>
                    Galeri
                </a>
            </li>
                        <li>
                <a href="{{ route('dashboard.setting') }}"
                    class="menu-item flex items-center px-4 py-3 rounded-lg transition-colors duration-200
        hover:bg-white/10
        {{ request()->routeIs('dashboard.setting') ? 'bg-white/10' : '' }}">

        <i class="bi bi-gear text-2xl mr-3"></i>
                    Pengaturan
                </a>
            </li>


        </ul>
    </nav>

</div>
