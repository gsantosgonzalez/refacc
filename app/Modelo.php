<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'modelo';

    protected $fillable = [
    	'modelo', 'marca', 'detalles'
    ];

    public function articulo()
    {
    	return $this->belongsToMany('App\Articulo', 'compatibilidad', 'id_modelo', 'id_articulo');
    }
}
