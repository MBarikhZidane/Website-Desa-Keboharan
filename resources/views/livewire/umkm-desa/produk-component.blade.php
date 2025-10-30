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
                            <th class="p-3">Gambar</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Harga</th>
                            <th class="p-3">Kontak</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $index => $produk)
                            <tr class="border-b border-gray-200-700">
                                <td class="p-3">{{ $produks->firstItem() + $index }}</td>
                                <td class="p-3"> <img src="{{ asset('storage/' . $produk->image) }}" alt="Gambar"
                                        class="w-24 h-24 object-cover rounded-lg border"></td>
                                <td class="p-3">{{ $produk->name }}</td>
                                <td class="p-3">{{ $produk->price }}</td>
                                <td class="p-3">{{ $produk->description }}</td>
                                <td class="p-3">{{ $produk->contact }}</td>
                                <td class="p-3 space-x-2">
                                    <button wire:click="edit({{ $produk->id }})"
                                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                        <i class="fas fa-edit">Edit</i>
                                    </button>
                                    <button wire:click="confirmDelete({{ $produk->id }})"
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
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </main>
    <!-- Modal Tambah/Edit -->
    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
            <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-xl">
                <h3 class="text-lg font-semibold mb-4">
                    {{ $isEdit ? 'Edit Produk' : 'Tambah Produk' }}
                </h3>

                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                    <div class="space-y-3">

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                            <input type="text" wire:model="name"
                                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300">
                            @error('name')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Harga</label>
                                <input type="number" wire:model="price"
                                    class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" />
                                @error('price')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Kontak</label>
                                <input type="text" wire:model="contact"
                                    class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" />
                                @error('contact')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea wire:model="description" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"></textarea>
                            @error('description')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="image" class="block text-sm font-semibold text-gray-800 mb-2">
                                Upload Gambar
                            </label>

                            <div
                                class="w-full border-2 border-dashed border-gray-300 rounded-xl p-2 flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition duration-200">
                                <input type="file" id="image" wire:model="image" accept="image/*" class="hidden">
                                <label for="image" class="flex flex-col items-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400 mb-2"
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
                                        class="rounded-xl shadow-md w-20 h-20 object-cover border border-gray-200" />
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" wire:click="$set('showModal', false)"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            {{ $isEdit ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif


    <!-- Modal Hapus -->
    @if ($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
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
