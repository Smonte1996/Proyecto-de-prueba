<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // se agrega los datos de se va enviar a la base 
    use HasFactory;
    protected $fillable = [
      'tirulo',
      'descripcion',
      'imagen',
      'user_id'
    ];

    //se crea la relacion de con post y user se selecciona lo que se va llamar.
    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }
//se crea la relacion  del comentario en el post
    public function comentario()
    {
      return $this->hasMany(Comentario::class);
    }
    //crea la relacion para poder registar los likes 
    public function likes()
    {
      return $this->hasMany(Like::class);
    }

    public function checklike(User $user)
    {
       return $this->likes->contains('user_id', $user->id);
    }
}
