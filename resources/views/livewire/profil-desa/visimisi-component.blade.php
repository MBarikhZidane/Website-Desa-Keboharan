<div>
    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">Visi Misi dan Sejarah</h2>

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
                            <th class="p-3">Visi</th>
                            <th class="p-3">Misi</th>
                            <th class="p-3">Sejarah</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($visimisis as $index => $visimisi)
                            <tr class="border-b border-gray-200-700">
                                <td class="p-3">{{ $visimisis->firstItem() + $index }}</td>
                                <td class="p-3">{{ $visimisi->visi }}</td>
                                <td class="p-3">{{ $visimisi->misi }}</td>
                                <td class="p-3">{{ $visimisi->sejarah }}</td>
                                <td class="p-3 space-x-2">
                                    <button wire:click="edit({{ $visimisi->id }})"
                                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                        <i class="fas fa-edit">Edit</i>
                                    </button>
                                    <button wire:click="confirmDelete({{ $visimisi->id }})"
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
                    {{ $visimisis->links() }}
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
                    <div class="mb-5">
                        <label for="visi" class="block text-sm font-semibold text-gray-800 mb-2">
                            Visi
                        </label>
                        <textarea id="visi" wire:model="visi" placeholder="Tulis visi..."
                            class="w-full border border-gray-300 rounded-xl p-3 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none min-h-[100px]"></textarea>
                        @error('visi')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="misi" class="block text-sm font-semibold text-gray-800 mb-2">
                            Misi
                        </label>
                        <textarea id="misi" wire:model="misi" placeholder="Tulis misi..."
                            class="w-full border border-gray-300 rounded-xl p-3 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none min-h-[100px]"></textarea>
                        @error('misi')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="sejarah" class="block text-sm font-semibold text-gray-800 mb-2">
                            Sejarah
                        </label>
                        <textarea id="sejarah" wire:model="sejarah" placeholder="Tulis Sejarah..."
                            class="w-full border border-gray-300 rounded-xl p-3 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 resize-none min-h-[100px]"></textarea>
                        @error('sejarah')
                            <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span>
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
