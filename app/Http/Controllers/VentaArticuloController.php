<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\VentaRequest;
use App\Articulo;

use Laracasts\Flash\Flash;

class VentaArticuloController extends Controller
{
    static $articulos;
    static $contador = 0;

    public function __construct()
    {
        $articulos = [];
        $contador = 0;
    }

    public function index(Request $request)
    {
    	$articulos = Articulo::where('nombre', 'like', '%'.$request->nombre.'%')
                                ->orderBy('id', 'DESC')
                                ->paginate(5);
        return view('venta.nuevaVenta')->with('articulos', $articulos);
    }

    public function add(VentaRequest $request)
    {
        $term = explode('|', $request->term);

        $nombre = $term[0];
        $tamano = $term[1];
        $marca = $term[2];
        $cantidad = $request->cantidad;

        $articulo = Articulo::where('nombre', 'LIKE', '%'.$nombre.'%')
            ->where('tamano', 'LIKE', '%'.$tamano.'%')
            ->where('marca',  'LIKE', '%'.$marca.'%')
            ->get();
        $articulos = [];
        foreach($articulo as $art)
        {
            if($art->cantidad >= $cantidad)
            {
                $articulos[] = ['id'       => $art->id,
                                'nombre'   => $art->nombre. ' ' . $art->tamano. ' ' . $art->marca,
                                'cantidad' => $cantidad,
                                'precio'   => $art->precio,
                                'total'    => ($art->precio*$cantidad)];
            }
            else
            {
                Flash::error('No hay suficientes piezas, solo quedan: ' . $art->cantidad . ' piezas');

                return redirect('venta/create');
            }
        }
        return redirect('venta/create');
    }

    public function eliminar(Request $request)
    {
        $id = $request->id;
        $articulo = Articulo::find($id);

    }
}
