			<table class="table">
				<tr>
					<td align="center"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></td>
					<td>Cliente: {{ $venta->cliente->nombre }}</td>
					<td></td>
					<td>Fecha: {{ $venta->fecha }}</td>
					<td></td>
					<td>Venta No. {{ $venta->id }}</td>
				</tr>
			</table>
			<div width = "50%">
				<table class = "table table-hover">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th>Núm.</th>
							<th>Descripción</th>
							<th>Precio Unitario</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($venta->articulo as $articulo)
							<tr>
								<td></td>
								<td></td>
								<td>{{$articulo->pivot->cantidad}}</td>
								<td>{{$articulo->nombre.' '.$articulo->tamano.' '.$articulo->marca}}</td>
								<td>{{$articulo->precio}}</td>
								<td>{{$articulo->pivot->cantidad*$articulo->precio}}</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Subtotal:</td>
							<td>{{number_format($venta->total/1.16, 2, '.', ',')}}</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>IVA(16%):</td>
							<td>{{number_format((($venta->total/1.16)*0.16), 2, '.', ',')}}</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Total:</td>
							<td>{{$venta->total}}</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>