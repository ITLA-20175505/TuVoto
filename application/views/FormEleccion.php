
<form  method="POST" id="formdatos">
<div class="row" >
		<div class="col-xs-12 col-sm-10 col-sm-offset-2">
			<div class="col-lg-3" style="margin-top:13px">
			<?=asgInputMaterial("","Nombre",null,
				"Nombre de la eleccion"," required",null,null,null,null,null);?>
			</div>
			<div class="col-lg-3">
			<?=asgInputMaterial("","FechaInicio","date",
				"Fecha de Inicio"," required",null,null,null,null,null,null);?>
			</div>
			<div class="col-lg-3">
			<?=asgInputMaterial("","FechaFin","date",
				"Fecha de Terminacion"," required",null,null,null,null,null,null);?>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-2">
			<div class="col-lg-3">
			<?=asgInputMaterial("","HoraInicio","time",
				"Hora de Inicio"," required",null,null,null,null,null,null);?>
			</div>
			<div class="col-lg-3">
			<?=asgInputMaterial("","HoraFin","time",
				"Hora de Terminacion"," required",null,null,null,null,null,null);?>
			</div>
			<div class="col-lg-3" style="margin-top:13px">
			<div class="group-material">
					<select class="material-control tooltips-general" placeholder="Activar Eleccion?" required="">
						<option value=""><label>Desea Activar la Eleccion?</label></option>
						<option value="true">Si</option>
						<option value="false">No</option>
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
					
					<small id="message" style="font-weight:bold"></small>
				</div>
		</div>
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-5">
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