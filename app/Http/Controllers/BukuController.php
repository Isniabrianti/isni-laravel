<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    //fungsi untuk menampilkan data buku    
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    //fungsi untuk membuat buku baru
    public function create()
    {
    $buku = Buku::all();
    return view('buku.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'JudulBuku' => 'required',
            'JenisBuku' => 'required',
            'Penulis' => 'required',
            'Episode' => 'required|numeric',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    //fungsi untuk edit data buku
    public function edit($idbuku)
    {
    $buku = Buku::findOrFail($idbuku);
    return view('buku.edit', compact('buku'));
    }

    //from untuk edit data buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'JudulBuku' => 'required',
            'JenisBuku' => 'required',
            'Penulis' => 'required',
            'Episode' => 'required|numeric',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')
                         ->with('success', 'Buku berhasil diupdate.');
    }

    //fungsi untuk menghapus data buku
    public function destroy($idbuku)
    {
    $buku = Buku::find($idbuku);
    
    if ($buku) {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus.');
    }

    return redirect()->route('buku.index')->with('error', 'Data buku tidak ditemukan.');
    }
}