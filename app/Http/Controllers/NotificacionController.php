<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Notificacion;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notificaciones = Notificacion::where('tipo', $request->tipo)->orderBy('fecha_limite', 'ASC')->get();
        return view('notificacion.index')->with('notificaciones', $notificaciones)->with('titulo', $request->tipo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notificacion.nuevaNotificacion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'tipo' => 'required',
            'contenido' => 'required',
            'fecha_limite' => 'required'
        ]);

        if($request->fecha_limite > date('Y-m-d'))
        {
            $notificacion = new Notificacion($request->all());
            $notificacion->save();

            return redirect('notificacion/'.$notificacion->id);
        }

        return redirect('notificacion/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('notificacion.muestraNotificacion');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('notificacion.editaNotificacion');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function vaciar()
    {
        DB::table('notificacion')->truncate();
        return redirect('notificacion');
    }
}
