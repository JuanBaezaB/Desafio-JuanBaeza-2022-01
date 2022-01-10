<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancionArtistaModel extends Model{
    use HasFactory;
    protected $table = 'cancion_artista';
    protected $primaryKey = 'cancion_id';
    protected $fillable = [
        'cancion_id',
        'artista_id'
    ];
}
