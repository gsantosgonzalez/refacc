@extends('layouts.app')

@section('content')
	<div class= "container">
		<div class = "jumbotron">
            <a href="{{ route('articulo.create') }}" class = "btn btn-info">Nuevo Artículo</a>
            <!--Buscador-->
            {!! Form::open(['route' => 'articulo.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                <div class="input-group">
                    {!! Form::text('nombre', null, ['class'=> 'form-control', 'placeholder' => 'Buscar Artículo', 'aria-describedby' => 'search']) !!}
                    <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
            {!! Form::close() !!}
            <!--Fin del buscador-->
            &nbsp
    		<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Tamaño</th>
                        <th>Categoria</th>
                        <th>Cantidad</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <td><a href="articulo/{{$articulo->id}}">{{ $articulo->clave }}</a></td>
                        <td>{{ $articulo->nombre }}</td>
                        <td>{{ $articulo->tamano }}</td>
                        <td>{{ $articulo->categoria->nombre }}</td>
                        <td>{{ $articulo->cantidad }}</td>
                        <td>{{ $articulo->stock }}</td>
                        <td>{{ $articulo->precio }}</td>
                        <td>{{ $articulo->marca }}</td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $articulos->render() !!}
            </div>
		<div>
	</div>
@endsection
