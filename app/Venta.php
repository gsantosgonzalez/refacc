<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';

    protected $fillable = [
    	'fecha', 'total', 'pago', 'id_cliente'
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    public function articulo()
    {
    	return $this->belongsToMany('App\Articulo', 'venta_articulo', 'id_venta', 'id_articulo')
            ->withPivot('cantidad');
    }
}
