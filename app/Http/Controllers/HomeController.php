<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Venta;
use App\Articulo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalVentasHoy = $this->totalVentasHoy();
        return view('welcome')->with('totalVentasHoy', $totalVentasHoy);
    }

    public function totalVentasHoy()
    {
        $hoy = Carbon::now()->format('Y-m-d');
        return Venta::where('fecha', $hoy)->sum('total');
    }
}
