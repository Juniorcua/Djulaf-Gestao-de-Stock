<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class distrito extends Model
{
    protected $fillable = [
        'nome', 'provinciaId','estado'
    ];
}
