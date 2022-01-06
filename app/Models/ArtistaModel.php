<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ArtistaModel extends Model {
    use HasFactory;
    protected $table = 'artista';
    protected $fillable = [
        'nombre',
        'imagen', 
        'descripcion'
    ];
    
}
