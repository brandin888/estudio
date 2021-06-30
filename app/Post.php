<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title', 'seo_title', 'excerpt', 'body', 'image',
      'slug', 'meta_description', 'status', 'featured', 'created_at','updated_at'
  ];
    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }
}
