<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Venta;

class ImpresionController extends Controller
{
    public function index($id)
    {
        $venta = Venta::find($id);
        $pdf = PDF::loadView('venta.imprimir', ['venta' => $venta])->save(public_path().'\pdf\Venta-'.$id.'.pdf');
		return $pdf->download(public_path().'\pdf\Venta-'.$id.'.pdf');
    }
}
