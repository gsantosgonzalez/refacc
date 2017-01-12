<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Carbon\Carbon;

use App\Http\Requests\VentaRequest;
use App\Venta;
use App\Carrito;
use App\Articulo;
use App\Cliente;

class VentaController extends Controller
{
    static $porVender = array();
    static $cont = 0;
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $ventas = Venta::orderBy('fecha', 'ASC')->paginate(5);
        return view('venta.ventas')
            ->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request);
        return view('venta.nuevaVenta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Venta($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }

    /**
     * Autocompletador para el campo del artículo a vender.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {   
        if($request->ajax())
        {
            $articulos = Articulo::where(function($query) use ($request){
                if(($term = $request->get('term'))){
                    $query->orWhere('nombre', 'LIKE', '%'.$term.'%');
                }
            })
            ->orderBy('id', 'ASC')
            ->take(5)->get();
            
            $results = [];
            foreach ($articulos as $articulo)
            {
                $results[] = [ 
                    'id' => $articulo->id, 
                    'value' => $articulo->nombre.'|'.$articulo->tamano.'|'.$articulo->marca
                ];
            }
            return response()->json($results);
        }
        else
        {
            return redirect('venta/create');
        }
    }

    /**
     * Agrega un nuevo articulo o actualiza uno existente a la lista de compra.
     *
     * @param  \App\Http\Requests\VentaRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function add(VentaRequest $request)
    {
        $term = explode('|', $request->term);

        $nombre = $term[0];
        $tamano = $term[1];
        $marca = $term[2];
        $cantidad = $request->cantidad;
        $numVenta = DB::table('venta')->count() + 1;
        $articulo = Articulo::where('nombre', 'LIKE', '%'.$nombre.'%')
            ->where('tamano', 'LIKE', '%'.$tamano.'%')
            ->where('marca',  'LIKE', '%'.$marca.'%')
            ->get();
        $cart = new Carrito();
        foreach($articulo as $art)
        {
            if($art->cantidad >= $cantidad)
            {
                $cart->id = $art->id;
                $cart->nombre = $art->nombre.' | '.$art->tamano.' | '.$art->marca;
                $cart->cantidad = $cantidad;
                $cart->precio = $art->precio;
                $cart->total = $art->precio*$cantidad;
                $cart->id_venta = $numVenta;
                $this->agregaArticulo($cart);
            }
            else
            {
                Flash::error('No hay suficientes piezas, solo quedan: ' . $art->cantidad . ' piezas');

                return view('venta/nuevaVenta');
            }
        }
        $total = DB::table('carrito')->where('id_venta', $numVenta)->sum('total');
        $articulos = Carrito::all();
        return view('venta/nuevaVenta')
            ->with('articulos', $articulos)
            ->with('total', $total)
            ->with('numVenta', $numVenta);
    }

    public function eliminar($id)
    {
        DB::table('carrito')->where('id', '=', $id)->delete();
        $numVenta = DB::table('venta')->count() + 1;
        $total = DB::table('carrito')->where('id_venta', $numVenta)->sum('total');
        $articulos = Carrito::all();
        return view('venta/nuevaVenta')
            ->with('articulos', $articulos)
            ->with('total', $total)
            ->with('numVenta', $numVenta);
    }

    public function cierraVenta($numVenta)
    {
        $articulos = Carrito::all();
        $venta = new Venta();
        $venta->id = $numVenta;
        $venta->fecha = Carbon::now()->format('Y-m-d');
        $venta->total = DB::table('carrito')->where('id_venta', $numVenta)->sum('total');
        $venta->save();
        foreach ($articulos as $articulo) {
            $porVender = Articulo::find($articulo->id);
            $porVender->venta()->attach(Venta::find($numVenta), ['cantidad' => $articulo->cantidad]);
            $porVender->cantidad = $porVender->cantidad - $articulo->cantidad;
        }

        DB::table('carrito')->truncate();
        return redirect('venta');
    }

    public function cancelaVenta()
    {
        DB::table('carrito')->truncate();

        return redirect('venta');
    }

    /**
     * Verifica si el articulo a agregar no está en la lista, de ser así, 
     * actualiza dicho articulo.
     *
     * @param  \App\Carrito  $carrito
     * 
     */
    public function agregaArticulo(Carrito $carrito)
    {
        $porAgregar = Carrito::find($carrito->id);
        if($porAgregar === null)
        {
            $carrito->save();
        }
        else
        {
            $porAgregar->cantidad += $carrito->cantidad;
            $porAgregar->save();
        }
    }

}
