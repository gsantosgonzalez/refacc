<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compra';

    protected $fillable = [
    	'fecha', 'total', 'id_proveedor'
    ];

    public function proveedor()
    {
    	return $this->belongsTo('App\Proveedor', 'id_proveedor');
    }

    public function articulo()
    {
    	return $this->belongsToMany('App\Articulo', 'compra_articulo', 'id_compra', 'id_articulo');
    }
}
