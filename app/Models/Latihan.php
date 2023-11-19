<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get the user that owns the Latihan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menuLatihan(): BelongsTo
    {
        return $this->belongsTo(menuLatihan::class, 'id_menu');
    }

}
