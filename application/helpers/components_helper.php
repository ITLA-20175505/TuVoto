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
		onclick="eliminar('{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
}
function AsgPartidos($p,$urlPartido){

	$urlEditar = $urlPartido."/Editar/".$p['IdPartido'];
	$urlBorrar = $urlPartido."/Eliminar/".$p['IdPartido'];
	$p['Nombre'] = htmlentities($p['Nombre']);
	$p['Color'] = htmlentities($p['Color']);
	$p['Eleccion'] = htmlentities($p['Eleccion']);
	echo <<<ROW
		<tr>
		<th scope='row'>{$p['IdPartido']}</th>
		<td>{$p['Nombre']}</td>
		<td>{$p['Color']}</td>
		<td>{$p['Eleccion']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
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
		onclick="eliminar('{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
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
		onclick="eliminar('{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
}
function AsgElecciones($e,$urlEleccion){
	$urlEditar = $urlEleccion."/Editar/".$e['IdEleccion'];
	$urlBorrar = $urlEleccion."/Eliminar/".$e['IdEleccion'];
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
		<td>{$e['Active']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
	}else{
	echo <<<ROW
		<tr>
		<th scope='row'>{$e['IdEleccion']}</th>
		<td>{$e['Nombre']}</td>
		<td>{$e['FechaInicio']}</td>
		<td>{$e['FechaFin']}</td>
		<td>{$e['HoraInicio']}</td>
		<td>{$e['HoraFin']}</td>
		<td>{$e['Active']}</td>
		<td><a type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-primary pull-right"
		href="{$urlEditar}" ><i class="fa fa-edit"></i><strong> Editar</strong></a>
		<button type="button" style="margin-bottom: 10px; margin-right: 5px;" class="btn btn-danger pull-right"
		onclick="eliminar('{$urlBorrar}')"><i class="fa fa-trash"></i><strong> Eliminar</strong></button>
	
ROW;
	}
}
