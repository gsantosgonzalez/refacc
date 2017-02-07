@extends('layouts.app')

@section('content')
			<h3>Ventas del día</h3>
			<hr>
			<a href="{{ route('venta.create') }}" class = "btn btn-info">Nueva Venta</a>
	        <br>
	        <br>
	        @if(count($ventas) > 0)
			<div class = "table-responsive">
	            <table class="table table-bordered">
	                <thead>
	                    <th>ID</th>
	                    <th>Fecha</th>
	                    <th>Total</th>
	                    <th>Cliente</th>
	                </thead>
	                <tbody>
	                    @foreach($ventas as $venta)
	                    <tr>
	                        <td align = "center">
	                        	<a style="display:block;" href="venta/{{$venta->id}}">{{ $venta->id }}</a>
	                        </td>
	                        <td>{{ $venta->fecha }}</td>
	                        <td>{{ $venta->total }}</td>
	                        <td>{{ $venta->cliente->nombre }}</td>                  
	                    </tr>
	                    @endforeach
	                </tbody>
	            </table>
	            <div class="text-center">
	                {!! $ventas->render() !!}
	            </div>
			</div>
			@else
				<p class="bg-default">No hay ventas del día</p>
			@endif
		
@endsection
