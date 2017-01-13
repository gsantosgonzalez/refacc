@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="jumbotron">
            <h1 class="title" align = "center">Maldonado</h1>
            @if(isset($totalVentasHoy))
            	<a href ="{{URL('/venta')}}" role = "button"><p class="bg-primary pull-right">Total de Ventas de Hoy: {{ $totalVentasHoy }}</p></a>
            @endif
        </div>
    </div>
@endsection