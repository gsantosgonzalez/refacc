@extends('layouts.app')

@section('content')
		
			<div class="panel panel-default">
				<div class="media center">
					<div class="media-left media-middle">
						<a href="#">
							<img class="media-object" src="{{ asset('imagen/articulo/'.$articulo->imagen) }}" alt="..." height="80" width="80">
						</a>
					</div>
					<div class="media-body">
						<h4 class="media-heading">
							{{ $articulo->nombre }} | {{ $articulo->tamano }} | {{ $articulo->marca }}
							<p><small>{{ $articulo->cantidad }} piezas. | ${{ $articulo->precio }}</small></p>
						</h4>
					</div>
					<div class = "botones">
						<p>
							<a href="{{ route('articulo.edit', $articulo->id) }}" class="btn btn-primary" role="button">	Editar
							</a>
							<a href="{{ route('articulo.index') }}" class="btn btn-default" role="button">
								Regresar
							</a>
						</p>
					</div>
				</div>
			</div>
		
@endsection