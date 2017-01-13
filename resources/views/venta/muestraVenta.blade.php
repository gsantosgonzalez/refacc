@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="jumbotron">
	@include('venta.imprimir')
				<nav aria-label="...">
					<ul class="pager">
						<li><a href="{{ route('imprimir', $venta->id) }}">Imprimir</a></li>
						<li><a href="/venta">Regresar</a></li>
					</ul>
				</nav>

@endsection
