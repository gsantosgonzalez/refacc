@extends('layouts.app')

@section('content')
	
            <a href="{{ route('articulo.create') }}" class = "btn btn-info">Nuevo Artículo</a>
            <!--Buscador-->
            {!! Form::open(['route' => 'articulo.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                <div class="input-group">
                    {!! Form::text('nombre', null, ['class'=> 'form-control', 'placeholder' => 'Buscar Artículo', 'aria-describedby' => 'search']) !!}
                    <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
            {!! Form::close() !!}
            <!--Fin del buscador-->
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Tamaño</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Marca</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articulos as $articulo)
                        <tr>
                            <td><img src="{{ asset('imagen/articulo/'.$articulo->imagen) }}" atl = "{{asset('img/car.png')}}" width = "48px" height = "48px"></td>
                            <td><a style="display:block;" href="articulo/{{$articulo->id}}">{{ $articulo->clave }}</a></td>
                            <td>{{ $articulo->nombre }}</td>
                            <td>{{ $articulo->tamano }}</td>
                            <td>{{ $articulo->cantidad }}</td>
                            <td>${{ $articulo->precio }}</td>
                            <td>{{ $articulo->marca }}</td>
                            <td>
                                <a href="{{ route('articulo.edit', $articulo->id) }}" class = "btn btn-warning">
                                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                </a>&nbsp;&nbsp;
                                <a href="{{ route('articulo.destroy', $articulo->id) }}" onclick = "return confirm('¿Deseas eliminar este articulo?')" class = "btn btn-danger">
                                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                </a>
                            </td>                  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {!! $articulos->render() !!}
                </div>
            </div>
		
@endsection
