<x-landingpage.app :setting="$setting">
<div class="relative overflow-hidden w-full h-[450px] md:h-[700px] mt-[72px] md:mt-0">

    <!-- Wrapper gambar -->
    <div id="carousel-images" class="flex transition-transform duration-700">
        @foreach ($carousels as $carousel)
            <img src="{{ asset('storage/' . $carousel->image) }}" 
                 alt="Carousel Image"
                 class="w-full h-full object-cover flex-shrink-0">
        @endforeach
    </div>

    <!-- Prev Button -->
    <button id="carousel-prev"
        class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/40 text-white px-3 py-2 rounded-full">
        ‹
    </button>

    <!-- Next Button -->
    <button id="carousel-next"
        class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/40 text-white px-3 py-2 rounded-full">
        ›
    </button>

</div>


    <div class="container mx-auto mt-20 max-w-6xl px-4">
        <h1 class="text-center font-bold text-3xl sm:text-4xl text-main mb-8">
            JELAJAHI DESA
        </h1>

        <!-- Grid Card -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8 md:gap-10 justify-items-center">
            <!-- Card 1 -->
            <div
                class="bg-white shadow-lg border border-gray-300 rounded-2xl p-5 sm:p-6 text-center hover:shadow-xl transition hover:text-main hover:border-main text-gray-500 flex flex-col justify-between w-full max-w-[150px] sm:max-w-[180px] md:max-w-[200px] lg:max-w-[230px] h-36 sm:h-40">
                <i class="bi bi-bank text-4xl sm:text-5xl md:text-6xl mb-2"></i>
                <h1 class="font-bold text-sm sm:text-base md:text-lg">Profil Desa</h1>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white shadow-lg border border-gray-300 rounded-2xl p-5 sm:p-6 text-center hover:shadow-xl transition hover:text-main hover:border-main text-gray-500 flex flex-col justify-between w-full max-w-[150px] sm:max-w-[180px] md:max-w-[200px] lg:max-w-[230px] h-36 sm:h-40">
                <i class="bi bi-people text-4xl sm:text-5xl md:text-6xl mb-2"></i>
                <h1 class="font-bold text-sm sm:text-base md:text-lg">Penduduk</h1>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white shadow-lg border border-gray-300 rounded-2xl p-5 sm:p-6 text-center hover:shadow-xl transition hover:text-main hover:border-main text-gray-500 flex flex-col justify-between w-full max-w-[150px] sm:max-w-[180px] md:max-w-[200px] lg:max-w-[230px] h-36 sm:h-40">
                <i class="bi bi-bar-chart text-4xl sm:text-5xl md:text-6xl mb-2"></i>
                <h1 class="font-bold text-sm sm:text-base md:text-lg">Demografi</h1>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-white shadow-lg border border-gray-300 rounded-2xl p-5 sm:p-6 text-center hover:shadow-xl transition hover:text-main hover:border-main text-gray-500 flex flex-col justify-between w-full max-w-[150px] sm:max-w-[180px] md:max-w-[200px] lg:max-w-[230px] h-36 sm:h-40">
                <i class="bi bi-newspaper text-4xl sm:text-5xl md:text-6xl mb-2"></i>
                <h1 class="font-bold text-sm sm:text-base md:text-lg">Berita Desa</h1>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-18 px-4">
        <h1 class="text-center text-2xl sm:text-3xl font-bold text-main mb-2">
            Profil Desa Keboharan
        </h1>
        <p class="text-center text-base sm:text-lg text-gray-700 mb-10 sm:mb-12">
            Mengenal lebih dekat visi, misi, dan sejarah Desa Keboharan
        </p>

        <!-- Wrapper utama -->
        <div class="flex flex-col lg:flex-row max-w-5xl justify-center items-center mx-auto gap-10 lg:gap-28">
            <!-- Konten kiri -->
            <div class="flex flex-col gap-y-3 flex-1 text-center lg:text-left">
                <h1 class="font-bold text-lg sm:text-xl text-main">
                    Visi
                </h1>
                <p class="leading-relaxed text-sm sm:text-base">
                    {{ $visimisi->visi ?? '-' }}
                </p>

                <h1 class="font-bold text-lg sm:text-xl text-main mt-4">
                    Misi
                </h1>
                <p class="leading-relaxed text-sm sm:text-base">
                    {{ $visimisi->misi ?? '-' }}
                </p>
            </div>

            <!-- Gambar kanan -->
            <div class="flex-1 flex justify-center">
                <img src="poke.png" alt="Profil Desa"
                    class="w-3/4 sm:w-[350px] md:w-[400px] lg:w-[450px] rounded-xl shadow-md" />
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 my-10">
        <h1 class="text-center text-2xl sm:text-3xl font-bold text-main mb-4">
            Lokasi Desa Keboharan
        </h1>
        <p class="text-center text-gray-600 mb-6">
            Temukan lokasi Desa Keboharan secara langsung di peta berikut.
        </p>

        <!-- Wrapper responsif -->
        <div class="relative w-full" style="padding-top: 56.25%; /* Rasio 16:9 */">
            <iframe class="absolute top-0 left-0 w-full h-full rounded-xl shadow-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.501686428388!2d112.64667417586463!3d-7.422497373566368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e3c8b6238b67%3A0x3cb5efea8b1f37b8!2sDesa%20Keboharan%2C%20Kec.%20Krian%2C%20Kabupaten%20Sidoarjo%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    <div class="container mx-auto px-4 my-16">
        <h1 class="text-center text-2xl sm:text-3xl font-bold text-main mb-10">
            Daftar Anggota Desa Keboharan
        </h1>

        <!-- Grid Card -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-6 sm:gap-8 justify-items-center">
            @foreach ($organisasis as $org)
                <div
                    class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 w-full max-w-[200px] sm:max-w-[220px] md:max-w-[240px] lg:max-w-[260px] overflow-hidden border border-gray-300">
                    <img src="{{ asset('storage/' . $org->image) }}" alt="Kepala Desa"
                        class="w-full h-36 sm:h-40 object-cover" />
                    <div class="p-3 sm:p-4 text-center">
                        <h2 class="text-base sm:text-lg font-bold text-main">{{ $org->name }}</h2>
                        <p class="text-gray-600 text-sm sm:text-base">{{ $org->jabatan }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="container mx-auto px-4 my-16">
        <h1 class="text-center text-2xl sm:text-3xl font-bold text-main mb-10">
            Statistik Administrasi Penduduk
        </h1>

        <!-- Wrapper utama -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 max-w-6xl mx-auto">
            <!-- Info Box: Jumlah Penduduk -->
            <div
                class="flex items-center bg-[#F4F5EE] rounded-2xl p-5 shadow hover:shadow-lg transition-all duration-300">
                <div class="bg-main text-white p-4 rounded-xl text-2xl sm:text-3xl">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-main">
                        Total Penduduk
                    </h2>
                    <p class="text-2xl font-bold text-gray-800">{{ $total_penduduk }} Jiwa</p>
                </div>
            </div>
            <div
                class="flex items-center bg-[#F4F5EE] rounded-2xl p-5 shadow hover:shadow-lg transition-all duration-300">
                <div class="bg-main text-white p-4 rounded-xl text-2xl sm:text-3xl">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-main">
                        Total Laki-laki
                    </h2>
                    <p class="text-2xl font-bold text-gray-800">{{ $total_laki }} Jiwa</p>
                </div>
            </div>
            <div
                class="flex items-center bg-[#F4F5EE] rounded-2xl p-5 shadow hover:shadow-lg transition-all duration-300">
                <div class="bg-main text-white p-4 rounded-xl text-2xl sm:text-3xl">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-main">
                        Total Perempuan
                    </h2>
                    <p class="text-2xl font-bold text-gray-800">{{ $total_perempuan }} Jiwa</p>
                </div>
            </div>
            <div
                class="flex items-center bg-[#F4F5EE] rounded-2xl p-5 shadow hover:shadow-lg transition-all duration-300">
                <div class="bg-main text-white p-4 rounded-xl text-2xl sm:text-3xl">
                    <i class="bi bi-people"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-main">
                        Total Kepala Keluarga
                    </h2>
                    <p class="text-2xl font-bold text-gray-800">{{ $total_kepala_keluarga }} Jiwa</p>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-[#F9FAF5] py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-center text-3xl sm:text-4xl font-bold text-main mb-12">
                Berita Terkini Desa Keboharan
            </h1>

            <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 sm:gap-10">
                @foreach ($beritas as $berita)
                    <a href="{{ route('beritashow', $berita->slug) }}" class="block">
                        <div
                            class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition group cursor-pointer">
                            <img src="{{ asset('storage/' . $berita->image) }}" alt="Berita Desa"
                                class="w-full h-48 object-cover group-hover:scale-105 transition" />

                            <div class="p-6">
                                <span class="text-sm text-gray-500 flex items-center gap-1">
                                    <i class="bi bi-calendar"></i>
                                    {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}
                                </span>

                                <h2 class="text-lg font-bold text-main mt-2 group-hover:underline">
                                    {{ $berita->title }}
                                </h2>

                                <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                                    {{ Str::limit($berita->description, 100) }}
                                </p>

                                <span
                                    class="mt-4 text-main font-semibold text-sm flex items-center group-hover:underline">
                                    Baca Selengkapnya
                                    <i class="bi bi-arrow-right-short text-lg"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </section>

    
    <section class="bg-[#F9FAF5] py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-center text-3xl sm:text-4xl font-bold text-main mb-12">
                Galeri Desa Keboharan
            </h1>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5">
                <div class="overflow-hidden rounded-2xl shadow-md hover:scale-105 transition duration-300">
                    @foreach ($galeris as $galeri)
                        <img src="{{ asset('storage/' . $galeri->image) }}" alt="Galeri 1"
                            class="w-full h-48 object-cover" />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
        <section class="bg-[#F8FAF5] py-16 px-6">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-center text-3xl sm:text-4xl font-bold text-main mb-12">
                Rekapitulasi Keuangan Desa Tahun 2025
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Pendapatan Desa -->
                <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden group">
                    <div class="absolute top-0 left-0 w-2 h-full bg-main group-hover:h-0 transition-all duration-500">
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">
                                    Pendapatan Desa
                                </h2>
                                <p class="text-3xl font-bold text-main mt-1">
                                    Rp {{ number_format($total_pendapatan, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-main text-5xl">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4 text-gray-600">
                            <p>
                                Pendapatan desa berasal dari pajak, retribusi, bantuan
                                pemerintah, dan sumber lain yang sah.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Belanja Desa -->
                <div class="relative bg-white rounded-2xl shadow-xl overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-2 h-full bg-[#B91C1C] group-hover:h-0 transition-all duration-500">
                    </div>
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-700">
                                    Belanja Desa
                                </h2>
                                <p class="text-3xl font-bold text-[#B91C1C] mt-1">
                                    Rp {{ number_format($total_belanja, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-[#B91C1C] text-5xl">
                                <i class="bi bi-credit-card-2-front"></i>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 pt-4 text-gray-600">
                            <p>
                                Belanja desa mencakup kegiatan pembangunan, administrasi, dan
                                pelayanan masyarakat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-center text-3xl font-bold text-main mb-8">
            Produk Unggulan Desa
        </h2>
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($produks as $produk)
                <a href="{{ route('showbelanja', $produk->id) }}" class="block">
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300 group cursor-pointer">

                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $produk->image) }}" alt="Produk"
                                class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110" />
                        </div>

                        <div class="p-5">
                            <h3 class="text-lg font-bold text-gray-800 group-hover:text-main transition">
                                {{ $produk->name }}
                            </h3>

                            <p class="text-gray-500 text-sm mt-1">
                                {{ Str::limit($produk->description, 100) }}
                            </p>

                            <div class="flex justify-between items-center mt-4">
                                <span class="text-main font-bold text-lg">
                                    Rp{{ number_format($produk->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                    </div>
                </a>
            @endforeach

        </div>
    </div>
</x-landingpage.app>
