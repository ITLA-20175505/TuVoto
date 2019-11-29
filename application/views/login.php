
<?php

$urlPadron=base_url('PadronCT');
$base = base_url('base');
$url = base_url('EleccionCTR');
session_start();

if($_POST){
$verif_usuario = usuario_model::inicio_sesion($_POST['usuario'], $_POST['password']);
if($verif_usuario['login'] == "true"){
	$_SESSION['usuario']=$_POST['usuario'];
	$_SESSION['IdUsuario']=$verif_usuario['IdUsuario'];
	redirect('Main');
	// redirect(base_url('EleccionCTR/Nuevo'));
	$malpass='';
}else{
	$malpass = "Credenciales no coinciden";
}
}else{
$malpass='';
}
if(isset($_SESSION['user'])){
redirect(base_url(''));
}

?>



<html lang="es">
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="<?=$base?>/assets/icons/book.ico" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="<?=$base?>/css/sweet-alert.css">
    <link rel="stylesheet" href="<?=$base?>/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?=$base?>/css/normalize.css">
    <link rel="stylesheet" href="<?=$base?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base?>/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?=$base?>/css/style.css">
    <link rel="stylesheet" href="<?=$base?>/css/login.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?=$base?>/js/modernizr.js"></script>
    <script src="<?=$base?>/js/bootstrap.min.js"></script>
    <script src="<?=$base?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=$base?>/js/main.js"></script>
</head>

<body class="full-cover-background" style="background-image:url(<?=$base?>/img/eleccion.jpg); box-sizing: border-box;
	width: 100%;height: 100%;background-size: 100% 100%;">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
            <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
       </p>
       <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>

       <form method="POST">
       <label><i class="zmdi zmdi-account"></i> &nbsp; Cedula</label>
            <div class="group-material-login">

              <input type="text" name="usuario" class="material-login-control" required maxlength="13"
              pattern="[0-9]{3}-[0-9]{7}-[0-9]{1}">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <small>Formato: XXX-XXXXXXX-X</small>
              
            </div>
            <div class="group-material-login">
              <input type="password" name="password" class="material-login-control" required="" maxlength="70">
              <span class="highlight-login"></span>
              <span class="bar-login"></span>
              <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
            </div> 
            <div class="row">
                <div class="col-lg-6 col-sm-offset-3" style="margin-top:25px">
					<button class="btn-login btn btn-lg" type="submit"
					style="">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
				</div>
			</div>
			<div class="col-lg-12 col-sm-offset-0" style="margin-top:5px;margin-left:15px">
				<h3 style="color:white;font-weight:bold"><?=$malpass?></h3>
			</div>
       </form>
    </body>
</html>
