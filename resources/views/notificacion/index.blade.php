@extends('layouts.app')

@section('content')

	<section class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Notificaciones</h3>
				</div>
				<div class="panel-body">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="row">
							<a href="{{ url('notificacion/create') }}" class = "btn btn-primary">Agregar</a>
						</div>
					</div>
					<div class="col-md-1"></div>
					<!--Buscador-->
					<div>
						{!! Form::open(['route' => 'notificacion.index', 'method' => 'GET', 'class' => 'form-inline']) !!}
			                <div class = "form-group">
				                <label for = "tipo">Mostrar</label>
								{!! Form::select('tipo', [ 'AVISO' => 'AVISO', 'RECORDATORIO' => 'RECORDATORIO', 'MENSAJE' => 'MENSAJE'], null,  ['placeholder' => 'Elige el tipo de notificación', 'class' => 'form-control', 'required']) !!}
							</div>
								{!! Form::submit('Enlistar',  ['class' => 'btn btn-primary']) !!}
			            {!! Form::close() !!}
					</div>
		            <!--Fin del buscador-->
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</section>
	<section class = "row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			@if(isset($notificaciones))
				@if(count($notificaciones)>0)
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">{!! $titulo !!}</h3>
						</div>
						<div class="panel-body">
							<table class="table table-responsive">
								<thead>
									<tr>
										<th>ID</th>
										<th>Título</th>
										<th>Contenido</th>
										<th>Fecha Límite</th>
									</tr>
								</thead>
								<tbody>
									@foreach($notificaciones as $notificacion)
									<tr>
										<td>{{ $notificacion->titulo }}</td>
										<td>{{ $notificacion->tipo }}</td>
										<td>{{ $notificacion->contenido }}</td>
										<td>{{ $notificacion->fecha_limite }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				@endif
			@endif
		</div>
		<div class="col-md-2"></div>
	</section>	
@endsection