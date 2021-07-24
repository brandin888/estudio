<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';
    protected $fillable = ['feature-title1', 'slug', 'description', 'featured_image'];
protected $guarded = [];
}
