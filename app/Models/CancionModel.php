<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancionModel extends Model{
    use HasFactory;
    protected $table = 'cancion';
    protected $fillable = [
        'titulo',
        'duracion',
        'lyrics',
        'album_id'
    ];
}
