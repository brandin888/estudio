<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
  protected $fillable = [
      'nombre', 'slug', 'imagen', 'imagen_boleto', 'distrito',
      'direccion', 'telefono', 'latitud', 'longitud', 'iframe'
  ];

 /*  public function boletos()
  {
      return $this->hasMany('App\Boleto');
  }

  public function detalles()
  {
      return $this->hasMany('App\Detalle');
  } */

}
