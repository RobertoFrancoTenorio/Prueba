<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table = 'User';
    protected $fillable=['id','nombre','apellidoP','apellidoM', 'userName', 'passwd', 'email', 'tipo'];
}
