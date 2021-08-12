<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fornecedor extends Model
{
    protected $fillable = ['nome,contacto,email,descricao,endereco'];
}
