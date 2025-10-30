<x-landingpage.app :setting="$setting">
       <section class="pb-12 pt-30 bg-gray-50">
  <div class="max-w-5xl mx-auto px-6">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col md:flex-row">

      {{-- Gambar Produk --}}
      <div class="md:w-1/2">
        <img src="{{ asset('storage/' . $produk->image) }}"
             alt="{{ $produk->name }}"
             class="w-full h-96 object-cover">
      </div>

      {{-- Detail Produk --}}
      <div class="md:w-1/2 p-8 flex flex-col justify-between">
        <div>
          <h1 class="text-3xl font-bold text-gray-800 mb-3">{{ $produk->name }}</h1>
          <p class="text-2xl font-semibold text-main mb-4">
            Rp {{ number_format($produk->price, 0, ',', '.') }}
          </p>
          <p class="text-gray-600 mb-6 leading-relaxed">{{ $produk->description }}</p>
        </div>

        <div class="border-t pt-4 mt-4">
          <h3 class="text-sm text-gray-500 mb-1">Hubungi Penjual: {{ $produk->contact }}</h3>
          <a href="https://wa.me/{{ $produk->contact }}"
             target="_blank"
             class="inline-flex items-center bg-main text-white px-4 py-2 rounded-lg hover:bg-main transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 13a9 9 0 110-18 9 9 0 010 18z" />
            </svg>
            Chat Penjual
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>

</x-landingpage.app>
