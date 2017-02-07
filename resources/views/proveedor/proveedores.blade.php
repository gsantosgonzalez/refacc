@extends('layouts.app')

@section('content')
	
            <a href="{{ route('proveedor.create') }}" class = "btn btn-info">Nuevo Proveedor</a>
            <!--Buscador-->
            {!! Form::open(['route' => 'proveedor.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
                <div class="input-group">
                    {!! Form::text('nombre', null, ['class'=> 'form-control', 'placeholder' => 'Buscar Proveedor', 'aria-describedby' => 'search']) !!}
                    <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>
            {!! Form::close() !!}
            <!--Fin del buscador-->
            &nbsp
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
                    @foreach($proveedores as $proveedor)
                    <tr>
                        <td><a href="proveedor/{{$proveedor->id}}">{{ $proveedor->nombre }}</a></td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>
                            <a href="{{ route('proveedor.edit', $proveedor->id) }}" class = "btn btn-warning">
                                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                            </a>&nbsp;&nbsp;
                            <a href="{{ route('proveedor.destroy', $proveedor->id) }}" onclick = "return confirm('¿Deseas eliminar este proveedor?')" class = "btn btn-danger">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $proveedores->render() !!}
            </div>
		
@endsection
