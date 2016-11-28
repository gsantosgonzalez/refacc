@extends('layouts.app')

@section('estilos')
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.css') }}">
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
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
	<div class="formulario">
		<p class = "bg-primary">{{ $cliente->nombre }}</p>
		<p class = "bg-primary">{{ $cliente->direccion }}</p>
		<p class = "bg-primary">{{ $cliente->telefono }}</p>
	</div>

@endsection