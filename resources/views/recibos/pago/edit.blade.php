@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Recibo: {{ $recibopago->serie_comprobante}} - {{ $recibopago->num_comprobante}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	
			{!!Form::model($recibopago,['method'=>'PATCH','route'=>['pago.update',$recibopago->idrecibopago]])!!}
           <!-- {{Form::token()}} -->
           <div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
            			<label for="cliente">Proveedor</label>
            			<input type="hidden" name="idproveedor" id="idproveedor" value="{{$recibopago->idproveedor}}"></input>

            			<p>{{$recibopago->idproveedor}}-{{$recibopago->nombre}}</p>
           			 </div>
				</div> 
				
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label>Tipo Comprobante</label>
						<select name="tipo_comprobante" id="tipo_comprobante" class="form-control">			
								<option value= "Boleta">Boleta </option>
								<option value= "Factura">Factura </option>
								<option value= "Ticket">Ticket </option>	
						</select>
					</div>
				</div>	
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
            			<label for="serie_comprobante">Serie Comprobante</label>
            			<input type="text" name="serie_comprobante" class="form-control"
            			 value="{{$recibopago->serie_comprobante}}" placeholder="Serie Comprobante...">
            			 
           			 </div>
				</div> 
				<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
					<div class="form-group">
            			<label for="num_comprobante">Numero Comprobante</label>
            			<input type="text" name="num_comprobante" class="form-control"
            			 value="{{$recibopago->num_comprobante}}" placeholder="Numero Comprobante...">
            			
           			 </div>
				</div> 		
				<div class="col-lg-2  col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="monto">Monto</label>
						<input type="text" name="monto" id="monto" class="form-control" 
						value="{{$recibopago->monto}}" placeholder="Monto...">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<label>Descripcion</label>
						<input type="text" name="descripcion" class="form-control"
            			value="{{$recibopago->descripcion}}" placeholder="descripcion...">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<label>Observacion</label>
						<input type="text" name="obs" class="form-control"
            			value="{{$recibopago->obs}}" placeholder="Observacion...">
					</div>
				</div>
			</div>
				
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
            			<button class="btn btn-primary" type="submit">Guardar</button>
            			<a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
            		</div>
				</div> 
			
			</div> 
</div>
			{!!Form::close()!!}		

@endsection