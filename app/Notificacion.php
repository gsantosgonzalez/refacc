<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificacion';

    protected $fillable = ['titulo', 'tipo', 'contenido', 'fecha_limite'];

    public function getMensajes()
    {
    	return $this->where('tipo', '=', 'MENSAJE')->orderBy('fecha_limite', 'ASC')->get();
    }

    public function getAvisos()
    {
    	return $this->where('tipo', '=', 'AVISO')->get();
    }

    public function getNotificaciones()
    {
    	return $this->where('tipo', '=', 'RECORDATORIO')->get();
    }
   	
}
