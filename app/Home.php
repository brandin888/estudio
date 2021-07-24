<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';
    protected $fillable = ['title', 'slug', 'description', 'featured_image'];
protected $guarded = [];
}
