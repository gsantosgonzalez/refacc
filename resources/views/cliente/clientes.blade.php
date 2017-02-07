@extends('layouts.app')

@section('content')

            <a href="{{ route('cliente.create') }}" class = "btn btn-info">Nuevo Cliente</a>
            <!--Buscador-->
            {!! Form::open(['route' => 'cliente.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                <div class="input-group">
                    {!! Form::text('nombre', null, ['class'=> 'form-control', 'placeholder' => 'Buscar Cliente', 'aria-describedby' => 'search']) !!}
                    <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
            {!! Form::close() !!}
            <!--Fin del buscador-->
            &nbsp;
    		<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td><a href="cliente/{{$cliente->id}}">{{ $cliente->nombre }}</a></td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>
                            <a href="{{ route('cliente.edit', $cliente->id) }}" class = "btn btn-warning">
                                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                            </a>&nbsp;&nbsp;
                            <a href="{{ route('cliente.destroy', $cliente->id) }}" onclick = "return confirm('¿Deseas eliminar este cliente?')" class = "btn btn-danger">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $clientes->render() !!}
            </div>
		
@endsection
