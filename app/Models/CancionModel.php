<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancionModel extends Model{
    use HasFactory;
    protected $table = 'cancion';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo',
        'duracion',
        'lyrics',
        'audio',
        'visitas',
        'like',
        'album_id'
    ];
    protected $with=['album'];
    public function album(){
        return $this->hasOne(AlbumModel::class,'id');
        
    }
}
