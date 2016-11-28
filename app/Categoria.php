<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    protected $fillable = ['nombre'];

    public function articulo()
    {
		return $this->hasMany('App\Articulo', 'id_categoria');
    }
}
