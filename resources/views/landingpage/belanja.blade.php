<x-landingpage.app :setting="$setting">
        <div class="bg-gray-50 text-gray-800 pt-20">
    <!-- Header -->
    <section class="py-12 px-4 text-center">
      <h1
        class="text-3xl sm:text-4xl font-extrabold text-main uppercase mb-4"
      >
        Produk UMKM
      </h1>
      <p class="max-w-2xl mx-auto text-gray-600">
        Produk UMKM dari desa keboharang lengkap, mulai dari kerajinan, makanan, dan lainnya.
      </p>
    </section>
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
@foreach ($produks as $produk)
    <a href="{{ route('showbelanja', $produk->id) }}"
        class="block">
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



    </div>

</x-landingpage.app>
