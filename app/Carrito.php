<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';

    protected $fillable = ['id', 'nombre', 'cantidad', 'precio', 'total', 'id_venta'];

    public function articulo()
    {
    	return $this->hasMany('App\Articulo', 'id');
    }

    public function venta()
    {
    	return $this->belongsTo('App\Venta', 'id_venta');
    }
}
