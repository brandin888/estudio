<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $guarded = [];

    protected $table = 'categories';


    protected $fillable = ['post_id', 'categories_id'];
    public function posts()
    {
        return $this->hasMany('App\Posts');
    }
}
