<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    // se agrega los datos de se va enviar a la base
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'comentario'
      ];
//se crea la relacion de user en le comentario para visualizar la coemntario.
     public function user()
     {
    return $this->belongsTo(User::class);
     }
}
