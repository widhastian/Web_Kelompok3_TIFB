<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pesan;
// use App\Models\Percakapan;
use Illuminate\Support\Facades\DB;

class Percakapan extends Model
{
    use HasFactory;

    protected $table = 'percakapan';
    protected $fillable = [
        'user_satu',
        'user_dua',
    ];

    public function pesan()
    {
        return $this->hasMany(Pesan::class, 'id_percakapan', 'id')->latest();
    }

    public function userSatu()
    {
        return $this->belongsTo(User::class, 'user_satu', 'id');
    }

    public function userDua()
    {
        return $this->belongsTo(User::class, 'user_dua', 'id');
    }

    public function jmlPesan($id)
    {
        $jml = DB::table("pesan")
            ->select(DB::raw("COUNT(*) as jumlah_pesan"))
            ->where('status', 'baru')
            ->where('id_user', $id)
            ->get();

        return $jml;
    }
}
