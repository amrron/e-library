<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeMember($query) {
        return $query->where('role', 'user');
    }

    public function scopeAdmin($query) {
        return $query->where('role', 'admin');
    }

    public function getJoinDateAttribute() {
        \Carbon\Carbon::setLocale('id');

        return \Carbon\Carbon::parse($this->created_at)->translatedFormat('j F Y');
    }

    public function getIs_adminAttribute() {
        return $this->role == 'admin';
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Menghasilkan angka acak dengan panjang 7 digit
            $randomNumber = str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);

            if ($user->role == 'admin') {
                $user->member_id = 'ADM' . $randomNumber;
            } else {
                $user->member_id = 'MBR' . $randomNumber;
            }

            // Pastikan member_id unik
            while (DB::table('users')->where('member_id', $user->member_id)->exists()) {
                $randomNumber = str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);
                if ($user->role == 'admin') {
                    $user->member_id = 'ADM' . $randomNumber;
                } else {
                    $user->member_id = 'MBR' . $randomNumber;
                }
            }
        });
    }
}
