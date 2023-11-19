<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    protected $table = 'kehadiran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'tanggal',
        'hadir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
