@extends('layouts.app')

@section('content')

	@include('venta.imprimir')
				<nav aria-label="...">
					<ul class="pager">
						<li><a href="{{ route('imprimir', $venta->id) }}">Imprimir</a></li>
						<li><a href="{{ url('/venta') }}">Regresar</a></li>
					</ul>
				</nav>

@endsection
