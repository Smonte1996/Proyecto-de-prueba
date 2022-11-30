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
}
