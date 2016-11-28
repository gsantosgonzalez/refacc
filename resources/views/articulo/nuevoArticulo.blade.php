@extends('layouts.app')

@section('estilos')
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		.formulario{
			background-color: #d9d9d9;
			margin: auto 20%;
			padding: 15px;
			position: absolute; 
			width:60%;
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
	<div class="content">
		<div class = "formulario">
			<h1>Ingresar a Inventario</h1>

			{!! Form::open(['route' => 'articulo.store', 'method' => 'POST', 'files' => true]) !!}

				<div class="form-group">
					{!! Form::label('clave', 'Clave', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('clave', null, ['placeholder' => 'Clave única o número del articulo', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('nombre', null, ['placeholder' => 'Coloca el nombre del artículo', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('cantidad', 'Cantidad', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('cantidad', null, ['placeholder' => 'Número de piezas disponibles en inventario', 'class' => 'form-control', 'required|integer']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('stock', 'Stock', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('stock', null, [
												'placeholder' => 'Mínimo permitido antes de realizar pedido', 
												'class' => 'form-control',
												'required|integer']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio', 'Precio', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('precio', null, [
												'placeholder' => 'Ingrese el precio de venta del producto', 
												'class' => 'form-control', 'required|numeric']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('marca', 'Marca', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('marca', null, [
												'placeholder' => 'Ingrese la marca de la pieza para una mejor clasificación', 
												'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('imagen', 'Imagen', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						<input type="file" name="imagen" >
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection