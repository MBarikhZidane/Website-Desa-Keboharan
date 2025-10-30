<div>
    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">Daftar Pendidikan</h2>

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
                            <th class="p-3">Tingkat Pendidikan</th>
                            <th class="p-3">Jumlah Warga</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jumlahs as $index => $jumlah)
                            <tr class="border-b border-gray-200-700">
                                <td class="p-3">{{ $jumlahs->firstItem() + $index }}</td>
                                <td class="p-3">{{ $jumlah->jenispendidikan->name }}</td>
                                <td class="p-3">{{ $jumlah->jumlah }}</td>
                                <td class="p-3 space-x-2">
                                    <button wire:click="edit({{ $jumlah->id }})"
                                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                        <i class="fas fa-edit">Edit</i>
                                    </button>
                                    <button wire:click="confirmDelete({{ $jumlah->id }})"
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
                    {{ $jumlahs->links() }}
                </div>
            </div>
        </div>
    </main>
    <!-- Modal Tambah/Edit -->

    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                <h3 class="text-lg font-semibold mb-4">
                    {{ $isEdit ? 'Edit Pendidikan' : 'Tambah Pendidikan' }}
                </h3>

                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Pendidikan</label>
                        <select wire:model="pendidikan_id"
                            class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300">
                            <option value="">Pilih Agama</option>
                            @foreach ($pendidikans as $pendidikan)
                                <option value="{{ $pendidikan->id }}">{{ $pendidikan->name }}</option>
                            @endforeach
                        </select>
                        @error('pendidikan_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="text" wire:model="jumlah"
                            class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" />
                        @error('jumlah')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <button type="button" wire:click="$set('showModal', false)"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                            Batal
                        </button>
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

