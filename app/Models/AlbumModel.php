<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model {
    use HasFactory;
    protected $table = 'album';
    protected $fillable = [
        'titulo',
        'fecha_lanzamiento', 
        'duracion',
        'imagen',
        'artista_id'
    ];
}
