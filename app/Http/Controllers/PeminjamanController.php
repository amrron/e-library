<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index() {
        $peminjamans = Peminjaman::all();

        return view('peminjaman', [
            'peminjamans' => $peminjamans
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'buku_id' => 'required|string|exists:bukus,id',
            'user_id' => 'required|string|exists:users,id',
        ]);

        $data['tanggal_peminjaman'] = Carbon::now();
        $data['tenggat_pengembalian'] = Carbon::now()->addDays(7);

        $peminjaman = Peminjaman::create($data);

        if ($peminjaman) {
            return back()->with('status', 'success');
        }

        return back()->with('status', 'failed');
    }

    public function returnBook(Buku $buku) {
        $buku->update([
            'tanggal_pengembalian' => Carbon::now()
        ]);

        return back()->with('status', 'success');
    }
}
