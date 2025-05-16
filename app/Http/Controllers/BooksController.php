<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Books;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1800|max:2099',
            'jumlah_halaman' => 'required|integer|min:1',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);
        
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('covers', $fileName, 'public');
            $validated['cover'] = $filePath;
        }
        
        Books::create($validated);
        
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Books::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Books::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {
        $validated = $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1800|max:2099',
            'jumlah_halaman' => 'required|integer|min:1',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:10240',
        ]);

        $book->nama_buku = $request->nama_buku;
        $book->penulis = $request->penulis;
        $book->penerbit = $request->penerbit;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->jumlah_halaman = $request->jumlah_halaman;
        $book->deskripsi = $request->deskripsi;
        $book->kategori = $request->kategori;
        
        if ($request->hasFile('cover')) {
            // Only access the file now
            $file = $request->file('cover');
        
            // Delete old cover if it exists
            if ($book->cover && Storage::disk('public')->exists('covers/' . $book->cover)) {
                Storage::disk('public')->delete('covers/' . $book->cover);
            }
        
            // Store new cover
            $extension = $file->getClientOriginalExtension();
            $filename = 'cover' . time() . '.' . $extension;
            $file->storeAs('covers', $filename, 'public');
        
            // Save filename
            $book->cover = $filename;
        }
        
        
        $book->save();
        
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        if ($book->cover &&Storage::disk('public')->exists('covers/' . $book->cover)){
            Storage::disk('public')->delete('covers/' . $book->cover);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted succesfully.');
    }
}
