<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users'; 

    protected $fillable = ['name', 'password'];

    protected $hidden = ['password'];
    public $timestamps = false;
}
