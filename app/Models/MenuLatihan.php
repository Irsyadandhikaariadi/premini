<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuLatihan extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_menu';
    protected $table = 'menuLatihan';
    protected $fillable = [
        'nama',
        'video_url'
    ];

}
