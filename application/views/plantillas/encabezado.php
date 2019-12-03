<?php

$usuario = null;
if(isset($_SESSION['usuario'])){
    $usuario = usuario_model::usuario_x_Cedula($_SESSION['usuario'])[0];
}
$base = base_url('base');
$url = base_url('index.php');
$urlEleccion = base_url('index.php/EleccionCTR');
$urlUsuario = base_url('index.php/UsuarioCTR');
$urlCandidato = base_url('index.php/CandidatoCTR');
$urlNivel = base_url('index.php/NivelCTR');
$urlPartido = base_url('index.php/PartidoCTR');
$urlReporte = base_url('index.php/ReporteCTR');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
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
<?php 
?>
<!-- // if($usuario['IdRol'] == 1){ -->
<!-- //     echo <<<CODIGO -->
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
			<figure>
                    <img src="<?=$base?>/img/TuVotoRD.png" alt="" class="img-responsive center-box" style="width:55%;margin-top:10px">
                </figure>
            </div>
 
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="<?=$url?>/Main"><i class="fa fa-home"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="fa fa-calendar"></i>&nbsp;&nbsp; Elecciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
						<li>
							<div class="dropdown-menu-button"><i class="fa fa-star"></i>&nbsp;&nbsp; Eleccion Activa <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
								<ul class="list-unstyled">
									<li><a href="<?=$urlEleccion?>/EleccionActiva"><i class="fa fa-cogs"></i>&nbsp;&nbsp; Consultar Eleccion</a></li>
								</ul>
				 		</li>
                            <li><a href="<?=$urlEleccion?>"><i class="fa fa-folder-open"></i>&nbsp;&nbsp; Lista de Elecciones</a></li>

                            <li><a href="<?=$urlEleccion?>/Nuevo"><i class="fa fa-briefcase"></i>&nbsp;&nbsp; Nueva Eleccion</a></li>
                        </ul>
					</li>
					<li>
                        <div class="dropdown-menu-button"><i class="fa fa-clone"></i>&nbsp;&nbsp; Niveles de Eleccion <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?=$urlNivel?>"><i class="fa fa-database"></i>&nbsp;&nbsp; Listado de Niveles</a></li>
                            <li><a href="<?=$urlNivel?>/Nuevo"><i class="fa fa-magic"></i>&nbsp;&nbsp; Nuevo Nivel</a></li>
         
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="fa fa-male"></i><i class="fa fa-female"></i>&nbsp;&nbsp; Candidatos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?=$urlCandidato?>"><i class="fa fa-users"></i>&nbsp;&nbsp; Listado de Candidatos</a></li>
                            <li><a href="<?=$urlCandidato?>/Nuevo"><i class="fa fa-id-badge"></i>&nbsp;&nbsp; Nuevo Candidato</a></li>
         
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="fa fa-university"></i>&nbsp;&nbsp; Partidos / Grupos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?=$urlPartido?>"><i class="fa fa-object-group"></i>&nbsp;&nbsp; Listados de Partidos o Grupos</a></li>
                            <li><a href="<?=$urlPartido?>/Nuevo"><i class="fa fa-clipboard"></i>&nbsp;&nbsp; Nuevo Partido o Grupo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="fa fa-universal-access"></i>&nbsp;&nbsp;  Usuarios  <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?=$urlUsuario?>"><i class="fa fa-address-book"></i>&nbsp;&nbsp; Lista de Usuarios</a></li>
                            <li>
                                <a href="<?=$urlUsuario?>/Nuevo"><i class="fa fa-user-plus"></i>&nbsp;&nbsp; Nuevo Usuario </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="<?=$urlReporte?>/"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas</a></li>
                    <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers" >
<!-- CODIGO;
}
else{
    echo <<<CODIGO
		
    <div class=" full-reset custom-scroll-containers" >
CODIGO;
} -->
<!-- ?> -->
   
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
               
                <figure>
                   <img src="" alt=""  class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles"><?=$usuario['Nombres']?> <?=$usuario['Apellidos']?></span>
                </li>
                <li  class="tooltips-general exit-system-button"  data-href="<?=$url?>" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook.html" data-placement="bottom" title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
                <!-- <figure>
                    <img src="<?=$base?>/img/TuVotoRD.png"  class="pull-left img-responsive center-box" style="width:10%;border:none">
                </figure> -->
            </ul>
		</nav>
		<div class="container">
            <div class="page-header">
                <h1 class="all-tittles"><?php echo $titulo ?><small></small></h1>
            </div>
        </div>

