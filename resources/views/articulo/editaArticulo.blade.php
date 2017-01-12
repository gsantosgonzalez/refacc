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
			<h1>Editar Artículo {{$articulo->nombre}}</h1>

			{!! Form::open(['route' => ['articulo.update', $articulo], 'method' => 'PUT', 'files' => 'true']) !!}

				<div class="form-group">
					{!! Form::label('clave', 'Clave', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('clave', $articulo->clave, ['placeholder' => 'Clave única o número del articulo', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('nombre', $articulo->nombre, ['placeholder' => 'Coloca el nombre del artículo', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('categoria', 'Categoria', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('id_categoria', [
						'1' => 'LIQUIDO', 
						'2' => 'MECANICO',
						'3' => 'ELECTRICO',
						'4' => 'VARIOS'], $articulo->id_categoria, ['placeholder' => 'Selecciona la Categoria...', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('cantidad', 'Cantidad', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('cantidad', $articulo->cantidad, ['placeholder' => 'Número de piezas disponibles en inventario', 'class' => 'form-control', 'required|integer']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('stock', 'Stock', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('stock', $articulo->stock, [
												'placeholder' => 'Mínimo permitido antes de realizar pedido', 
												'class' => 'form-control',
												'required|integer']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('precio', 'Precio', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('precio', $articulo->precio, [
												'placeholder' => 'Ingrese el precio de venta del producto', 
												'class' => 'form-control', 'required|numeric']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('marca', 'Marca', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('marca', $articulo->marca, [
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
					<div class="col-sm-2 col-xs-6 pull-right">
						{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
					</div>
					<div class="col-sm-2 col-xs-6 pull-right">						
						<a href="{{ route('articulo.index') }}" class = "btn btn-primary">Cancelar</a>
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection