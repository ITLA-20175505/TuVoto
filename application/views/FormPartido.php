<?php

// var_dump($partido);
// var_dump($error);
// var_dump($eleccion);
?>

<form  method="POST" id="formdatos">
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<input type="hidden" name="IdPartido" value="<?=$partido['IdPartido']?>">
			<div class="col-lg-6">
				<?=asgInputMaterial("Nombre del Partido","Nombre",null,
				"","required",null,null,null,null,null,null,$partido['Nombre']);?>
			</div>
            <div class="col-lg-6">
				<?=asgInputMaterial("Color que lo represente","Color",null,
				"","required",null,null,null,null,null,null,$partido['Color']);?>
			</div>
			<div class="col-lg-5 col-sm-offset-3">
				<select class="material-control tooltips-general text-center" name="Eleccion" required>
					<option onclick="datosEleccion('borrar')" value="">Seleccione la Eleccion</option>
					<?php
						$elecciones = eleccion_model::listado_eleccion();
						foreach($elecciones as $key=>$eleccion){
							$json = json_encode($eleccion);
							echo "<option  onclick='datosEleccion({$json})'   value='{$eleccion['IdEleccion']}'>{$eleccion['Nombre']}</option>";
						}
					?>
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
					
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
		<div class="col-xs-12 col-sm-12 col-sm-offset-0">
			<div class="col-lg-3">
			<?=asgInputMaterial("","NombreEleccion",null,
				"Nombre de la eleccion","readonly required",null,null,null,null,null,null,
				$eleccion['Nombre']);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","FechaInicio",null,
				"Fecha Inicio","readonly required",null,null,null,null,null,null,$eleccion['FechaInicio']);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","FechaFin",null,
				"Fecha Fin","readonly required",null,null,null,null,null,null,$eleccion['FechaFin']);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","HoraInicio",null,
				"Hora Inicio","readonly required",null,null,null,null,null,null,$eleccion['HoraInicio']);?>
			</div>
			<div class="col-lg-2">
			<?=asgInputMaterial("","HoraFin",null,
				"Hora Fin","readonly required",null,null,null,null,null,null,$eleccion['HoraFin']);?>
			</div>
			<div class="col-lg-1">
			<?=asgInputMaterial("","Active",null,
				"Activa?","readonly required",null,null,null,null,null,null,$eleccion['Active']);?>
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

<script>
	function datosEleccion(obj){
		if(typeof(obj) == 'object'){
		document.getElementById('NombreEleccion').value = obj.Nombre;
		document.getElementById('FechaInicio').value = obj.FechaInicio;
		document.getElementById('FechaFin').value = obj.FechaFin;
		document.getElementById('HoraInicio').value = obj.HoraInicio;
		document.getElementById('HoraFin').value = obj.HoraFin;
		if(obj.Active){
			document.getElementById('Active').value = 'Si';
		}else{
			document.getElementById('Active').value = 'No';
		}
		}else{
			document.getElementById('NombreEleccion').value ="";
			document.getElementById('FechaInicio').value ="";
			document.getElementById('FechaFin').value ="";
			document.getElementById('HoraInicio').value ="";
			document.getElementById('HoraFin').value ="";
			document.getElementById('Active').value = '';
		}
	
		
	}
</script>
