<form autocomplete="off">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de DUI del docente" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Cedula</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del docente, solamente letras">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Nombres</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del docente, solamente letras">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Apellidos</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9]{8,8}" required="" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Fecha de nacimiento</label>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="group-material">
					<input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la especialidad del docente" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Especialidad del docente">
					<span class="highlight"></span>
					<span class="bar"></span>
					<label>Cargo a aspirar</label>
				</div>
			</div>
			<div class="col-lg-6">
				<legend>Partidos</legend>
				<div class="group-material">
					<span>Sección encargada</span>
					<select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
						<option value="" disabled="" selected="">Selecciona una sección</option>
						<option value="Seccion">PLD</option>
						<option value="Seccion">PRM</option>
						<option value="Seccion">LFDP</option>
					</select>
				</div>
			</div>

			<p class="text-center">
				<button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
				<button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
			</p> 
		</div>
	</div>
</form>
