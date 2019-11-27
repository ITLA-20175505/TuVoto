<?php 
require('componentes.php');
if($_POST){

$con = mysqli_connect($_POST['DB_HOST'],$_POST['DB_USER'],$_POST['DB_PASSWORD'])
    or die ("
    <script>
    alert('Conexion Invalida, favor verificar');
    window.location = 'install.php';
    </script>");
  
    mysqli_query($con,"DROP `{$_POST['DB_NAME']}`");
    mysqli_query($con,"CREATE DATABASE  `{$_POST['DB_NAME']}`" );
	mysqli_query($con,"USE `{$_POST['DB_NAME']}`");   

    $archivo = <<<ARCHIVO
	<?php
	// Base de Datos
    define('DB_HOST','{$_POST['DB_HOST']}');
    define('DB_USER','{$_POST['DB_USER']}');
    define('DB_PASSWORD','{$_POST['DB_PASSWORD']}');
	define('DB_NAME','{$_POST['DB_NAME']}');
	// Base URL
	define('BASE_URL','{$_POST['BASE_URL']}');
ARCHIVO;

    file_put_contents('my_config.php',$archivo);
echo"<script>
    window.location = 'index.php';
</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
    <div class="container">
        <h3> Instalador</h3>
        <p> Llena estos datos para configuar tu </p>
        <form method="post">
            <div>
                <?= asgInput2('DB_HOST','servidor');?>
            </div>
            <div>
                <?= asgInput2('DB_USER','usuario');?>
            </div>
            <div>
                <?= asgInput2('DB_PASSWORD','contrasena');?>
            </div>
            <div>
                <?= asgInput2('DB_NAME','nombre');?>
			</div>
			<div>
                <?= asgInput2('BASE_URL','Direccion URL');?>
            </div>
<div class="text-center">
    <button class="btn btn-success" type="submit">Acceder</button>
</div>
        </form>
    </div>
    </body>
</html>
