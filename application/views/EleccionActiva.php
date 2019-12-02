<?php
$urlEleccion = base_url('index.php/EleccionCTR');
$urlCandidato = base_url('index.php/CandidatoCTR');
$urlNivel = base_url('index.php/NivelCTR');
$urlPartido = base_url('index.php/PartidoCTR');
?>
<h2> Datos de la Eleccion</h2>
<hr/>
<div class="row no-gutters">
      <div class="col-lg-3 col-sm-offset-1">
        <h3>Nombre de la Eleccion </h3>
        <h4><?=$eleccion['Nombre']?></h4>
      </div>
      <div class="col-lg-3 col-sm-offset-0">
        <h3>Fecha de Inicio </h3>
        <h4><?=$eleccion['FechaInicio']?></h4>
      </div>
      <div class="col-lg-3 col-sm-offset-0">
        <h3>Fecha de Terminacion </h3>
        <h4><?=$eleccion['FechaFin']?></h4>
      </div>
  </div>
  <div class="row no-gutters">
    <div class="col-lg-3 col-sm-offset-1">
      <h3>Hora de Inicio </h3>
      <h4><?=$eleccion['HoraInicio']?></h4>
    </div>
    <div class="col-lg-3 col-sm-offset-0">
      <h3>Hora de Terminacion </h3>
      <h4><?=$eleccion['HoraFin']?></h4>
	</div>
	<div class="col-lg-3 col-sm-offset-0">
      <h3>Tiempo para que finalize </h3>
      <h4></h4>
	</div>
</div>
<div style="margin-top:30px">
	<h3> Niveles de la Eleccion</h3>
	<hr/>
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-hover text-center">
				<thead>
					<tr class="success">
						<th class="text-center">ID</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($niveles as $key=>$nivele){
						AsgEleccionActivaNiveles($nivele,$urlNivel);
					}
					?>
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div style="margin-top:30px">
	<h3> Partidos de la Eleccion</h3>
	<hr/>
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-hover text-center">
				<thead>
				<tr class="success">
						<th class="text-center">ID</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Siglas</th>
						<th class="text-center">Color</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($partidos as $key=>$partido){
						AsgEleccionActivaPartidos($partido,$urlPartido);
					}
					?>
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div style="margin-top:30px">
	<h3> Candidatos de la Eleccion</h3>
	<hr/>
	<div class="col-xs-12">
		<div class="table-responsive">
			<table class="table table-hover text-center">
				<thead>
					<tr class="success">
						<th class="text-center">ID</th>
						<th class="text-center">Cedula</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">Apellidos</th>
						<th class="text-center">Nivel</th>
						<th class="text-center">Partido</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($candidatos as $key=>$candidato){
						AsgCandidatos($candidato,$urlCandidato);
					}
					?>
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div></div>
