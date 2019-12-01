
<form  method="POST" id="formdatos">
	<div class="row" >
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<input type="hidden" name="IdEleccion" value="<?=$eleccion['IdEleccion']?>">	
			<div class="col-lg-4" style="margin-top:13px">
			<?=asgInputMaterial("","Nombre",null,
				"Nombre de la eleccion"," required",null,null,null,null,null,null,$eleccion['Nombre']);?>
			</div>
			<div class="col-lg-4">
			<?=asgInputMaterial("","FechaInicio","date",
				"Fecha de Inicio"," required",null,null,null,null,null,null,$eleccion['FechaInicio']);?>
			</div>
			<div class="col-lg-4">
			<?=asgInputMaterial("","FechaFin","date",
				"Fecha de Terminacion"," required",null,null,null,null,null,null,$eleccion['FechaFin']);?>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="col-lg-4">
			<?=asgInputMaterial("","HoraInicio","time",
				"Hora de Inicio"," required",null,null,null,null,null,null,$eleccion['HoraInicio']);?>
			</div>
			<div class="col-lg-4">
			<?=asgInputMaterial("","HoraFin","time",
				"Hora de Terminacion"," required",null,null,null,null,null,null,$eleccion['HoraFin']);?>
			</div>
			<div class="col-lg-4" style="margin-top:13px">
			<div class="group-material">
					<select class="material-control tooltips-general" name="Active" required="">
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
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-12 col-sm-offset-4">
				<button type="reset"  class="btn btn-lg btn-info" style="margin-right: 20px;"><i class="fa fa-retweet"></i> &nbsp;&nbsp; Limpiar</button>
				<button type="submit" id="btnSave" class="btn btn-lg btn-success" ><i class="fa fa-cloud-upload"></i> &nbsp;&nbsp; Guardar</button>
		</div>
	</div>
<div class="col-xs-12 col-sm-10 col-sm-offset-3" >
		<h3 style="color:red;font-weight:bold"><?=$error?></h3>
	</div>
</form>


