@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Ingreso {{$ingreso->idingreso}}</h3>
		
	</div>
</div>
	<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
            			<label for="proveedor">Proveedor</label>
						<p>{{$ingreso->nombre}}</p>

           			 </div>
				</div> 
				
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Tipo Comprobante</label>
						
						<p>{{$ingreso->tipo_comprobante}}</p>
					</div>
				</div>	
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
            			<label for="serie_comprobante">Serie Comprobante</label>
            			<p>{{$ingreso->serie_comprobante}}</p>
           			 </div>
				</div> 		
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
            			<label for="num_comprobante">Numero Comprobante</label>
            			 <p>{{$ingreso->num_comprobante}}</p>
            			
           			 </div>
				</div> 		
	</div>
	<div class="row">
				
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
								<thead style="background-color: #A9D0F5">
							
									<th>Articulo</th>
									<th>Cantidad</th>
									<th>Precio Compra</th>
									<th>Precio Veta</th>
									<th>Subtotal</th>
								</thead>
								<tfoot>
									<th>Total</th>
									
									<th></th>
									<th></th>
									<th></th>
									<th>
									<h4 id="total">S/. {{$ingreso->total}}</h4></th>
								</tfoot>
								<tbody>
									@foreach($detalles as $det)
            						<tr>
            							<td>
            								{{$det->articulo}}
            							</td>
            							<td>
            								{{$det->cantidad}}
            							</td>
            							<td>
            								{{$det->precio_compra}}
            							</td>
            							<td>
            								{{$det->precio_venta}}
            							</td>
            							<td>
            								{{$det->precio_venta*$det->cantidad}}
            							</td>
            						</tr>
            						@endforeach									
								</tbody>
							</table>
						</div>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				
            			<a href="{{ url()->previous() }}" class="btn btn-danger">Volver</a>
            </div>
	</div> 
	
        
            

					
 @endsection