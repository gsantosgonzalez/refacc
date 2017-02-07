@extends('layouts.app')

@section('content')
	<h3>Compras del día</h3>
	<hr>
	<a href="{{ route('compra.create') }}" class = "btn btn-info">Capturar Compra</a>
    <br>
    <br>
    @if(count($compras) > 0)
		<div class = "table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Cliente</th>
                </thead>
                <tbody>
                    @foreach($compras as $compra)
                    <tr>
                        <td align = "center">
                        	<a style="display:block;" href="venta/{{$compra->id}}">{{ $compra->id }}</a>
                        </td>
                        <td>{{ $compra->fecha }}</td>
                        <td>{{ $compra->total }}</td>
                        <td>{{ $compra->cliente->nombre }}</td>                  
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $compras->render() !!}
            </div>
		</div>
		@endif

@endsection
