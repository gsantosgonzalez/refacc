<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Laracasts\Flash\Flash;
use App\Http\Requests\ArticuloRequest;
use App\Articulo;

class ArticuloController extends Controller
{
    /**
     * Muestra la lista de Artículos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articulos = Articulo::where('nombre', 'like', '%'.$request->nombre.'%')
                                ->where('status', '=', 'activo')
                                ->orderBy('id', 'ASC')
                                ->paginate(5);
        return view('articulo.articulos')->with('articulos', $articulos);
    }

    /**
     * Muestra la vista para crear un nuevo Artículo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.nuevoArticulo');
    }

    /**
     * Guarda el Artículo recientemente creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticuloRequest $request)
    {
        if($request->file('imagen'))
        {
            //Obtenemos la imagen del formulario
            $imagen = $request->file('imagen');
            //Generamos un nombre único
            $nombre = $request->clave.'_img.'.$imagen->getClientOriginalExtension();
            $ruta = 'imagen\articulo\\';
            //Guardamos la imagen
            $imagen->move($ruta, $nombre);
        }

        $articulo = new Articulo($request->all());
        $articulo->imagen = $nombre;
        $articulo->save();

        return redirect('articulo/'.$articulo->id);
        
    }

    /**
     * Muestra un Artículo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articulo = Articulo::find($id);
        return view('articulo.muestraArticulo')->with('articulo', $articulo);
    }

    /**
     * Muestra el formulario para editar un Artículo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('articulo.editaArticulo')->with('articulo', Articulo::find($id));
    }

    /**
     * Actualiza el Artículo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticuloRequest $request, $id)
    {
        $articulo = Articulo::find($id);
        $articulo->clave = $request->clave;
        $articulo->nombre = $request->nombre;
        $articulo->id_categoria = $request->id_categoria;
        $articulo->cantidad = $request->cantidad;
        $articulo->stock = $request->stock;
        $articulo->precio = $request->precio;
        $articulo->marca = $request->marca;
        if($request->file('imagen'))
        {
            //Obtenemos la imagen del formulario
            $imagen = $request->file('imagen');
            //Generamos un nombre único
            $nombre = $request->clave.'_img.'.$imagen->getClientOriginalExtension();
            $ruta = 'imagen\articulo\\';
            //Guardamos la imagen
            $imagen->move($ruta, $nombre);
            $articulo->imagen = $nombre;
        }
        $articulo->save();
        
        return redirect('articulo/'.$articulo->id);
    }

    /**
     * Borra el Artículo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        DB::table('articulo')
            ->where('id', $id)
            ->update(['status' => 'inactivo']);

        Flash::error('Se ha eliminado al articulo: ' . $articulo->nombre);

        return redirect('articulo');
    }
}
