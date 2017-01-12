@extends('layouts.app')
@section('estilos')
	<link rel="stylesheet" href="{{ asset('jquery\jqueryui\jquery-ui.css') }}">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

@endsection
@section('content')
	
	<div class="container">
		<div class="jumbotron">
			<table class="table table-bordered">
				<tr>
					<td><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></td>
					<td>{{ $venta->id }}</td>
					<td>{{ $venta->fecha }}</td>
					<td>${{ $venta->total }}</td>
					<td>{{ $venta->cliente->nombre }}</td>
				</tr>
			</table>
		</div>
	</div>

@endsection
