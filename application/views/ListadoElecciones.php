<?php
$urlEleccion = base_url('index.php/EleccionCTR');
?>
<div class="col-xs-12">
	<div class="table-responsive">
		<table class="table table-hover text-center">
			<thead>
				<tr class="success">
					<th class="text-center">ID</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Fecha de Inicio</th>
					<th class="text-center">Fecha de Terminacion</th>
					<th class="text-center">Hora de Inicio</th>
					<th class="text-center">Hora de Terminacion</th>
					<th class="text-center">Activa?</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach($elecciones as $key=>$eleccion){
					AsgElecciones($eleccion,$urlEleccion);
				}
				?>
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>
	</div>
	<p class="lead text-center"><strong><i class="zmdi zmdi-info-outline"></i>&nbsp; ¡Importante!</strong> Para imprimir esta tabla ve a la sección de reportes</p>
</div>
</div>
