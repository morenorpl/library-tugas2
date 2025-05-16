@extends('layouts.app')

@section('content')

<!-- Main Content -->
<main class="flex-1 overflow-y-auto p-6 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6 flex justify-between items-center">
            <a href="{{ url()->previous() }}" class="flex items-center text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>
                Back
            </a>
            <div class="flex space-x-3">
                <a href="{{ route('books.edit', $book->id) }}" class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                    @csrf
                    @method('DELETE')
                    <button class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                    </form>
                
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:flex-shrink-0 p-6">
                @if ($book->cover)
                    <img class="h-64 w-full object-cover md:w-48 rounded-md" src="{{ asset('storage/covers/' . $book->cover) }}" alt="cover {{ $book->nama_buku }}">
                @else
                    <p>No cover Available.</p>
                @endif    
                </div>
                <div class="p-8 w-full">
                    <div class="uppercase tracking-wide text-sm text-blue-500 font-semibold">{{ $book->kategori }}</div>
                    <h1 class="mt-1 text-2xl font-bold text-gray-900">{{ $book->nama_buku }}</h1>
                    <p class="mt-2 text-gray-600 capitalize">Written by : {{ $book->penulis }}</p>
                    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Publisher</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $book->penerbit }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Page Count</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $book->jumlah_halaman }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Year Published</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $book->tahun_terbit }}</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Book ID</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $book->id }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-8 pb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Description</h3>
                <p class="text-gray-700">
                    {{ $book->deskripsi }}
                </p>
                <div class="mt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Informasi Tambahan</h3>
                    <div class="bg-gray-50 p-4 rounded-md">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Status</h4>
                                <p class="mt-1 text-sm text-green-600 font-medium">Tersedia</p>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Lokasi Rak</h4>
                                <p class="mt-1 text-sm text-gray-900">A-12</p>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Jumlah Stok</h4>
                                <p class="mt-1 text-sm text-gray-900">15</p>
                            </div>
                            <div>
                                <h4 class="text-sm font-medium text-gray-500">Jumlah Dipinjam</h4>
                                <p class="mt-1 text-sm text-gray-900">8</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Riwayat Peminjaman</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Peminjam</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">John Doe</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Apr 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">19 Apr 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Dikembalikan</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Jane Smith</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5 Mei 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Mei 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Dikembalikan</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Robert Johnson</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20 Mei 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">27 Mei 2023</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Dipinjam</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection