<x-landingpage.app :setting="$setting">
    <main class="max-w-6xl mx-auto pb-12 pt-30 px-4 space-y-8">
        <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-main">
            <h2 class="text-2xl font-semibold text-main mb-6">Visi & Misi</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-semibold text-main mb-2">Visi</h3>
                    <p class="italic text-gray-700">
                        “{{ $visimisi->visi ?? '-' }}”
                    </p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-main mb-2">Misi</h3>
                    <ul class="list-disc ml-6 space-y-1 text-gray-700">
                        {{ $visimisi->misi ?? '-' }}
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-main">
            <h2 class="text-2xl font-semibold text-main mb-4">Sejarah Desa</h2>
            <p class="text-justify leading-relaxed">
                {{ $visimisi->sejarah ?? '-' }}
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-main">
            <h2 class="text-2xl font-semibold text-main mb-4">Struktur Organisasi</h2>
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

        <div class="bg-white rounded-2xl shadow-lg p-8 border-t-4 border-main">
            <h2 class="text-2xl font-semibold text-main mb-6">Informasi Wilayah</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-main mb-3">Luas Wilayah</h3>
                    <p>{{ $lokasis->luas_desa ?? '-' }}</p>
                </div>
                <div class="rounded-xl p-6 shadow-sm">
                    <h3 class="text-lg font-semibold text-main mb-3">Batas Wilayah</h3>
                    <ul class="list-disc ml-5 space-y-1">
                        <li>Utara: {{ $lokasis->utara ?? '-' }}</li>
                        <li>Selatan: {{ $lokasis->selatan ?? '-' }}</li>
                        <li>Timur: {{ $lokasis->timur ?? '-' }}</li>
                        <li>Barat: {{ $lokasis->barat ?? '-' }}</li>
                    </ul>
                </div>
            </div>
        </div>

    </main>
</x-landingpage.app>
