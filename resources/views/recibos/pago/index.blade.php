@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Recibos de Pago <a href="pago/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('recibos.pago.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Fecha</th>
					<th>Proveedor</th>
					<th>Comprobante</th>
					<th>Monto</th>
					<th>Descricion</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($recibopago as $rec)
				<tr>
					
					<td>{{ $rec->fecha_hora}}</td>
					<td>{{ $rec->nombre}}</td>
					<td>{{ $rec->tipo_comprobante.':'.$rec->serie_comprobante.' - '.$rec->num_comprobante}}</td>					
					<td>{{ $rec->monto}}</td>
					<td>{{ $rec->descripcion}}</td>
					<td>{{ $rec->estado}}</td>
					<td>
						<a href="{{URL::action('ReciboPagoController@edit',$rec->idrecibopago)}}"><button class="btn btn-info">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$rec->idrecibopago}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('recibos.pago.modal')
				@endforeach
			</table>
		</div>
		{{$recibopago->render()}}
	</div>
</div>

@endsection
