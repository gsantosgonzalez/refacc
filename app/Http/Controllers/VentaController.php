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
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $hoy = Carbon::now()->format('Y-m-d');
        $ventas = Venta::where('fecha', $hoy)->orderBy('fecha', 'ASC')->paginate(8);
        return view('venta.ventas')
            ->with('ventas', $ventas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_venta = time();
        $clientes = Cliente::pluck('nombre', 'id')->all();
        return view('venta.nuevaVenta')->with('id_venta', $id_venta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cierraVenta($request->id_venta,  $request->id_cliente);

        return redirect('venta/'.$request->numVenta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);
        /*$articulos = [];
        foreach ($venta->articulo as $articulo) {
            $articulos[] = $articulo;
        }*/
        return view('venta.muestraVenta')->with('venta', $venta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect('/');
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
        return view('error\503');
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
                    $query->where('nombre', 'LIKE', '%'.$term.'%')
                    ->where('status', '=', 'activo');
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
        $cantidad = $request->cantidad;
        $id_venta = $request->id_venta;
        $articulo = Articulo::find($request->id_articulo);
        $cart = new Carrito();
        $cart->id_venta = $id_venta;
        $cart->id_articulo = $articulo->id;
        $cart->cantidad = $cantidad;
        $cart->precio = $articulo->precio;
        $cart->total = $articulo->precio*$cantidad;

        if($this->agregaArticulo($cart, $articulo->cantidad))
        {
            $total = DB::table('carrito')->where('id_venta', $id_venta)->sum('total');
            $carritos = Carrito::where('id_venta', $id_venta)->get();
            return view('venta/nuevaVenta')
            ->with('carritos', $carritos)
            ->with('total', $total)
            ->with('id_venta', $id_venta)
            ->with('clientes', Cliente::pluck('nombre', 'id')->all());
        }
        else
        {
            Flash::error('No hay suficientes piezas, solo quedan: ' . $articulo->cantidad . ' piezas de '. $articulo->nombre.', '.$articulo->tamano.', '.$articulo->marca);
            return redirect()->back();
        }
    }

    /**
     * Elimina un articulo de la lista de compra.
     *
     * @param $id   Id del articulo a eliminar
     * @return 
     */
    public function eliminar(Request $request)
    {
        DB::table('carrito')
            ->where('id_venta', '=', $request->id_venta)
            ->where('id_articulo', '=', $request->id_articulo)
            ->delete();
        $total = DB::table('carrito')->where('id_venta', $request->id_venta)->sum('total');
        $carritos = Carrito::all();
        return view('venta/nuevaVenta')
            ->with('carritos', $carritos)
            ->with('total', $total)
            ->with('id_venta', $request->id_venta)
            ->with('clientes', Cliente::pluck('nombre', 'id')->all());
    }

    /**
     * Cierra la venta, guarda la venta y el detalle de esta en la BD.
     *
     * @param  $numVenta    El número siguiente (id) de venta
     * @return 
     */
    protected function cierraVenta($id_venta, $id_cliente)
    {
        $articulos = Carrito::where('id_venta', '=', $id_venta)->get();
        $venta = new Venta();
        $venta->fecha = Carbon::now()->format('Y-m-d');
        $venta->total = DB::table('carrito')->where('id_venta', $id_venta)->sum('total');
        $venta->id_cliente = $id_cliente;
        $venta->save();
        foreach ($articulos as $articulo) {
            $porVender = Articulo::find($articulo->id_articulo);
            $porVender->venta()->attach(Venta::find($venta->id), ['cantidad' => $articulo->cantidad]);
            $porVender->cantidad = $porVender->cantidad - $articulo->cantidad;
            $porVender->save();
        }

        DB::table('carrito')->where('id_venta', '=', $id_venta)->delete();
    }

    /**
     * Cancela la venta, vacia el carrito, para dejarlo listo para otra compra
     *
     * 
     */
    public function cancelaVenta($id_venta)
    {
        DB::table('carrito')->where('id_venta', '=', $id_venta)->delete();

        return redirect('venta');
    }

    /**
     * Verifica si el articulo a agregar no está en la lista, de ser así, 
     * actualiza dicho articulo.
     *
     * @param  \App\Carrito  $carrito
     * 
     */
    protected static function agregaArticulo(Carrito $carrito, $disponibles)
    {
        $porAgregar = Carrito::where('id_venta', $carrito->id_venta)->where('id_articulo', $carrito->id_articulo)->first();
        if(count($porAgregar)>0)
        {
            $porAgregar->cantidad += $carrito->cantidad;
            $porAgregar->total = $porAgregar->cantidad * $porAgregar->precio;
            if($disponibles >= $porAgregar->cantidad)
            {
                $porAgregar->save();
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if($disponibles >= $carrito->cantidad)
            {
                $carrito->save();
                return true;
            }
            else
            {
                return false;
            }
        }
    }

}
