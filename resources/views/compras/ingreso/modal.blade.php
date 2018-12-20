<div class="modal fade modal-slide" aria-hidden="true" role = "dialog" tabindex="-1" id="modal-delete-{{$ing->idingreso}}">
{{!! Form::open(array('action'=>array('IngresoController@destroy',$ing->idingreso),'method'=>'delete')) !!}}	
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
			<span aria-hidden="true">x</span> 
			</button>
			<h4 class="modal-title">Cancelar Ingreso</h4>
		</div>
		<div class="modal-body">
		<p>Confirme si desea eliminar Ingreso</p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss=modal>Cerrar</button>
			<button type="SUBMIT" class="btn btn-primary">Confirmar</button>
		</div>
	</div>	
</div>
{{!! Form::Close()!!}}	

</div>