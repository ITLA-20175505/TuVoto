
<form  method="POST" id="formdatos">
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="col-lg-5 ">
				<?=asgInputMaterial("Nombre del Partido","Nombre",null,
				"","required",null,null,null,null,null);?>
			</div>
            <div class="col-lg-5 ">
				<?=asgInputMaterial("Color que lo represente","Nombre",null,
				"","required",null,null,null,null,null);?>
			</div>
			<div class="col-lg-5 col-sm-offset-3">
				<select class="material-control tooltips-general" placeholder="Seleccione La Eleccion" required>
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Seleccione la Eleccion</label>
			</div>
		</div>
	</div>

	<div class="row" >
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<h3>Datos de la Eleccion</h3>
			<hr/>
		</div>
	</div>
	<div class="row" >
		<div class="col-xs-12 col-sm-10 col-sm-offset-2">
			<div class="col-lg-3">
			<?=asgInputMaterial("","Nombre",null,
				"Nombre de la eleccion","readonly required",null,null,null,null,null,null);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","Nombre",null,
				"Fecha de Inicio","readonly required",null,null,null,null,null,null);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","Nombre",null,
				"Fecha de Terminacion","readonly required",null,null,null,null,null,null);?>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-2">
			<div class="col-lg-3">
			<?=asgInputMaterial("","Nombre",null,
				"Hora de Inicio","readonly required",null,null,null,null,null,null);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","Nombre",null,
				"Hora de Terminacion","readonly required",null,null,null,null,null,null);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","Nombre",null,
				"Esta Activa?","readonly required",null,null,null,null,null,null);?>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-4">
			<div class="col-lg-4">
				<button type="reset"  class="btn btn-info" style="margin-right: 20px;"><i class="fa fa-retweet"></i> &nbsp;&nbsp; Limpiar</button>
				<button type="submit" id="btnSave" class="btn btn-success" ><i class="fa fa-cloud-upload"></i> &nbsp;&nbsp; Guardar</button>
			</div> 
		</div>
	</div>
</form>
<script>
	 <?php echo "cedula = '".$persona['Cedula']."';";?>
	
</script>
<script>
</script>