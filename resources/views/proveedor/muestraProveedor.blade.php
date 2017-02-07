@extends('layouts.app')

@section('content')

	<div class="row">
		<p class = "bg-primary">{{ $proveedor->nombre }}</p>
		<p class = "bg-primary">{{ $proveedor->direccion }}</p>
		<p class = "bg-primary">{{ $proveedor->telefono }}</p>
	</div>

@endsection