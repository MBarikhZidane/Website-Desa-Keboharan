<div>
    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">Struktur Organisasi</h2>

                <div class="flex items-center space-x-2">
                    <button wire:click="create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i> Tambah
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                @if (session()->has('message'))
                    <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3">No</th>
                            <th class="p-3">Foto</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Jabatan</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($organisasis as $index => $organisasi)
                            <tr class="border-b border-gray-200-700">
                                <td class="p-3">{{ $organisasis->firstItem() + $index }}</td>
                                <td class="p-3"> <img src="{{ asset('storage/' . $organisasi->image) }}"
                                        alt="Gambar" class="w-24 h-24 object-cover rounded-lg border"></td>
                                <td class="p-3">{{ $organisasi->name }}</td>
                                <td class="p-3">{{ $organisasi->jabatan }}</td>
                                <td class="p-3 space-x-2">
                                    <button wire:click="edit({{ $organisasi->id }})"
                                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                        <i class="fas fa-edit">Edit</i>
                                    </button>
                                    <button wire:click="confirmDelete({{ $organisasi->id }})"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                        <i class="fas fa-trash">Hapus</i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center mt-5">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $organisasis->links() }}
                </div>
            </div>
        </div>
    </main>
    <!-- Modal Tambah/Edit -->
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-800">
                    {{ $isEdit ? 'Edit Data Organisasi' : 'Tambah Data Organisasi' }}
                </h3>

                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" wire:model="name"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300">
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" wire:model="jabatan"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:ring focus:ring-blue-300">
                        @error('jabatan')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="image" class="block text-sm font-semibold text-gray-800 mb-2">
                            Upload Foto
                        </label>

                        <div
                            class="w-full border-2 border-dashed border-gray-300 rounded-xl p-5 flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition duration-200">
                            <input type="file" id="image" wire:model="image" accept="image/*" class="hidden">
                            <label for="image" class="flex flex-col items-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400 mb-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 0115.9 6h.1a5 5 0 010 10H7z" />
                                </svg>
                                <span class="text-gray-600 text-sm font-medium">
                                    Klik untuk pilih gambar atau seret ke sini
                                </span>
                            </label>
                        </div>

                        @error('image')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror

                        @if ($image)
                            <div class="mt-4">
                                <p class="text-sm text-gray-700 mb-2 font-semibold">Preview:</p>
                                <img src="{{ $image->temporaryUrl() }}" alt="Preview"
                                    class="rounded-xl shadow-md w-40 h-40 object-cover border border-gray-200" />
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" wire:click="closeModal"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">Batal</button>
                        <button type="submit"
                            class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            {{ $isEdit ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif


    <!-- Modal Hapus -->
    @if ($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
                <p>Apakah kamu yakin ingin menghapus data ini?</p>
                <div class="mt-6 flex justify-end space-x-2">
                    <button wire:click="closeModal"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                        Batal
                    </button>
                    <button wire:click="deleteConfirmed"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
