<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsReturnedAttribute(){
        return $this->tanggal_pengembalian !== null;
    }

    public function scopeDipinjam() {
        return $this->whereNull('tanggal_pengembalian');
    }

    public function scopeDikembalikan() {
        return $this->whereNotNull('tanggal_pengembalian');
    }

    public function getKeteranganAttribute()
    {
        $tenggatPengembalian = Carbon::parse($this->tenggat_pengembalian);
        $tanggalPengembalian = $this->tanggal_pengembalian ? Carbon::parse($this->tanggal_pengembalian) : null;

        if ($tanggalPengembalian) {
            $selisih = $tanggalPengembalian->diff($tenggatPengembalian);
            
            $hari = $selisih->d;
            $jam = $selisih->h;
            $menit = $selisih->i;

            if ($tanggalPengembalian->greaterThan($tenggatPengembalian)) {
                return "Telat {$hari} hari {$jam} jam {$menit} menit";
            } elseif ($tanggalPengembalian->lessThan($tenggatPengembalian)) {
                return "Lebih cepat {$hari} hari {$jam} jam {$menit} menit";
            } else {
                return "Dikembalikan tepat waktu";
            }
        } else {
            return "Buku belum dikembalikan";
        }
    }
}
