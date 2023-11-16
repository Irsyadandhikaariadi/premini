<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'latihan';
    
    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
        'gambar',
    ];

}
