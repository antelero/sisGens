@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(array('url'=>'ventas/cliente','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="nombre">Nombre</label>
            			<input type="text" name="nombre" class="form-control"
            			required value="{{old('nombre')}}" placeholder="Nombre...">

           			 </div>
				</div> 
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="direccion">Direccion</label>
            			<input type="text" name="direccion" class="form-control"
            			 value="{{old('direccion')}}" placeholder="direccion...">

           			 </div>
				</div> 
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label>Documento</label>
						<select name="tipo_documento" class="form-control">
							
								<option value= "DNI">DNI </option>
								<option value= "CUIT">CUIT </option>
								<option value= "CUIL">CUIL </option>
								<option value= "PAS">PAS </option>
							
						</select>
					</div>
				</div>	
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<label for="Numero Documento">Numero Documento</label>
            			<input type="text" name="num_documento" class="form-control"
            			 value="{{old('num_documento')}}" placeholder="Numero  de Documento...">
            			
           			 </div>
				</div> 			
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Telefono">Telefono</label>
            			<input type="text" name="telefono" class="form-control"
            			 value="{{old('telefono')}}" placeholder="Telefono...">
            			
					</div>
				</div> 
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="email">Email</label>
            			<input type="email" name="email" class="form-control"
            			 value="{{old('email')}}" placeholder="Email...">
            			
					</div>
				</div> 
				

				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="form-group">
            			<button class="btn btn-primary" type="submit">Guardar</button>
            			<a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
            		</div>
				</div> 
			
			</div> 
            
         </div>   
    </div>
	{!!Form::close()!!}		
    @endsection
