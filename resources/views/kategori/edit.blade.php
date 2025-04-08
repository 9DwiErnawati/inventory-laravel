@extends('layouts.app')

@section('content')
<div 
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    class="max-w-xl mx-auto bg-white p-6 sm:p-8 rounded-xl shadow-md mt-10"
>
    <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Edit Kategori</h2>

    {{-- Flash --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="nama" class="block text-sm font-semibold text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $kategori->nama) }}" autofocus
                   class="w-full border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('nama')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <button type="submit"
                class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Update
            </button>

            <a href="{{ route('kategori.index') }}"
               class="inline-flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

