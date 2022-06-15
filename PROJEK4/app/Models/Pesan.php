<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pesan extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $fillable = [
        'id_percakapan',
        'id_user',
        'isi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
