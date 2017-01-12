@extends('layouts.app')

@section('content')
		
	<div class="content">
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						<img src="{{ asset('imagen/articulo/'.$articulo->imagen) }}" alt="No Imagen" height="350" width="150">
						<div class="caption">
							<h3>{{ $articulo->nombre }}</h3>
							<h5>{{ $articulo->categoria->nombre }}</h5>
							<h5>{{ $articulo->tamano }}. - {{ $articulo->marca }}</h5>
							<h5>{{ $articulo->cantidad }} piezas. - ${{ $articulo->precio }}</h5>
							<p><a href="{{ route('articulo.edit', $articulo->id) }}" class="btn btn-primary" role="button">Editar</a> <a href="{{ route('articulo.index') }}" class="btn btn-default" role="button">Regresar</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection