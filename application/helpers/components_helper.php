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
