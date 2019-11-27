<?php

function asgInput($label,$nombre,$type,$holder='',$value='',$required=''){
return <<<COMPONENTE
<div class="form-group col-md-6">
<label for="{$nombre}">{$label}</label>
<input type="{$type}" {$required}  class="form-control " id="{$nombre}" name="{$nombre}" placeholder="{$holder}" value="{$value}">
</div>
COMPONENTE;
    
}
function asgTextArea($label,$nombre,$value='',$required=''){
  return <<<COMPONENTE
  <div class="form-group col-md-6">
  <label for="{$nombre}">{$label}</label>
  <textarea id="{$nombre}" name="{$nombre}" class="md-textarea form-control" rows="3" {$required}>{$value}</textarea>
  </div>
  COMPONENTE;
      
  }

function asgTableValueEmpresa($empresa){
    echo <<<CODIGO
    <tr>
    <th scope='row'>{$empresa['idEmpresa']}</th>
    <td>{$empresa['nombre']}</td>
    <td>{$empresa['rnc']}</td>
    <td>{$empresa['color']}</td>
    <td>{$empresa['aportes']}</td>
    <td>{$empresa['cantidad']}</td>
    <td>{$empresa['promedio']}</td>
    <td><button type="button" style="margin-left: 5px; margin-right: 5px;" class="btn btn-primary pull-right"
    onclick="editarEmpresa({$empresa['idEmpresa']})"><i class="fa fa-edit"></i></button>

    <button type="button" data-toggle="modal" data-target="#MDDelete" data-id="{$empresa['idEmpresa']}"  
    data-accion="DELEmpresa" data-title="Eliminar Registro de Empresa" 
    data-body="Seguro de Eliminar la empresa {$empresa['nombre']} con un total de aporte de {$empresa['aportes']} ?"  
    class='btn btn-danger pull-right'>
      <i class='fa fa-user-times'></i></button></td>
    </tr>
CODIGO;
}
function asgTableValueTotalEmpresa($datos){
  echo <<<CODIGO
  <tr>
  <th scope='row'>Total Recaudado: $ {$datos->total}</th>
  <th scope='row'>Empleados Registrados: {$datos->empleados}</th>
  <th scope='row'>Empresas: {$datos->cantidad}</th>
  CODIGO;
}
function asgTableValueEmpleado($empleado){
  echo <<<CODIGO
  <tr>
  <th scope='row'>{$empleado['cedula']}</th>
  <td>{$empleado['nombre']}</td>
  <td>{$empleado['donacion']}</td>
  <td> <button type="button" style="margin-left: 5px; margin-right: 5px;" class="btn btn-primary pull-right" data-toggle="modal" 
  data-target="#empleadoModal" data-idEmpresa="{$empleado['idEmpresa']}" data-cedula="{$empleado['cedula']}" data-nombre="{$empleado['nombre']}" 
  data-donacion="{$empleado['donacion']}" data-title="Editar Registro de Empleado" ><i class="fa fa-edit">
  </i></button>

  <button type="button" data-toggle="modal" data-target="#MDelete" data-id="{$empleado['idEmpresa']}"  
  data-cedula="{$empleado['cedula']}"  data-accion="DELEmpleado" data-title="Eliminar Registro de Empleado" 
  data-body="Seguro de Eliminar el registro de {$empleado['nombre']} ?"  
  class='btn btn-danger pull-right'>
    <i class='fa fa-user-times'></i></button></td>
  </tr>
CODIGO;
}



function asgInput2($nombre, $label,$valor="",$validar=""){
    return <<<CODIGO
    <div class="input-group mb-3">
    <div class="input-group-prepend">
    <label style="color:red; text-align: center; align-content: center; font-weight: bold;" >{$validar}</label>
       <span class="input-group-text" id="basic-addon1">{$label}</span>
    </div>
    <input type="text" class="form-control" value ="{$valor}" name="{$nombre}" placeholder="{$label}" aria-label="{$label}" aria-describedby="basic-addon1">
    </div>
    CODIGO;
}
