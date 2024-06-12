<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index() {
        $peminjamans = Peminjaman::all();
        $users = User::member()->get();
        $books = Buku::all();

        return view('peminjaman', [
            'peminjamans' => $peminjamans,
            'users' => $users,
            'books' => $books,
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

    public function returnBook(Peminjaman $peminjaman) {

        // $peminjaman->tanggal_pengembalian = Carbon::now();
        // $peminjaman->save();

        $peminjaman->update([
            'tanggal_pengembalian' => Carbon::now()
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Buku berhasil dikembalikan'
        ], 201);
    }
}
