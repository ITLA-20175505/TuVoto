<?php

function asgInputMaterial($label,$nombre,$type="text",$placeholder="",$readonly="",
	$class="",$max="",$min="",$pattern="",$tooltip="",$additional="",$value="",$error=""){
	return <<<CODIGO
	<div class="group-material">
	<input type="{$type}" class="material-control tooltips-general {$class}" placeholder="{$placeholder}" 
	$readonly maxlength="{$max}" minlength="{$min}" {$pattern} data-toggle="tooltip" data-placement="top" title="{$tooltip}"
	value="{$value}" name="{$nombre}" id="{$nombre}">
	<span class="highlight"></span>
	<span class="bar"></span>
	<label>{$label}</label>
	<div class="col-lg-12">
	<small>{$additional} {$placeholder}</small>
	</div>
	<div class="col-lg-12">
	<small style="color:red;font-weight:bol">{$error}</small>
	</div>
</div>
CODIGO;
}
 function getSigno($fecha) {
	if($fecha != ""){
		list($year,$month,$day) = explode('-',$fecha);
		$month = intval($month);
		$signos = array('', 'Capricornio', 'Acuario', 'Piscis', 'Aries', 'Tauro', 'Gemini', 'Cancer', 'Leo', 'Virgo', 'Libra', 'Scorpio', 'Sagitario', 'Capricornio');
		$last_day = array('', 19, 18, 20, 20, 21, 21, 22, 22, 21, 22, 21, 20, 19);
		return ($day > $last_day[$month]) ? $signos[$month+ 1] : $signos[$month];
	}
}
function AsgVotantes($c){
	$c['Nombres'] = htmlentities($c['Nombres']);
	$c['Apellidos'] = htmlentities($c['Apellidos']);
	$c['Cedula'] = htmlentities($c['Cedula']);

	$signo = getSigno($c['FechaNacimiento']);
	echo <<<ROW
		<tr>
		<td scope='row'>{$c['Cedula']}</td>
		<td>{$c['Nombres']}</td>
		<td>{$c['Apellidos']}</td>
		<td>{$signo}</td>
ROW;
}
function AsgUsuarios($u,$urlUsuario){
	$urlEditar = $urlUsuario."/Editar/".$u['IdUsuario'];
	$urlBorrar = $urlUsuario."/Eliminar/".$u['IdUsuario'];
	$u['Nombres'] = htmlentities($u['Nombres']);
	$u['Apellidos'] = htmlentities($u['Apellidos']);
	$u['Contrasena'] = htmlentities($u['Contrasena']);
	$u['Rol'] = htmlentities($u['Rol']);
	echo <<<ROW
		<tr>
		<th scope='row'>{$u['IdUsuario']}</th>
		<td>{$u['Cedula']}</td>
		<td>{$u['Nombres']}</td>
		<td>{$u['Apellidos']}</td>
		<td>{$u['Rol']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Usuario','Esta Seguro que desea eliminar este Usuario?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
}
function AsgPartidos($p,$urlPartido){

	$urlEditar = $urlPartido."/Editar/".$p['IdPartido'];
	$urlBorrar = $urlPartido."/Eliminar/".$p['IdPartido'];
	$p['Nombre'] = htmlentities($p['Nombre']);
	$p['Color'] = htmlentities($p['Color']);
	$p['Eleccion'] = htmlentities($p['Eleccion']);
	$p['Siglas'] = htmlentities($p['Siglas']);

	echo <<<ROW
		<tr>
		<th scope='row'>{$p['IdPartido']}</th>
		<td>{$p['Nombre']}</td>
		<td>{$p['Siglas']}</td>
		<td>{$p['Color']}</td>
		<td>{$p['Eleccion']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Partido','Esta Seguro que desea eliminar este Partido?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
}
function AsgEleccionActivaPartidos($p,$urlPartido){

	$urlEditar = $urlPartido."/Editar/".$p['IdPartido'];
	$urlBorrar = $urlPartido."/Eliminar/".$p['IdPartido'];
	$p['Nombre'] = htmlentities($p['Nombre']);
	$p['Color'] = htmlentities($p['Color']);
	echo <<<ROW
		<tr>
		<th scope='row'>{$p['IdPartido']}</th>
		<td>{$p['Nombre']}</td>
		<td>{$p['Siglas']}</td>
		<td>{$p['Color']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Partido','Esta Seguro que desea eliminar este Partido?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
}
function AsgNiveles($n,$urlNiveles){
	$urlEditar = $urlNiveles."/Editar/".$n['IdNivel'];
	$urlBorrar = $urlNiveles."/Eliminar/".$n['IdNivel'];
	$n['Nombre'] = htmlentities($n['Nombre']);
	$n['Eleccion'] = htmlentities($n['Eleccion']);
	echo <<<ROW
		<tr>
		<th scope='row'>{$n['IdNivel']}</th>
		<td>{$n['Nombre']}</td>
		<td>{$n['Eleccion']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Nivel','Esta Seguro que desea eliminar este Nivel de Eleccion?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
}
function AsgEleccionActivaNiveles($n,$urlNiveles){
	$urlEditar = $urlNiveles."/Editar/".$n['IdNivel'];
	$urlBorrar = $urlNiveles."/Eliminar/".$n['IdNivel'];
	$n['Nombre'] = htmlentities($n['Nombre']);
	echo <<<ROW
		<tr>
		<th scope='row'>{$n['IdNivel']}</th>
		<td>{$n['Nombre']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Nivel','Esta Seguro que desea eliminar este Nivel de Eleccion?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
}
function AsgCandidatos($c,$urlCandidato){
	$urlEditar = $urlCandidato."/Editar/".$c['IdCandidato'];
	$urlBorrar = $urlCandidato."/Eliminar/".$c['IdCandidato'];
	$c['Nombres'] = htmlentities($c['Nombres']);
	$c['Apellidos'] = htmlentities($c['Apellidos']);
	$c['Cedula'] = htmlentities($c['Cedula']);
	$c['Partido'] = htmlentities($c['Partido']);
	$c['Nivel'] = htmlentities($c['Nivel']);
	echo <<<ROW
		<tr>
		<th scope='row'>{$c['IdCandidato']}</th>
		<td>{$c['Cedula']}</td>
		<td>{$c['Nombres']}</td>
		<td>{$c['Apellidos']}</td>
		<td>{$c['Nivel']}</td>
		<td>{$c['Partido']}</td>
		
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Candidato','Esta Seguro que desea eliminar este Candidato?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
ROW;
}

function AsgElecciones($e,$urlEleccion){
	$urlEditar = $urlEleccion."/Editar/".$e['IdEleccion'];
	$urlBorrar = $urlEleccion."/Eliminar/".$e['IdEleccion'];
	$urlDesactivar = $urlEleccion."/Desactivar/".$e['IdEleccion'];
	$urlActivar = $urlEleccion."/Activar/".$e['IdEleccion'];
	$e['Nombre'] = htmlentities($e['Nombre']);
	$e['FechaInicio'] = htmlentities($e['FechaInicio']);
	$e['FechaFin'] = htmlentities($e['FechaFin']);
	$e['HoraInicio'] = htmlentities($e['HoraInicio']);
	$e['HoraFin'] = htmlentities($e['HoraFin']);
	$e['Active'] = htmlentities($e['Active']);
	if($e['Active'] == "SI"){
		echo <<<ROW
		<tr class="info">
		<th scope='row'>{$e['IdEleccion']}</th>
		<td>{$e['Nombre']}</td>
		<td>{$e['FechaInicio']}</td>
		<td>{$e['FechaFin']}</td>
		<td>{$e['HoraInicio']}</td>
		<td>{$e['HoraFin']}</td>
		<td>
		<button type="button" style="margin-bottom: 10px; margin-left: 5px;" class="btn btn-warning pull-right"
		onclick="desactivar('Desactivar Eleccion','Esta Seguro que desea desactivar esta Eleccion?','question','Desactivar',
		'{$urlDesactivar}')"><i class="fa fa-bookmark"></i><strong> Desactivar</strong></button>
		<a type="button" style="margin-bottom: 10px; " class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Eleccion','Esta Seguro que desea eliminar esta Eleccion?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>

		</td>
ROW;
	}else{
	echo <<<ROW
		<tr>
		<th scope='row'>{$e['IdEleccion']}</th>
		<td>{$e['Nombres']}</td>
		<td>{$e['FechaInicio']}</td>
		<td>{$e['FechaFin']}</td>
		<td>{$e['HoraInicio']}</td>
		<td>{$e['HoraFin']}</td>
		<td>
		<button type="button" style="margin-bottom: 10px; margin-left: 5px;" class="btn btn-warning pull-right"
		onclick="activar('Activar Eleccion','Esta Seguro que desea activar esta Eleccion?','question','Activar',
		'{$urlActivar}')"><i class="fa fa-bookmark"></i><strong> Activar</strong></button>
		<a type="button" style="margin-bottom: 10px; " class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('Eliminar Eleccion','Esta Seguro que desea eliminar esta Eleccion?','question','Eliminar',
		'{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
		</td>
	
ROW;
	}
}
function AsgCasilla($casilla,$count){
	$detalle = array('IdNivel'=>$casilla['IdNivel'],'IdCandidato'=>$casilla['IdCandidato']);
	$niveles = json_encode($count);
	echo <<<CASILLA
	<div class="col-xl-2 p-1" style="min-width:220px;" >				
		<div class="card" style="min-height:400px">
			<img src="https://via.placeholder.com/200x150" class="w-100">
			<div class="card-body">
				<h5 class="card-title"><strong>{$casilla['Candidato']}</strong></h5>
				<p class="card-text"><strong>Partido:</strong> {$casilla['Partido']}</p>
				<p class="card-text"><strong>Color Representante:</strong>  {$casilla['Color']}</p>
				<button id="btn{$casilla['IdNivel']}" type="button" onclick="nuevo_detalle({$detalle['IdNivel']},
				{$detalle['IdCandidato']},niveles)" class="btn btn-outline-success w-100" >Votar</button>
			</div>
		</div>
	</div> 
	<script>
		niveles = $niveles;
	</script>
	
CASILLA;
}
