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
			<h1>Edita Proveedor: {{$proveedor->nombre}}</h1>

			{!! Form::open(['route' => ['proveedor.update', $proveedor], 'method' => 'PUT']) !!}

				<div class="form-group">
					{!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('nombre', $proveedor->nombre, ['placeholder' => 'Juan Perez', 'class' => 'form-control', 'required']) !!}
					</div>
				</div>
				<hr>
				<div class="form-group">
					{!! Form::label('direccion', 'Dirección', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-10">
						{!! Form::text('direccion', $proveedor->direccion, ['class' => 'form-control', 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('telefono', 'Teléfono', ['class' => 'col-sm-2 control-label']) !!}
					<div class="col-sm-4">
						{!! Form::text('telefono', $proveedor->telefono, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" onclick = "return confirm('¿Confirma la actualización?')">Submit</button>
					</div>
				</div>

			{!! Form::close() !!}
		</div>

@endsection