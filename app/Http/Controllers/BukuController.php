<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index() {
        $buku = Buku::all();

        return view('buku', [
            'bukus' => $buku
        ]);
    }

    public function show(Buku $buku) {
        return view('buku-detail', [
            'buku' => $buku
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'judu' => 'required|string',
            'author' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah_salinan' => 'required|numeric'
        ]);

        $buku = Buku::create($data);

        if ($buku) {
            return redirect()->back()->with('status', 'success');
        }

        return redirect()->back()->with('status', 'failed');
    }

    public function update(Buku $buku, Request $request) {
        $data = $request->validate([
            'judu' => 'required|string',
            'author' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|date',
            'isbn' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah_salinan' => 'required|numeric'
        ]);

        $buku->update($data);

        return redirect()->back()->with('status', 'success');
    }

    public function destroy(Buku $buku) {
        $buku->delete();

        return redirect()->back()->with('status', 'success');
    }
}
