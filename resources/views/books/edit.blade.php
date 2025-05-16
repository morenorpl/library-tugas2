@extends('layouts.app')
@section('content')
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">

        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Edit Book: {{ $book->nama_buku }}</h3>
                    <p class="text-sm text-gray-600">Please fill in new informations needed to edit the book in the library.
                    </p>
                </div>

                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <!-- Book Title -->
                        <div class="col-span-2">
                            <label for="nama_buku" class="block text-sm font-medium text-gray-700">Book Title</label>
                            <input type="text" id="nama_buku" name="nama_buku" value="{{ old('nama_buku', $book->nama_buku) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Writer -->
                        <div>
                            <label for="penulis" class="block text-sm font-medium text-gray-700">Writer</label>
                            <input type="text" id="penulis" name="penulis" value="{{ $book->penulis }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Publisher -->
                        <div>
                            <label for="penerbit" class="block text-sm font-medium text-gray-700">Publisher</label>
                            <input type="text" id="penerbit" name="penerbit" value="{{ $book->penerbit }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Publication Year -->
                        <div>
                            <label for="tahun_terbit" class="block text-sm font-medium text-gray-700">Publication
                                Year</label>
                            <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ $book->tahun_terbit }}" min="1800" max="2099"
                                required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Page Count -->
                        <div>
                            <label for="jumlah_halaman" class="block text-sm font-medium text-gray-700">Page Count</label>
                            <input type="number" id="jumlah_halaman" name="jumlah_halaman" value="{{ $book->jumlah_halaman }}" min="1" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="kategori" name="kategori" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Choose Category</option>
                                <option value="fiction" {{ $book->kategori === 'fiction' ? 'selected' : '' }}>Fiction</option>
                                <option value="non-fiction" {{ $book->kategori === 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                                <option value="education" {{ $book->kategori === 'education' ? 'selected' : '' }}>Education</option>
                                <option value="history" {{ $book->kategori === 'history' ? 'selected' : '' }}>History</option>
                                <option value="tech & science" {{ $book->kategori === 'tech % science' ? 'selected' : '' }}>Tech & Science</option>
                                <option value="biography" {{ $book->kategori === 'biography' ? 'selected' : '' }}>Biography</option>
                                <option value="others" {{ $book->kategori === 'others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div class="col-span-2">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="deskripsi" name="deskripsi" rows="4" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm
                            focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ $book->deskripsi }}</textarea>
                        </div>

                        <!-- Book Cover Upload -->
                        <div class="col-span-2">
                            <label for="cover" class="block text-sm font-medium text-gray-700">Book Cover</label>

                            <div class="mt-1 flex justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="flex flex-col items-center space-y-3">
                                    <!-- Image Preview Box -->
                                    <div class="w-32 h-32 bg-gray-100 rounded-md border border-gray-300 flex items-center justify-center overflow-hidden">
                                        <img id="preview" src="#" alt="Preview" class="hidden w-full h-full object-cover" />
                                        <i id="icon-placeholder" class="fa fa-image text-gray-400 text-4xl"></i>
                                    </div>
                            
                                    <!-- Upload Text and Button -->
                                    <div class="flex text-sm text-gray-600 justify-center items-center">
                                        <label for="cover" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Upload file</span>
                                            <input id="cover" name="cover" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                            
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex justify-end space-x-3">
                        <a href="{{ url()->previous() }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md
                        shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md
                        shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Book
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
