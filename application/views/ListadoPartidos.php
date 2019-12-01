<?php
$urlPartido = base_url('index.php/PartidoCTR');
?>
<div class="col-xs-12">
	<div class="table-responsive">
		<table class="table table-hover text-center">
			<thead>
				<tr class="success">
					<th class="text-center">ID</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Color</th>
					<th class="text-center">Eleccion</th>
					<th class="text-center">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach($partidos as $key=>$partido){
					AsgPartidos($partido,$urlPartido);
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
