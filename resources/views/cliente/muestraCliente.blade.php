@extends('layouts.app')

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