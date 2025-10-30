<x-landingpage.app :setting="$setting">
    <div class="bg-gray-50 text-gray-800 pt-20">
        <!-- Header -->
        <section class="py-12 px-4 text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-main uppercase mb-4">
                Berita Desa Keboharan
            </h1>
            <p class="max-w-2xl mx-auto text-gray-600">
                Dimana kalian bisa menemukan berita terkini, di desa Keboharan
            </p>
        </section>
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
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
    </div>

</x-landingpage.app>
