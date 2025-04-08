<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Kategori</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- ALERT SUKSES --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            {{-- TOMBOL TAMBAH & FORM SEARCH --}}
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <a href="{{ route('kategori.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-semibold">
                    + Tambah Kategori
                </a>

                <form action="{{ route('kategori.index') }}" method="GET" class="flex">
                    <input type="text" name="search" placeholder="Cari kategori..." value="{{ request('search') }}"
                           class="border border-gray-300 rounded-l px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="bg-gray-800 text-white px-4 rounded-r hover:bg-gray-700">
                        Cari
                    </button>
                </form>
            </div>

            {{-- TABEL KATEGORI --}}
            <div class="bg-white overflow-x-auto shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100 text-gray-700 text-left">
                        <tr>
                            <th class="px-6 py-3">Nama Kategori</th>
                            <th class="px-6 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($kategori as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $item->nama }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">
                                        <a href="{{ route('kategori.edit', $item->id) }}"
                                           class="text-indigo-600 hover:text-indigo-800 inline-flex items-center space-x-1">
                                            <span>✏️</span><span>Edit</span>
                                        </a>
                                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-800 inline-flex items-center space-x-1">
                                                <span>🗑️</span><span>Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-4 text-center text-gray-500 italic">
                                    Tidak ada kategori ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div>
                {{ $kategori->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
