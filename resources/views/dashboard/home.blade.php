<x-dashboard.app :setting="$setting">
    <section class="p-6 bg-gray-50 min-h-screen">
  <div class="max-w-7xl mx-auto">

    {{-- Judul Halaman --}}
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Beranda Dashboard</h1>

    {{-- Statistik Utama --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-10">
      <div class="bg-white p-5 rounded-xl shadow text-center">
        <p class="text-gray-500 text-sm mb-1">Penduduk</p>
        <h2 class="text-2xl font-bold text-green-700">{{ $total_penduduk }}</h2>
      </div>
      <div class="bg-white p-5 rounded-xl shadow text-center">
        <p class="text-gray-500 text-sm mb-1">Laki-laki</p>
        <h2 class="text-2xl font-bold text-blue-600">{{ $total_laki }}</h2>
      </div>
      <div class="bg-white p-5 rounded-xl shadow text-center">
        <p class="text-gray-500 text-sm mb-1">Perempuan</p>
        <h2 class="text-2xl font-bold text-pink-600">{{ $total_perempuan }}</h2>
      </div>
      <div class="bg-white p-5 rounded-xl shadow text-center">
        <p class="text-gray-500 text-sm mb-1">Kepala Keluarga</p>
        <h2 class="text-2xl font-bold text-yellow-600">{{ $total_kepala_keluarga }}</h2>
      </div>
      <div class="bg-white p-5 rounded-xl shadow text-center">
        <p class="text-gray-500 text-sm mb-1">Pendapatan</p>
        <h2 class="text-2xl font-bold text-green-700">
          Rp {{ number_format($total_pendapatan, 0, ',', '.') }}
        </h2>
      </div>
      <div class="bg-white p-5 rounded-xl shadow text-center">
        <p class="text-gray-500 text-sm mb-1">Belanja</p>
        <h2 class="text-2xl font-bold text-red-600">
          Rp {{ number_format($total_belanja, 0, ',', '.') }}
        </h2>
      </div>
    </div>

  </div>
</section>
</x-dashboard.app>
