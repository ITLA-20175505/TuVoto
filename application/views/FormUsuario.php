<?php
$urlUsuario = base_url()."index.php/UsuarioCTR";
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
			
	<input type="hidden" name="IdUsuario" value='<?= $persona['IdUsuario']?>'>
			<div class="col-lg-2 ">
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
		<div class="col-xs-12 col-sm-11 col-sm-offset-1">
			<div class="col-lg-2">
			<div class="group-material">
					<select class="material-control tooltips-general" name="Rol" 
					value='1' required="">
					<option value="">Rol de Usuario</option>
					<?php $roles = usuario_model::listado_roles();
					foreach($roles as $key=>$rol){
						
						echo "<option value='{$rol['IdRol']}'>{$rol['Nombre']}</option>";
					}
					?>
					</select>
					<span class="highlight"></span>
					<span class="bar"></span>
				</div>
			</div>
			<div class="col-lg-5">
			<?=asgInputMaterial("Contraseña","Password","password","Escribe una contraseña segura",'required',null,"200",
				"8",null,"Escribe una contraseña de minimo 8 caracteres",null,$persona['Contrasena'])?>
			</div>
			<div class="col-lg-5">
				<div class="group-material">
				
					<input type="password"  id="confirm_password" class="material-control tooltips-general" 
					placeholder="Repite la contraseña" required="" maxlength="200" data-toggle="tooltip" 
					data-placement="top" title="Repite la contraseña" onkeyup="check()"  onclick="check()" 
					minlength="8" value="<?=$persona['Contrasena']?>">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Repetir contraseña</label>
					<small id="message" style="font-weight:bold"></small>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-10 col-sm-offset-3" >
		<a class= "btn btn-lg btn-danger" href="<?=$urlUsuario?>" style="margin-right:20px"><i class="fa fa-cancel"> Cancelar</a>
		<button type="reset"  class="btn btn-lg btn-info" style="margin-right: 20px;"><i class="fa fa-retweet"></i> &nbsp;&nbsp; Limpiar</button>
		<button type="submit" id="btnSave" class="btn btn-lg btn-success" ><i class="fa fa-cloud-upload"></i> &nbsp;&nbsp; Guardar</button>
	</div>
	<div class="col-xs-12 col-sm-10 col-sm-offset-3" >
		<h3 style="color:red;font-weight:bold"><?=$error?></h3>
	</div>
</form>
<script>
var check = function() {
  if ((document.getElementById('Password').value ==
	document.getElementById('confirm_password').value)) {
    document.getElementById('message').style.color = 'green';
	document.getElementById('message').innerHTML = 'Correcto';
	return true;
  } else {
    document.getElementById('message').style.color = 'red';
	document.getElementById('message').innerHTML = 'No Coinciden';
	return false;
  }
}

</script>
<script>
	 <?php echo "cedula = '".$persona['Cedula']."';";?>
	 document.getElementById('message').innerHTML = "";
</script>
