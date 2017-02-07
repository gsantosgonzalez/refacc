@extends('layouts.app')

@section('content')
	
	@include('compra.imprimir')
				<nav aria-label="...">
					<ul class="pager">
						<li><a href="{{ route('imprimir', $compra->id) }}">Imprimir</a></li>
						<li><a href="/venta">Regresar</a></li>
					</ul>
				</nav>

@endsection
