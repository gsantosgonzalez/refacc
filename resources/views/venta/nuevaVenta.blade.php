@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('css\tablas.css')}}">
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

	<div class="container">
		<div class="jumbotron">
			<!--Buscador-->
            {!! Form::open(['route' => 'venta.add', 'method' => 'GET', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    <label for="term">Nombre</label>
                    {!! Form::text('term', null, ['class'=> 'form-control', 'id' => 'term', 'placeholder' => 'Buscar Artículo', 'aria-describedby' => 'search', 'required']) !!}
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    {!! Form::text('cantidad', null, ['class'=> 'form-control', 'id' => 'cantidad', 'placeholder' => 'Número de piezas', 'aria-describedby' => 'search', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            <!--Fin del buscador-->
        </div>
        @if(isset($articulos))
            @if(count($articulos) > 0)
                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Precio unitario</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articulos as $articulo)
                                    <tr>
                                        <td>{{$articulo->id}}</td>
                                        <td>{{$articulo->nombre}}</td>
                                        <td>{{$articulo->cantidad}}</td>
                                        <td class = "dinero">{{$articulo->precio}}</td>
                                        <td class = "dinero">{{$articulo->total}}</td>
                                        <td>
                                            <a href="{{ route('venta.eliminar', $articulo->id) }}" class = "btn btn-danger">
                                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan = "3"></td>
                                <td>Total</td>
                                <td class = "dinero">{{'$'.$total}}</td>
                            </tfoot>
                        </table>
                        <a href="{{route('venta.cierraVenta', $numVenta)}}" class = "btn btn-primary">
                            Cerrar Venta
                        </a>
                        <a href="{{route('venta.cancelaVenta')}}" class = "btn btn-primary">
                            Cancelar
                        </a>
                    </div>
                </div>
            @endif
        @endif
    
    </div>
@endsection
