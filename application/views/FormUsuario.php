
<form autocomplete="off">
	<div class="row" style="margin-top:25px">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Nombre completo" required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del administrador">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Cedula completo</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general input-check-user" placeholder="Nombre de usuario" required="" maxlength="20" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,20}" data-toggle="tooltip" data-placement="top" title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Nombre de usuario</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="email" class="material-control tooltips-general" placeholder="E-mail"  maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el Email del administrador">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Email</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="password" class="material-control tooltips-general" placeholder="Contraseña" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Escribe una contraseña">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Contraseña</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="password" class="material-control tooltips-general" placeholder="Repite la contraseña" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Repite la contraseña">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Repetir contraseña</label>
				</div>
			</div>
			<p class="text-center">
				<button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
				<button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
			</p> 
		</div>
	</div>
</form>
