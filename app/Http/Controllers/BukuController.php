<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request) {
        $buku = Buku::filter(request(['search', 'kategori']))->get();
        $kategoris = Kategori::all();

        return view('buku', [
            'bukus' => $buku,
            'kategoris' => $kategoris
        ]);
    }

    public function show(Buku $buku) {
        return view('buku-detail', [
            'buku' => $buku
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'judul' => 'required|string',
            'author' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|numeric',
            'isbn' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah_salinan' => 'required|numeric',
            'cover' => 'required|mimes:jpg,jpeg,png|max:10000',
        ]);

        if($request->file('cover')){
            $data['cover'] = env('APP_URL') . "/storage/" . $request->file('cover')->store('cover');
        }

        $buku = Buku::create($data);

        if ($buku) {
            return back()->with('status', 'success');
        }

        // return back()->with('status', 'failed');
    }

    public function update(Buku $buku, Request $request) {
        $data = $request->validate([
            'judu' => 'required|string',
            'author' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'jumlah_salinan' => 'required|numeric'
        ]);

        $buku->update($data);

        return back()->with('status', 'success');
    }

    public function destroy(Buku $buku) {
        $buku->delete();

        return back()->with('status', 'success');
    }
}
