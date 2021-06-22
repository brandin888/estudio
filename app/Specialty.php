<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
      'name', 'seo_title', 'description',  'image',
      'slug', 'meta_description', 'created_at','updated_at'
  	];

}
