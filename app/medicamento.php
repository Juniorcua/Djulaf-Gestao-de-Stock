<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicamento extends Model
{
    protected $fillable = [
        'nome','categoriaId','foto'
];
}
