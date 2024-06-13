<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $total_judul = Buku::count();
        $total_salinan = Buku::sum('jumlah_salinan');
        $total_peminjaman = Peminjaman::count();

        $buku_dipinjam = Peminjaman::dipinjam()->count();
        $buku_dikembalikan = Peminjaman::dikembalikan()->count();

        $buku_terfavorit = Peminjaman::select('bukus.*', DB::raw('COUNT(peminjamen.id) as jumlah_peminjaman'))
        ->join('bukus', 'peminjamen.buku_id', '=', 'bukus.id')
        ->groupBy('peminjamen.buku_id', 'bukus.id', 'bukus.kategori_id', 'bukus.judul', 'bukus.author', 'bukus.penerbit', 'bukus.tahun_terbit', 'bukus.isbn', 'bukus.jumlah_salinan', 'bukus.cover', 'bukus.created_at', 'bukus.updated_at')
        ->orderByDesc('jumlah_peminjaman')
        ->limit(5)
        ->get();

        $peminjamans = Peminjaman::all();
        
        return view('dashboard', [
            'total_judul' => $total_judul,
            'total_salinan' => $total_salinan,
            'total_peminjaman' => $total_peminjaman,
            'buku_dipinjam' => $buku_dipinjam,
            'buku_dikembalikan' => $buku_dikembalikan,
            'buku_terfavorit' => $buku_terfavorit,
            'peminjamans' => $peminjamans
        ]);
    }
}
