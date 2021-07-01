<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coworker extends Model
{
    protected $fillable = [
        'name', 'rol', 'password','twitter','linkedin','instagram',
    ];
}
