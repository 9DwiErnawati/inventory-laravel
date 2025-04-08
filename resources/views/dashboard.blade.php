<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Total Kategori -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700">Total Kategori</h3>
                <p class="text-2xl mt-2 text-blue-600">{{ $totalKategori }}</p>
            </div>

            <!-- Total Barang -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700">Total Barang</h3>
                <p class="text-2xl mt-2 text-green-600">{{ $totalBarang }}</p>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>





