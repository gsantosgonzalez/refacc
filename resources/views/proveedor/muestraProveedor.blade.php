@extends('layouts.app')

@section('estilos')
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		.formulario{
			background-color: #d9d9d9;
			margin: auto 20%;
			padding: 3.3%;
			position: absolute; 
			width:60%;
		}

		p{
			font-size: 1.5em;
			height: 30%;
			padding: 5px;
			text-transform: uppercase;
		}
	</style>
@endsection

@section('content')

	<div class="formulario">
		<p class = "bg-primary">{{ $proveedor->nombre }}</p>
		<p class = "bg-primary">{{ $proveedor->direccion }}</p>
		<p class = "bg-primary">{{ $proveedor->telefono }}</p>
	</div>

@endsection