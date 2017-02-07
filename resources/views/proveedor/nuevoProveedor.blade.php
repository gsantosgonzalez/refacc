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
		<div class = "row">
			{!! Form::open(['route' => 'proveedor.store']) !!}

				<div class="form-group">
					{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('nombre', null, ['placeholder' => 'Juan Perez', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<hr>
				<div class="form-group">
					{!! Form::label('direccion', 'Dirección', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('direccion', null, ['class' => 'form-control', 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('telefono', 'Teléfono', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-2">
						{!! Form::text('telefono', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
					</div>
				</div>

			{!! Form::close() !!}
		</div>
	
@endsection