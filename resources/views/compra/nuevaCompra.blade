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
			<!--Buscador de articulos-->
            {!! Form::open(['route' => 'venta.add', 'method' => 'GET', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    {!! Form::hidden('id_articulo', null, ['id' => 'id_articulo']) !!}
                </div>
                <div class="form-group">
                    <label for="term">Nombre</label>
                    {!! Form::text('term', null, ['class'=> 'form-control', 'id' => 'term', 'placeholder' => 'Buscar Artículo', 'aria-describedby' => 'search', 'required autofocus']) !!}
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    {!! Form::text('cantidad', null, ['class'=> 'form-control', 'id' => 'cantidad', 'placeholder' => 'Número de piezas', 'aria-describedby' => 'search', 'required']) !!}
                </div>
                <input type="hidden" name="id_venta" value = "{{$id_venta}}">
                <div class="form-group">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            <!--Fin del buscador-->
        </div>
        @if(isset($carritos))
            @if(count($carritos) > 0)
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
                                @foreach($carritos as $carrito)
                                    <tr>
                                        <td>{{$carrito->id_articulo}}</td>
                                        <td>{{$carrito->articulo->nombre.' | '.$carrito->articulo->tamano.' | '.$carrito->articulo->marca}}</td>
                                        <td>{{$carrito->cantidad}}</td>
                                        <td>${{$carrito->precio}}</td>
                                        <td>${{$carrito->total}}</td>
                                        <td>
                                            {!! Form::open(['route' => 'venta.eliminar']) !!}
                                                <input type="hidden" name="id_venta" value = "{{$id_venta}}">
                                                <input type="hidden" name="id_articulo" value = "{{$carrito->id_articulo}}">
                                                <button class = "btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td class = "dinero">{{'$'.$total}}</td>
                            </tfoot>
                        </table>
                        <div class="form-inline">
                            <div class="form-group">
                                {!! Form::open(['route' => 'venta.store']) !!}
                                    <input type="hidden" name="id_venta" value = "{{$id_venta}}">
                                    <div class="form-group">
                                        <label for="id_cliente">Cliente</label>
                                        {!! Form::select('id_cliente', $clientes, null, ['class'=> 'form-control', 'id' => 'id_cliente', 'aria-describedby' => 'search', 'required']) !!}
                                    </div>

                                    {!! Form::submit('Cerrar Venta', ['class' => 'btn btn-success']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="form-group">
                                <a href="{{ route('venta.cancelaVenta', $id_venta) }}" class = "btn btn-danger">
                                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                    Cancelar Venta
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    
    </div>
@endsection
