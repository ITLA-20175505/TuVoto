<?php
$base = base_url('base');
$url = base_url('');
$urlEleccion = base_url('EleccionCTR');
$urlUsuario = base_url('UsuarioCTR');
$urlCandidato = base_url('CandidatoCTR');
$urlNivel = base_url('NivelCTR');
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=$base?>/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?=$base?>/js/modernizr.js"></script>
    <script src="<?=$base?>/js/bootstrap.min.js"></script>
    <script src="<?=$base?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=$base?>/js/main.js"></script>
</head>
<body>
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
                    <li><a href="<?=$url?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Elecciones <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
						<li>
							<div class="dropdown-menu-button"><i class="zmdi zmdi-star zmdi-hc-fw"></i>&nbsp;&nbsp; Eleccion Activa <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
								<ul class="list-unstyled">
									<li><a href="Categorias.php"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>&nbsp;&nbsp; Consultar Eleccion</a></li>
									<li><a href="Categorias.php"><i class="zmdi zmdi-chart zmdi-hc-fw"></i>&nbsp;&nbsp; Niveles de la Eleccion</a></li>
								</ul>
				 		</li>
                            <li><a href="Centro.php"><i class="zmdi zmdi-folder-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Elecciones</a></li>

                            <li><a href="<?=$urlEleccion?>/Nuevo"><i class="zmdi zmdi-group-work zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva Eleccion</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Candidatos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="Admin.php"><i class="zmdi zmdi-accounts-list zmdi-hc-fw"></i>&nbsp;&nbsp; Listado de Candidatos</a></li>
                            <li><a href="<?=$urlCandidato?>/Nuevo"><i class="zmdi zmdi-accounts-list-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Candidato</a></li>
         
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Partidos / Grupos <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.html"><i class="zmdi zmdi-layers zmdi-hc-fw"></i>&nbsp;&nbsp; Listados de Partidos o Grupos</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Partido o Grupo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-calendar zmdi-hc-fw"></i>&nbsp;&nbsp;  Usuarios  <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="<?=$urlUsuario?>/Nuevo"><i class="zmdi zmdi-accounts-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Lista de Usuarios</a></li>
                            <li>
                                <a href="<?=$urlUsuario?>/Nuevo"><i class="zmdi zmdi-account-box-o zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo Usuario </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="report.html"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes y estadísticas</a></li>
                    <li><a href="advancesettings.html"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Admin Name</span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="index.html" data-placement="bottom" title="Salir del sistema">
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
            </ul>
		</nav>
		<div class="container">
	<div class="page-header">
		<h1 class="all-tittles"><?php echo $titulo ?><small></small></h1>
	</div>
</div>
