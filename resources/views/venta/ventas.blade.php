@extends('layouts.app')

@section('content')
	<div class= "container">
		<div class="jumbotron">
			<a href="{{ route('venta.create') }}" class = "btn btn-info">Nueva Venta</a>
	        <br>
	        <br>
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
	                        <td><a href="venta/{{$venta->id}}">{{ $venta->id }}</a></td>
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
			<div>
		</div>
	</div>
@endsection
