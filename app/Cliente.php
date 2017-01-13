<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $fillable = [
    	'nombre', 'direccion', 'telefono'
    ];

    public function venta()
    {
    	return $this->hasMany('App\Venta', 'id_venta');
    }

}
