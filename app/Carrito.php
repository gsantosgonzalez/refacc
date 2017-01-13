<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'carrito';

    protected $fillable = ['id_venta', 'id_articulo', 'cantidad', 'precio', 'total'];

    public function articulo()
    {
    	return $this->belongsTo('App\Articulo', 'id_articulo');
    }

}
