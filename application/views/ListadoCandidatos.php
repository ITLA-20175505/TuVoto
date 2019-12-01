<?php
$urlCandidato = base_url('index.php/CandidatoCTR');
?>
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
	<p class="lead text-center"><strong><i class="zmdi zmdi-info-outline"></i>&nbsp; ¡Importante!</strong> Para imprimir esta tabla ve a la sección de reportes</p>
</div>
</div>
