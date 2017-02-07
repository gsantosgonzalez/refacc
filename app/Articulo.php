<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';

    protected $fillable = [
    	'clave', 'nombre', 'id_categoria', 'cantidad', 'stock', 'precio', 'marca', 'imagen'];

    public function categoria()
    {
    	return $this->belongsTo('App\Categoria', 'id_categoria');
    }

    public function modelo()
    {
    	return $this->belongsToMany('App\Modelo', 'compatibilidad', 'id_articulo', 'id_modelo')->withPivot('detalle');
    }

    public function venta()
    {
    	return $this->belongsToMany('App\Venta', 'venta_articulo', 'id_articulo', 'id_venta')->withPivot('cantidad');
    }

    public function compra()
    {
    	return $this->belongsToMany('App\Compra', 'compra_articulo', 'id_articulo', 'id_compra');
    }

    public function carrito()
    {
        return $this->belongsTo('App\Carrito', 'id_articulo');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'like', "%$nombre%?");
    }

}
