@extends('layouts.app')

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
	<section class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nueva Notificación</h3>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'notificacion.store']) !!}

				<div class="form-group">
					{!! Form::label('titulo', 'Título', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('titulo', null, ['placeholder' => 'Título de la Notificación, mensaje o aviso', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('tipo', 'Tipo', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::select('tipo', ['AVISO' => 'AVISO', 'RECORDATORIO' => 'RECORDATORIO', 'MENSAJE' => 'MENSAJE'], null,  ['placeholder' => 'Elige el tipo de notificación', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('contenido', 'Contenido', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::textarea('contenido', null, ['placeholder' => 'Contenido del mensaje, aviso o notifiacion', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('fecha', 'Fecha', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('fecha_limite', null, [
												'placeholder' => 'Fecha límite', 
												'class' => 'form-control',
												'id' => 'datepicker',
												'required']) !!}
					</div>
				</div>
				<div class="col-sm-8"></div>
				<div class="form-group">
					<div class="col-sm-2 pull-right">
						{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
					</div>
					<div class="col-sm-2">						
						<a href="{{ url('/notificacion') }}" class = "btn btn-primary">Cancelar</a>
					</div>
				</div>

			{!! Form::close() !!}
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>

	</section>

@endsection