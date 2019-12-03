<?php
echo "<script>".$confirmacion."</script>";

?>
<form  method="POST" id="consultaForm">
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-12 col-sm-offset-2">
				<div class="group-material">
					<div class="col-lg-8">
					
						<?=asgInputMaterial("Digite la cedula para consultar en el Padron","ConsultaCedula","tel","XXX-XXXXXXX-X",
						null,null,"13","","pattern='[0-9]{3}-[0-9]{7}-[0-9]{1}'",null,"Formato:",$persona['Cedula'],$persona['Error'])?>
						<!-- data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador" -->	
					</div>
					
					<div class="col-lg-2">
						<button class="btn btn-primary text-left" type="submit">Consultar <i class="text-right fa fa-search"></i></button>
					</div>
				</div>
			</div>
	</div>

</form>
<form id="formConfirmar" method="POST">
  <input type="hidden" value=""  id="Validado" name="Validado">
  <input type="hidden" name="IdVotacion" value="<?=$persona['IdVotacion']?>">
		<input type="hidden" name="Eleccion" value="<?=$eleccion['IdEleccion']?>">
<input type="hidden" id="Cedula" name="Cedula">
  <div class="row no-gutters">
		<div class="col-lg-2 col-sm-offset-2">
			<h3>Cedula </h3>
			<h4><?=$persona['Cedula']?></h4>
	
		</div>
		<div class="col-lg-2 col-sm-offset-1">
			<h3>Nombres </h3>
			<h4><?=$persona['Nombres']?></h4>
		
		</div>
		<div class="col-lg-2 col-sm-offset-1">
			<h3>Apellidos </h3>
			<h4><?=$persona['Apellidos']?></h4>
	
		</div>
  </div>
  <div class="row no-gutters">
    <div class="col-lg-3 col-sm-offset-2">
      <h3>Fecha de Nacimiento </h3>
			<h4><?=$persona['FechaNacimiento']?></h4>
			
    </div>
    <div class="col-lg-3 col-sm-offset-0">
      <h3>Lugar de Nacimiento </h3>
      <h4><?=$persona['LugarNacimiento']?></h4>
    </div>
    <div class="col-lg-3 col-sm-offset-0">
      <button class="btn-lg btn btn-warning" type="button" style="margin-top:20px" onclick="validar('<?=$persona['Foto']?>')">Presiona para confirmar Foto</button>
      <h4 id="errorFoto" style="font-weight:bold;color:red"></h4>
    </div>
  </div>
  <div class="row no-gutters">
    <div class="col-lg-6 col-sm-offset-4" style="margin-top:30px">
      <button type="reset" class="btn btn-info btn-lg">Limpiar Datos</button>
      <button type="button" class="btn btn-success btn-lg" onclick="confirmar()">Confirmar Pasar a Casilla </button>
    </div>
  </div>
  <div class="col-xs-12 col-sm-10 col-sm-offset-4" >
		<h3 id="error" style="color:red;font-weight:bold"><?=$error?></h3>
	</div>
</form>
<div style="margin-top:30px">
	<h3> Personas que han ejercido su voto</h3>
	<hr/>
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-hover text-center">
				<thead>
					<tr class="success">
						<th class="text-center">Cedula</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Apellidos</th>
						<th class="text-center">Signo Zodiacal</th>
					</tr>
				</thead>
				<tbody>
					<?php $votantes = votacion_model::votacion_x_Eleccion($eleccion['IdEleccion']);
					foreach($votantes as $key=>$votante){
						AsgVotantes($votante);
					}
					?>
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>
		</div>
	</div>
</div>
<script>
	 <?php echo "cedula = '".$persona['Cedula']."';";?>
	document.getElementById('Cedula').value = cedula;
</script>
<script>
function confirmar(){
  validado =document.getElementById('Validado').value;
  if(validado == "true"){
		$("#formConfirmar").submit();
  }else{
	Swal.fire("Confirme Foto del Votante");
  }
}
</script>
<script>
function validar($img){
if($img !=""){
  Swal.fire({
  title: 'Validar Votante',
  text: "Esta foto coincide con el perfil del votante?",
  imageUrl: $img,
  imageWidth: 175,
  imageHeight: 175,
  imageAlt: 'Custom image',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Validar!',
  cancelButtonText: 'No, Volver Atras!'
}).then((result) => {
  if (result.value) {
    document.getElementById('Validado').value = true;
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    document.getElementById('Validado').value = false;
  }
});
}else{
  document.getElementById('errorFoto').innerHTML = "<strong>Debe Consultar el Padron</strong>";
  document.getElementById('Validado').value = false;
}
}
</script>
