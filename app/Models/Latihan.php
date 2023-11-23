<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Latihan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'latihan';

    protected $fillable = [
        'nama',
        'id_menu',
        'jenis',
        'deskripsi',
        'gambar',
    ];

    public function menuLatihan()
    {
        return $this->belongsTo(MenuLatihan::class, 'id_menu');
    }
}
