<x-dashboard.app>
<div>
    <main class="p-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">Daftar Pekerjaan</h2>

                <div class="flex items-center space-x-2">
                    <input type="text" wire:model.debounce.500ms="search" placeholder="Cari pekerjaan..."
                        class="px-3 py-2 border rounded text-sm focus:ring focus:ring-blue-300" />

                    <button wire:click="create" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        <i class="fas fa-plus mr-2"></i> Add
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
                            <th class="p-3">Nama</th>
                            <th class="p-3">Perusahaan</th>
                            <th class="p-3">Lokasi</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @forelse($pekerjaans as $index => $pekerjaan)
                            <tr class="border-b border-gray-200-700">
                                <td class="p-3">{{ $pekerjaans->firstItem() + $index }}</td>
                                <td class="p-3">{{ $pekerjaan->judul }}</td>
                                <td class="p-3">{{ $pekerjaan->perusahaan->nama }}</td>
                                <td class="p-3">{{ $pekerjaan->lokasi }}</td>
                                <td class="p-3">{{ $pekerjaan->status }}</td>
                                <td class="p-3 space-x-2">
                                    <button wire:"
                                        class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button wire:" onclick="openDeleteModal()"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center mt-5">Tidak ada data.</td>
                            </tr>
                        @endforelse
                    </tbody> --}}
                </table>
                <div class="mt-3">
                    {{-- {{ $pekerjaans->links() }} --}}
                </div>
            </div>
        </div>
    </main>


</div>
</x-dashboard.app>
