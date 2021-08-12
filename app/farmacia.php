<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class farmacia extends Model
{
     //
     protected $fillable = [
        'nome', 'contacto','email','endereco','fotoF','fotoP'
        ,'latitute','longitude','provinciaId',
    ];
}
