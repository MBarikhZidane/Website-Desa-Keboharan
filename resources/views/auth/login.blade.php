<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Dashboard</title>

  {{-- Tailwind --}}
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-main min-h-screen flex items-center justify-center">

  <div class="bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl px-10 py-8 w-full max-w-md">

    {{-- Logo Desa --}}
    <div class="flex flex-col items-center mb-6">
      <img src="{{ asset('storage/logo.png') }}" class="w-20 h-20 object-cover" alt="Logo Desa">
      <h1 class="text-2xl font-extrabold text-main mt-3 tracking-wide">
        Login Dashboard
      </h1>
    </div>

    {{-- Error --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4 border border-red-300">
        {{ $errors->first() }}
      </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
      @csrf

      {{-- EMAIL --}}
      <div>
        <label class="block mb-1 font-semibold text-gray-700">
          Email
        </label>
        <input type="email" name="email" value="{{ old('email') }}"
          class="w-full border border-gray-400 px-2 py-2 rounded-lg shadow-sm "
          placeholder="Masukkan email..."
          required>
      </div>

      {{-- PASSWORD --}}
      <div>
        <label class="block mb-1 font-semibold text-gray-700">
          Password
        </label>
        <input type="password" name="password"
          placeholder="Masukkan password..."
          class="w-full border border-gray-400 px-2 py-2 rounded-lg shadow-sm "
          required>
      </div>

      {{-- Button --}}
      <button type="submit"
        class="w-full py-2 rounded-lg bg-gray-900 hover:bg-main text-white font-semibold tracking-wide transition transform hover:scale-[1.02]">
        Login
      </button>
    </form>

    {{-- footer --}}
    <p class="text-center text-sm text-gray-500 mt-6">
      &copy; {{ date('Y') }} Pemerintah Desa
    </p>
  </div>

</body>
</html>
