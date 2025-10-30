<div>
    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">Daftar Dusun</h2>

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
                            <th class="p-3">Nama Dusun</th>
                            <th class="p-3">Jumlah Laki-laki</th>
                            <th class="p-3">Jumlah Perempuan</th>
                            <th class="p-3">Jumlah kepala keluarga</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dusuns as $index => $dusun)
                            <tr class="border-b border-gray-200-700">
                                <td class="p-3">{{ $dusuns->firstItem() + $index }}</td>
                                <td class="p-3">{{ $dusun->name }}</td>
                                <td class="p-3">{{ $dusun->total_pria }}</td>
                                <td class="p-3">{{ $dusun->total_perempuan }}</td>
                                <td class="p-3">{{ $dusun->total_kepalakeluarga }}</td>
                                <td class="p-3 space-x-2">
                                    <button wire:click="edit({{ $dusun->id }})"
                                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                        <i class="fas fa-edit">Edit</i>
                                    </button>
                                    <button wire:click="confirmDelete({{ $dusun->id }})"
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
                    {{ $dusuns->links() }}
                </div>
            </div>
        </div>
    </main>
    <!-- Modal Tambah/Edit -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                <h3 class="text-lg font-semibold mb-4">
                    {{ $isEdit ? 'Edit Dusun' : 'Tambah Dusun' }}
                </h3>

                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Nama Dusun</label>
                        <input type="text" wire:model="name"
                            class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" />
                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Laki-laki</label>
                            <input type="number" wire:model="total_pria"
                                class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" />
                            @error('total_pria')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jumlah Perempuan</label>
                            <input type="number" wire:model="total_perempuan"
                                class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" />
                            @error('total_perempuan')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-3">
                        <label class="block text-sm font-medium text-gray-700">Jumlah Kepala Keluarga</label>
                        <input type="number" wire:model="total_kepalakeluarga"
                            class="w-full border border-gray-300 rounded p-2 focus:ring focus:ring-blue-300" />
                        @error('total_kepalakeluarga')
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
