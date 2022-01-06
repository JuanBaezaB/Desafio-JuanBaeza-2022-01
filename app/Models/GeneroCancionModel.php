<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneroCancionModel extends Model{
    use HasFactory;
    protected $table = 'genero_cancion';
    protected $fillable = [
        'cancion_id',
        'genero_id',
    ];
}
