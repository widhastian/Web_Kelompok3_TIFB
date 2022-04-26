<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $fillable = [
        'foto',
        'video',
        'deskripsi',
        'id_user',
        'id_kategori'
    ];
    public function katFK()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
    public function userFK()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
