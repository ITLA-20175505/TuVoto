
<?php
$eleccionActiva = eleccion_model::eleccion_x_Activo()[0];
$niveles = nivel_model::nivel_x_Eleccion($eleccionActiva['IdEleccion']);
$idNiveles = nivel_model::Id_niveles_x_Eleccion($eleccionActiva['IdEleccion']);
// var_dump($_POST);
$urlPadron = base_url('index.php/PadronCTR');
echo "<script>".$confirmacion."</script>";
?>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


    <title>Casilla de votacion</title>
	<style>
		.carousel-indicators{		
		top:105%;		
		}
		
		.carousel-indicators li{
		background-color:red;
		}
		.carousel-control-prev-icon {
		 background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='red' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
		}

		.carousel-control-next-icon {
		  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='red' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
		}
		section{
		padding:100px 0px;
		}
	</style>
  </head>
  
  <form id="detalle_votos" method="POST">
  <input type="hidden" name="IdVotacion" value="<?=$IdVotacion?>" >
  <div style="display:none" id="detalle_votacion" >
</div>
</form>
<textarea style="display:none" id="detalle_plantilla">
<td>
	<input type="text" class="form-control" value='{IdNivel}'  type="text" name='niveles[]'>
</td>
<td>
	<input type="text" class="form-control" value='{IdCandidato}'   type="text" name='candidatos[]'>
</td>

</textarea>
  <body class="bg-light">
  <section class="my-5 bg-dark">

			
	
	<div class="container">
	
		<div class="col-xl-12" id="titular">
			<h2 class="text-center text-white" id='titulo'>Nombre del nivel</h2>
		</div>
		<div id="carouselSixColumn" class="carousel slide" >
		
		<ol class="carousel-indicators" id="sliders">
			<!-- <li data-target="#carouselSixColumn" data-slide-to="0" ></li>
			<li data-target="#carouselSixColumn" data-slide-to="1"></li>
			<li data-target="#carouselSixColumn" data-slide-to="2"></li>  -->
			
		</ol>
		
			<div class="carousel-inner">
			
			<?php
	
				foreach($niveles as $key=>$nivel){
					$casillas = eleccion_model::GetCasilla($eleccionActiva['IdEleccion'],$niveles[$key]['IdNivel']);
					$titulo = $nivel['Nombre'];
					echo <<<JSS
					
					<script>
					$(function() {
							$("#sliders").append( "<li data-target='#carouselSixColumn' data-slide-to='{$key}' onclick='' ></li>" );
					});
					</script>
JSS;
					if($key == 0){
					echo <<<SLIDE
				
					<div class="carousel-item active">
					<div class="row">
SLIDE;
					}else{
						echo <<<SLIDE

						<div class="carousel-item ">
						<div class="row">
SLIDE;
					}
					foreach($casillas as $ckey =>$casilla){	
						AsgCasilla($casilla,$idNiveles);
					}
					echo"</div></div>";
					// echo "<script>document.getElementById('titulo').innerHTML = '{$titulo}';</script>";
					
				}
			?>
			</div>	
			
		</div>
	
	</div>
	<div class="row" style="margin-top:40px">
	<button class="btn btn-lg btn-success btn-block" type="button" onclick="guardar()"> PRESIONE AQUI SI Y SOLO SI HA TERMINADO DE VOTAR</button>	 
	</div>
	<a class="carousel-control-prev" href="#carouselSixColumn" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Nivel Anterior</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselSixColumn" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Siguiente Nivel</span>
		  </a>
		
</section>

  </body>
<script>
jQuery(window).load(function() {
 
 /*
	 Stop carousel
 */
 $('.carousel').carousel('pause');

});
</script>
<script>
	var lista_votos = [];
	function verificarVotacion(){
		correct = true;
		if(lista_votos.length == 0){
			correct = false;
		}
		for(i=0;i<lista_votos.length;i++){
			if(lista_votos[i].IdCandidato == 0){
				correct = false;
			}
		}
		return correct;
	}
	function guardar(){
		var nose = verificarVotacion();
		if(nose){
			confirmarVotacion('Enviar Votacion','Esta Seguro que desea enviar los votos?','question','Enviar Votos','No! Volver Atras','<?=$urlPadron?>');
		}else{
			MensajeSA('Voto Incompleto','Debe de votar en todos los niveles de las elecciones para que su voto pueda ser validado','info','Entendido!');
		}
	}
</script>

<script>

function nuevo_detalle(nivel,candidato,niveles){
	// var nose = confirmarVoto('Voto','Desea Votar Por el?','question','Si','No');
	// console.log(nose);
	voto ={};
	voto.IdNivel = 0;
	voto.IdCandidato = 0;	
	if(lista_votos.length < niveles.length){
		for(i=0;i<niveles.length;i++){
			votos ={};
			votos.IdNivel = parseInt(niveles[i].IdNivel, 10);
			votos.IdCandidato = 0;
			lista_votos.push(votos);
		}	
	}
	voto.IdNivel = nivel;
	voto.IdCandidato = candidato
	tr = document.createElement('tr');
	cont = document.getElementById('detalle_plantilla').value;
	for (i = 0; i < lista_votos.length; i++) {
		if(lista_votos[i].IdNivel == voto.IdNivel){
			lista_votos[i].IdCandidato = voto.IdCandidato;
			$(' #carouselSixColumn'). carousel( i+1);
		}
	}
	
}
</script>
<script>

	function cambiarTitular(nombre){
		document.getElementById('titulo').innerHTML = nombre;
	}
</script>



         <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
