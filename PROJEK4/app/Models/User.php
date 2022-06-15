<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'foto',
        'id_level',
        'id_kecamatan',
        'id_desa',
    ];

    public function kecFK()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function getAkun($id)
    {
        $us = DB::table('users')
            ->join(
                'kecamatan',
                'users.id_kecamatan',
                '=',
                'kecamatan.id'
            )
            ->join(
                'desa',
                'users.id_desa',
                '=',
                'desa.id'
            )
            ->select(
                'users.*',
                'kecamatan.nama_kecamatan',
                'desa.nama_desa'
            )
            ->where('users.id', '=', $id)
            ->get();
        // if ternary => kondisi ? benar : salah
        $data = (!empty($us[0])) ? $us : '0';

        return $data;
    }

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
