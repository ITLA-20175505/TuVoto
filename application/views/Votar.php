<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container" style="max-height:60px">
	<div class="col-xl-12">
	<div class="col-lg-6" style="margin-top:30px">
	<h2 class=" text-black">Votante: <strong><?=$persona['Nombres']?> <?=$persona['Apellidos']?> </strong></h2>
</div>
<div class="col-lg-6">
<img src="<?=$persona['Foto']?>" class="pull-right" style="width:100px;height:100px">
</div>
	</div>
</div>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
    <title>Tu Voto Candidatos Slider Example</title>
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
  <body class="bg-light">
    <section class="my-5 bg-dark">
	<div class="container">
	<div class="col-xl-12">
	<h2 class="text-center text-white"> Candidatos Slider</h2>
	</div>
	
		<div id="carouselSixColumn" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
			<li data-target="#carouselSixColumn" data-slide-to="0" class="active"></li>
			<li data-target="#carouselSixColumn" data-slide-to="1"></li>
			<li data-target="#carouselSixColumn" data-slide-to="2"></li>
      </ol>

      
      <div class="carousel-inner">
			<div class="carousel-item active">
				<div class="row">
				  <div class="col-xl-2 p-1">				
					<div class="card">
					  <img src="https://via.placeholder.com/200x150" class="w-100">
					  <div class="card-body">
						<h5 class="card-title">Candidato a Diputado</h5>
            <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
						<a href="#" class="btn btn-outline-success w-100">Votar</a>
					  </div>
					</div>
				  </div>
				  <div class="col-xl-2 p-1">				
					<div class="card">
					  <img src="https://via.placeholder.com/200x150" class="w-100">
					  <div class="card-body">
						<h5 class="card-title">Candidato a Diputado</h5>
            <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
						<a href="#" class="btn btn-outline-success w-100">Votar</a>
					  </div>
					</div>
				  </div>
				  <div class="col-xl-2 p-1">				
					<div class="card">
					  <img src="https://via.placeholder.com/200x150" class="w-100">
					  <div class="card-body">
						<h5 class="card-title">Candidato a Diputado</h5>
            <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
						<a href="#" class="btn btn-outline-success w-100">Votar</a>
					  </div>
					</div>
				  </div>
				  <div class="col-xl-2 p-1">				
					<div class="card">
					  <img src="https://via.placeholder.com/200x150" class="w-100">
					  <div class="card-body">
						<h5 class="card-title">Candidato a Diputado</h5>
            <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
						<a href="#" class="btn btn-outline-success w-100">Votar</a>
					  </div>
					</div>
				  </div>
				  <div class="col-xl-2 p-1">				
					<div class="card">
					  <img src="https://via.placeholder.com/200x150" class="w-100">
					  <div class="card-body">
						<h5 class="card-title">Candidato a Diputado</h5>
            <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
						<a href="#" class="btn btn-outline-success w-100">Votar</a>
					  </div>
					</div>
				  </div>
				  <div class="col-xl-2 p-1">				
					<div class="card">
					  <img src="https://via.placeholder.com/200x150" class="w-100">
					  <div class="card-body">
						<h5 class="card-title">Candidato a Diputado</h5>
            <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
						<a href="#" class="btn btn-outline-success w-100">Votar</a>
					  </div>
					</div>
				  </div>
				</div>
			</div>
			<div class="carousel-item">
			 <div class="row">
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato a Senador</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato a Senador</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato a Senador</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato a Senador</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">PCandidato a Senador</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato a Senador</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			</div>
			</div>
			<div class="carousel-item">
			<div class="row">
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato Presidencial</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato Presidencial</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato Presidenciale</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato Presidencial</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato Presidencial</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
            
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-2 p-1">				
				<div class="card">
				  <img src="https://via.placeholder.com/200x150" class="w-100">
				  <div class="card-body">
					<h5 class="card-title">Candidato Presidencial</h5>
          <p class="card-text">Partido</p>
            <p class="card-text">Nombre</p>
					<a href="#" class="btn btn-outline-success w-100">Votar</a>
				  </div>
				</div>
			  </div>
			</div>
			</div>
		  </div> <a class="carousel-control-prev" href="#carouselSixColumn" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselSixColumn" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		</div>
	
	</section>
         <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>