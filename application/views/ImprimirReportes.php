<?php
$base = base_url('base');
if($eleccion == false){
	$eleccion = eleccion_model::eleccion_x_Activo();
}
if(count($eleccion) > 0){
	$eleccion = $eleccion[0];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="<?=$base?>/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="<?=$base?>/css/sweet-alert.css">
    <link rel="stylesheet" href="<?=$base?>/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?=$base?>/css/normalize.css">
    <link rel="stylesheet" href="<?=$base?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base?>/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?=$base?>/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=$base?>/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?=$base?>/js/modernizr.js"></script>
    <script src="<?=$base?>/js/bootstrap.min.js"></script>
    <script src="<?=$base?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=$base?>/js/main.js"></script>
	<script src="<?=$base?>/js/sweetalert.js"></script>
    <script src="<?=$base?>/js/confirmarvoto.js"></script>
    <script src="<?=$base?>/js/mensaje.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
             <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
	<div class="container-fluid">
	<div class="page-header">
		<h2 class="all-tittles">Votos de Eleccion <?=$eleccion['Nombre']?></small></h2>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h3 class="text-center all-tittles">Total de Votos Por Candidatos </h3>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr class="success">
							<th class="text-center">Candidatos</th>
							<th class="text-center">Nivel Aspirado</th>
							<th class="text-center">Partido</th>
							<th class="text-center">No. Votos</th>
							<th class="text-center">porcetanje</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$votos = filtros_model::votos_x_candidatos($eleccion['IdEleccion']);
							
							if(count($votos) > 0){
								foreach ($votos as $key => $voto) {
									echo <<<ROW
									<tr>
									<td>{$voto['Candidato']}</td>
									<td>{$voto['Nivel']}</td>
									<td>{$voto['Partido']}</td>
									<td>{$voto['votos']}</td>
									<td>{$voto['porcentaje']}</td>
								</tr>	
ROW;									
								}
							}
						?>
					</tbody>
					<tfoot>
					<?php
						$total = filtros_model::total_votos_x_candidatos($eleccion['IdEleccion']);
						if(count($total) > 0){
							$total = $total[0];
						}
					?>
						<tr class="info">
							<th class="text-center">Total</th>
							<th></th>
							<th></th>
							<th class="text-center"><?=$total['votos']?></th>
							<th class="text-center"><?=$total['porcentaje']?></th>
						</tr>
					</tfoot>
				</table>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<h3 class="text-center all-tittles">Votos  de usuarios por Partidos</h3>
					<div class="table-responsive">
						<table class="table table-hover text-center">
							<thead>
								<tr class="success">
									<th class="text-center">Partido</th>
									<th class="text-center">No. Votos</th>
									<th class="text-center">Porcentaje</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$votos = filtros_model::votos_x_partidos($eleccion['IdEleccion']);
							if(count($votos) > 0){
								foreach ($votos as $key => $voto) {
									echo <<<ROW
									<tr>
									<td>{$voto['Partido']}</td>
									<td>{$voto['votos']}</td>
									<td>{$voto['porcentaje']}</td>
								</tr>	
ROW;									
								}
							}
						?>
							</tbody>
							<tfoot>
								<tr class="info">
									<th class="text-center">Total</th>
									<th class="text-center"><?=$total['votos']?></th>
							<th class="text-center"><?=$total['porcentaje']?></th>
								</tr>
							</tfoot>
						</table>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>

<script>
print();
</script>
    </body>
</html>
