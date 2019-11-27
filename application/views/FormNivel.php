<form autocomplete="off">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el código de categoría"  required="" pattern="[0-9]{1,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Solo números, máximo 20 caracteres">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Código de categoría</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre de la categoría" required="" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre de la categoría">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Nombre</label>
				</div>
			</div>
			
			<p class="text-center">
				<button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
				<button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
			</p> 
		</div>
	</div>
</form>
                       