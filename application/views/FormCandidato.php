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
				"Cedula del usuario","readonly",null,null,null,null,null,$persona['Cedula']);?>
			</div>
			
			<div class="col-lg-4">
			<?=asgInputMaterial("","Nombre",null,
				"Si existe en el padron se mostrara los Nombres","readonly required",null,null,null,null,null,null,$persona['Nombres']);?>
			</div>
			<div class="col-lg-5">
			<?=asgInputMaterial("","Apellido",null,
				"Si existe en el padron se mostrara el Apellido","readonly required",null,null,null,null,null,null,"{$persona['Apellido1']}"." "."{$persona['Apellido2']}");?>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="col-lg-2"></div>
			<div class="col-lg-4">
				<div class="group-material">
					<select class="material-control tooltips-general" placeholder="Seleccione el Partido" required="">
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Partido Politico al que Aspira</label>
					<small id="message" style="font-weight:bold"></small>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="group-material">
					<select class="material-control tooltips-general" placeholder="Seleccione el Nivel" required="">
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Nivel al que Aspira</label>
					<small id="message" style="font-weight:bold"></small>
				</div>
			</div>
			<div class="col-lg-4"></div>
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