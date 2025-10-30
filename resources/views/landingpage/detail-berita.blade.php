<x-landingpage.app :setting="$setting">
       <section class="pb-10 pt-24 bg-gray-50">
  <div class="max-w-5xl mx-auto px-6">

    {{-- Kategori dan Judul --}}
    <div class="mb-8 text-center">
      <h1 class="text-4xl font-bold text-gray-800 mt-4 mb-2">{{ $berita->title }}</h1>
      <p class="text-gray-500 text-sm">Ditulis oleh <span class="font-semibold">{{ $berita->author }}</span> • {{ $berita->created_at->format('d M Y') }}</p>
    </div>

    {{-- Gambar Berita --}}
    @if($berita->image)
      <div class="mb-8">
        <img src="{{ asset('storage/' . $berita->image) }}" alt="{{ $berita->title }}" class="w-full rounded-xl shadow-md object-cover max-h-[450px] mx-auto">
      </div>
    @endif

    {{-- Isi Berita --}}
    <article class="prose max-w-none prose-lg text-gray-700">
      {!! nl2br(e($berita->description)) !!}
    </article>

    {{-- Tombol Kembali --}}
    <div class="mt-10">
      <a href="{{ url()->previous() }}" class="inline-flex items-center text-main hover:text-main font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>
    </div>

  </div>
</section>

</x-landingpage.app>
