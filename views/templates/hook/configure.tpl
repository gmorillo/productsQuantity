{if $save}
	<div class="bootstrap">
		<div class="module_confirmation conf confirm alert alert-success">
			<button type="button" class="close" data-dismiss="alert">x</button>
			Información actualizada exitosamente
		</div>
	</div>
{/if}
<form action="" method="post" class="defaultForm form-horizontal ">
	<div class="panel">
		<div class="panel-heading"><i class="icon-check"></i> Módulo para mostrar filtros por cantidad de producto seleccionada</div>
		<div class="form-wrapper">
			<div class="row">
				<div class="form-group">
					<label class="control-label col-lg-3 required">Valor 1</label>
				    <div class="col-lg-9">
				        <input type="number" id="opcion1" name="opcion1" class="form-control fixed-width-lg" aria-describedby="urlHelp" placeholder="Introduzca el número con que desea realizar filtros" value="{$opcion1}" required>
				        <p class="help-block">Introduzca el primer valor del área de selección para realizar filtros</p>
				    </div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3 required">Valor 2</label>
				    <div class="col-lg-9">
				        <input type="number" id="opcion2" name="opcion2" class="form-control fixed-width-lg" aria-describedby="urlHelp" placeholder="Introduzca el número con que desea realizar filtros" value="{$opcion2}" required>
				        <p class="help-block">Introduzca el segundo valor del área de selección para realizar filtros</p>
				    </div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3 required">Valor 3</label>
				    <div class="col-lg-9">
				        <input type="number" id="opcion3" name="opcion3" class="form-control fixed-width-lg" aria-describedby="urlHelp" placeholder="Introduzca el número con que desea realizar filtros" value="{$opcion3}" required>
				        <p class="help-block">Introduzca el tercer valor del área de selección para realizar filtros</p>
				    </div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3 required">Valor 4</label>
				    <div class="col-lg-9">
				        <input type="number" id="opcion4" name="opcion4" class="form-control fixed-width-lg" aria-describedby="urlHelp" placeholder="Introduzca el número con que desea realizar filtros" value="{$opcion4}" required>
				        <p class="help-block">Introduzca el cuarto valor del área de selección para realizar filtros</p>
				    </div>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit"  name="submitNscProductsQuantity" class="btn btn-default pull-right">
					<i class="process-icon-save"></i> Guardar
				</button>
			</div>
		</div>
	</div>
</form>