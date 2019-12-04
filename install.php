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
	mysqli_query($con,"CREATE TABLE `candidatos` (
		`IdCandidato` int(11) NOT NULL,
		`IdPartido` int(11) NOT NULL,
		`IdNivel` int(11) NOT NULL,
		`Nombres` varchar(50) NOT NULL,
		`Apellidos` varchar(50) NOT NULL,
		`Cedula` varchar(13) NOT NULL,
		`Active` bit(1) DEFAULT b'1',
		`Foto` text
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;");
	mysqli_query($con,"CREATE TABLE `elecciones` (
		`IdEleccion` int(11) NOT NULL,
		`Nombre` varchar(75) NOT NULL,
		`FechaInicio` datetime DEFAULT NULL,
		`FechaFin` datetime DEFAULT NULL,
		`HoraInicio` time DEFAULT NULL,
		`HoraFin` time DEFAULT NULL,
		`Active` bit(1) DEFAULT b'0',
		`Eliminado` bit(1) DEFAULT b'0'
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;");

	mysqli_query($con,"CREATE TABLE `niveles` (
  `IdNivel` int(11) NOT NULL,
  `IdEleccion` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
");
	mysqli_query($con,"CREATE TABLE `partidos` (
		`IdPartido` int(11) NOT NULL,
		`IdEleccion` int(11) NOT NULL,
		`Siglas` varchar(10) DEFAULT NULL,
		`Nombre` varchar(50) NOT NULL,
		`Color` varchar(25) DEFAULT NULL,
		`Active` bit(1) DEFAULT b'1'
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
	  ");
	mysqli_query($con,"CREATE TABLE `roles` (
		`IdRol` int(11) NOT NULL,
		`Nombre` varchar(50) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
	  ");
	mysqli_query($con,"INSERT INTO `roles` (`IdRol`, `Nombre`) VALUES
	(1, 'Admin'),
	(2, 'Facilitador');");
	mysqli_query($con,"CREATE TABLE `usuarios` (
		`IdUsuario` int(11) NOT NULL,
		`IdRol` int(11) NOT NULL,
		`Cedula` varchar(13) NOT NULL,
		`Nombres` varchar(50) NOT NULL,
		`Apellidos` varchar(50) NOT NULL,
		`Contrasena` varchar(200) DEFAULT NULL,
		`Active` bit(1) DEFAULT b'1'
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;	  
	  ");
	mysqli_query($con,"CREATE TABLE `votaciones` (
		`IdVotacion` int(11) NOT NULL,
		`Cedula` varchar(13) NOT NULL,
		`Nombres` varchar(50) DEFAULT NULL,
		`Apellidos` varchar(50) DEFAULT NULL,
		`IdEleccion` int(11) NOT NULL,
		`Active` bit(1) DEFAULT b'1',
		`FechaNacimiento` date DEFAULT NULL,
		`Foto` text
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
	  ");
	mysqli_query($con,"CREATE TABLE `votaciones_detalle` (
		`IdVotacion` int(11) NOT NULL,
		`IdNivel` int(11) NOT NULL,
		`IdCandidato` int(11) NOT NULL
	  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
	  ");
	mysqli_query($con,"INSERT INTO `usuarios`
	 (`IdUsuario`, `IdRol`, `Cedula`, `Nombres`, `Apellidos`, `Contrasena`, `Active`) VALUES
	(1, 1, '001-0123141-3', 'MARIA ELENA', 'FERMIN BETANCOURT', '12345678', b'1');");
	mysqli_query($con,"ALTER TABLE `candidatos`
	ADD PRIMARY KEY (`IdCandidato`),
	ADD UNIQUE KEY `idx_candidato_cedula` (`Cedula`),
	ADD KEY `fk_Candidato_Partido` (`IdPartido`),
	ADD KEY `fk_Candidato_Nivel` (`IdNivel`);
  ");
	mysqli_query($con,"ALTER TABLE `elecciones`
	ADD PRIMARY KEY (`IdEleccion`);
	");
	mysqli_query($con,"ALTER TABLE `niveles`
	ADD PRIMARY KEY (`IdNivel`),
	ADD KEY `fk_Niveles_Eleccion` (`IdEleccion`);
  ");
	mysqli_query($con,"ALTER TABLE `partidos`
	ADD PRIMARY KEY (`IdPartido`),
	ADD KEY `fk_Partido_Eleccion` (`IdEleccion`);
  ");
	mysqli_query($con,"ALTER TABLE `roles`
	ADD PRIMARY KEY (`IdRol`);
  ");
	mysqli_query($con,"ALTER TABLE `usuarios`
	ADD PRIMARY KEY (`IdUsuario`),
	ADD UNIQUE KEY `idx_usuario_cedula` (`Cedula`),
	ADD KEY `fk_Usuario_Rol` (`IdRol`);
  ");
	mysqli_query($con,"ALTER TABLE `votaciones`
	ADD PRIMARY KEY (`IdVotacion`),
	ADD UNIQUE KEY `idx_votaciones_cedula` (`Cedula`),
	ADD KEY `fk_votaciones_elecciones` (`IdEleccion`);
  ");
  mysqli_query($con,"ALTER TABLE `votaciones_detalle`
  ADD PRIMARY KEY (`IdVotacion`,`IdNivel`,`IdCandidato`);
");
	mysqli_query($con,"ALTER TABLE `candidatos`
	MODIFY `IdCandidato` int(11) NOT NULL AUTO_INCREMENT;
  ");
	mysqli_query($con,"ALTER TABLE `elecciones`
	MODIFY `IdEleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  ");
	mysqli_query($con,"ALTER TABLE `niveles`
	MODIFY `IdNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  ");
	mysqli_query($con,"ALTER TABLE `partidos`
	MODIFY `IdPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  ");
	mysqli_query($con,"ALTER TABLE `roles`
	MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  ");
	mysqli_query($con,"ALTER TABLE `usuarios`
	MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  ");
	mysqli_query($con,"ALTER TABLE `votaciones`
	MODIFY `IdVotacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
  ");
	mysqli_query($con,"ALTER TABLE `candidatos`
	ADD CONSTRAINT `fk_Candidato_Nivel` FOREIGN KEY (`IdNivel`) REFERENCES `niveles` (`idnivel`),
	ADD CONSTRAINT `fk_Candidato_Partido` FOREIGN KEY (`IdPartido`) REFERENCES `partidos` (`idpartido`);
  ");
	mysqli_query($con,"ALTER TABLE `niveles`
	ADD CONSTRAINT `fk_Niveles_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`ideleccion`);
  ");
	mysqli_query($con,"ALTER TABLE `partidos`
	ADD CONSTRAINT `fk_Partido_Eleccion` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`ideleccion`);
  ");
	mysqli_query($con,"ALTER TABLE `usuarios`
	ADD CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`idrol`);
	");
	mysqli_query($con,"ALTER TABLE `votaciones`
	ADD CONSTRAINT `fk_votaciones_elecciones` FOREIGN KEY (`IdEleccion`) REFERENCES `elecciones` (`ideleccion`);
  COMMIT;
  ");
	mysqli_query($con,"drop function if exists TotalVotos");
	mysqli_query($con,"	create function TotalVotos() returns int
	BEGIN
	
	select count(IdVotacion) into @total from votaciones_detalle;
	RETURN @total;
	end;
	");

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
