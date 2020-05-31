<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'Usuario';
    protected $fillable=['id','nombre','apellidoP','apellidoM', 'userName', 'passwd', 'email', 'tipo'];
}
