<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';

    protected $fillable = [
    	'clave', 'nombre', 'id_categoria', 'cantidad', 'stock', 'precio', 'marca'
    ];

    public function categoria(){
    	return $this->belongsTo('App\Categoria', 'id_categoria');
    }

    public function modelo()
    {
    	return $this->belongsToMany('App\Modelo', 'compatibilidad', 'id_articulo', 'id_modelo');
    }

    public function venta()
    {
    	return $this->belongsToMany('App\Venta', 'venta_articulo', 'id_articulo', 'id_venta');
    }

    public function compra()
    {
    	return $this->belongsToMany('App\Compra', 'compra_articulo', 'id_articulo', 'id_compra');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'like', "%$nombre%?");
    }
}
