<?php
$urlCandidato = base_url()."index.php/CandidatoCTR";
echo "<script>".$confirmacion."</script>";

?>
<form  method="POST">
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-0">
			<div class="col-lg-11 col-sm-offset-3">
				<div class="group-material">
					<div class="col-lg-8">
					
						<?=asgInputMaterial("Digite la cedula para consultar","ConsultaCedula","tel","XXX-XXXXXXX-X",
						null,null,"13","","pattern='[0-9]{3}-[0-9]{7}-[0-9]{1}'",null,"Formato:",$persona['Cedula'],$persona['Error'])?>
						<!-- data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador" -->	
					</div>
					
					<div class="col-lg-2">
						<button class="btn btn-primary text-left">Consultar <i class="text-right fa fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<form  method="POST" id="formdatos">
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="col-lg-3 ">
				<?=asgInputMaterial("","Cedula",null,
				"Cedula del usuario","readonly",null,null,null,null,null,null,$persona['Cedula']);?>
			</div>
			
			<div class="col-lg-4">
			<?=asgInputMaterial("","Nombres",null,
				"Si existe en el padron se mostrara los Nombres","readonly required",null,null,null,null,null,null,$persona['Nombres']);?>
			</div>
			<div class="col-lg-5">
			<?=asgInputMaterial("","Apellidos",null,
				"Si existe en el padron se mostrara el Apellido","readonly required",null,null,null,null,null,null,"{$persona['Apellidos']}");?>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
		<input type="hidden" name="IdCandidato" value='<?= $persona['IdCandidato']?>'>
			<div class="col-lg-2"></div>
			<div class="col-lg-4">
				<div class="group-material">
					<select class="material-control tooltips-general" name="Partido" required>
						<option value="">Partido Politico al que Aspira</option>
						<?php $partidos = partido_model::listado_partido();
						foreach($partidos as $key=>$partido){
							
							echo "<option value='{$partido['IdPartido']}'>{$partido['Siglas']}</option>";
						}
						?>	
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="group-material">
					<select class="material-control tooltips-general" name="Nivel" required>
						<option value="">Nivel al que Aspira</option>
						<?php $niveles = nivel_model::listado_nivel();
						foreach($niveles as $key=>$nivel){
							
							echo "<option value='{$nivel['IdNivel']}'>{$nivel['Nombre']}</option>";
						}
						?>		
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
			
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-10 col-sm-offset-3" >
		<a class= "btn btn-lg btn-danger" href="<?=$urlCandidato?>" style="margin-right:20px"><i class="fa fa-cancel"> Cancelar</a>
		<button type="reset"  class="btn btn-lg btn-info" style="margin-right: 20px;"><i class="fa fa-retweet"></i> &nbsp;&nbsp; Limpiar</button>
		<button type="submit" id="btnSave" class="btn btn-lg btn-success" ><i class="fa fa-cloud-upload"></i> &nbsp;&nbsp; Guardar</button>
	</div>
	<div class="col-xs-12 col-sm-10 col-sm-offset-3" >
		<h3 style="color:red;font-weight:bold"><?=$error?></h3>
	</div>
</form>
<script>
	 <?php echo "cedula = '".$persona['Cedula']."';";?>
	
</script>
<script>
</script>
