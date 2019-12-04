<?php
echo "<script>".$confirmacion."</script>";
?>

<form  method="POST" id="formdatos">
	<div class="row" >
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<input type="hidden" name="IdEleccion" value="<?=$eleccion['IdEleccion']?>">	
			<div class="col-lg-4" style="margin-top:13px">
			<?=asgInputMaterial("","Nombre",null,
				"Nombre de la eleccion"," required",null,null,null,null,null,null,$eleccion['Nombre']);?>
			</div>
			<div class="col-lg-4">
			<?=asgInputMaterial("","FechaInicio","datetime-local",
				"Fecha de Inicio"," required",null,null,null,null,null,null,$eleccion['FechaInicio']);?>
			</div>
			<div class="col-lg-4">
			<?=asgInputMaterial("","FechaFin","datetime-local",
				"Fecha de Terminacion"," required",null,null,null,null,null,null,$eleccion['FechaFin']);?>
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


