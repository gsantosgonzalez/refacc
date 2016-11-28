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
			<h1>Edita Cliente {{$cliente->nombre}}</h1>

			{!! Form::open(['route' => ['cliente.update', $cliente], 'method' => 'PUT']) !!}

				<div class="form-group">
					{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('nombre', $cliente->nombre, ['placeholder' => 'Juan Perez', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<hr>
				<div class="form-group">
					{!! Form::label('direccion', 'Dirección', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('direccion', $cliente->direccion, ['class' => 'form-control', 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('telefono', 'Teléfono', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-4">
						{!! Form::text('telefono', $cliente->telefono, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" onclick = "return confirm('¿Confirma la actualización?')">Submit</button>
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection