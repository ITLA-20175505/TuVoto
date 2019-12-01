<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EleccionCTR extends CI_Controller {

	public function index()
	{
		$elecciones = eleccion_model::listado_eleccion();
		encabezado::aplicar("Listado de Elecciones");
		$this->load->view('ListadoElecciones',['elecciones'=>$elecciones]);
		pie::aplicar();
	}

	public function Nuevo()
	{
		encabezado::aplicar("Nueva Eleccion");
		$this->load->view('FormEleccion',['eleccion'=>false,'error'=>false]);
		pie::aplicar();
		if($_POST){
			$eleccion = array('IdEleccion'=>$_POST['IdEleccion'],'Nombre'=>$_POST['Nombre'],
			'FechaInicio'=>$_POST['FechaInicio'],'FechaFin'=>$_POST['FechaFin'],'HoraInicio'=>$_POST['HoraInicio'],
			'HoraFin'=>$_POST['HoraFin'],'Active'=>$_POST['Active']);
			$duplicado = eleccion_model::eleccion_x_Nombre($eleccion['Nombre']);
			if(count($duplicado) == 0){
				$rs = eleccion_model::guardar_eleccion($eleccion);
				redirect('EleccionCTR');
			}else{
				$eleccion['Error']="";
				encabezado::aplicar('Nueva Eleccion');
				$this->load->view('FormEleccion',['eleccion'=>$eleccion,
				'error'=>"Ya existe un Partido con este nombre"]);
				pie::aplicar();
			}
		}
	}
	public function Editar($id=0)
	{
		$eleccion = eleccion_model::eleccion_x_id($id)[0];
		encabezado::aplicar("Editar Eleccion");
		$this->load->view('FormEleccion',['eleccion'=>$eleccion,'error'=>false]);
		pie::aplicar();
		if($_POST){
			$eleccion = array('IdEleccion'=>$_POST['IdEleccion'],'Nombre'=>$_POST['Nombre'],
			'FechaInicio'=>$_POST['FechaInicio'],'FechaFin'=>$_POST['FechaFin'],'HoraInicio'=>$_POST['HoraInicio'],
			'HoraFin'=>$_POST['HoraFin'],'Active'=>$_POST['Active']);
			$duplicado = eleccion_model::eleccion_x_Nombre($eleccion['Nombre']);
			$mismoRegistro = eleccion_model::eleccion_x_id($eleccion['IdEleccion'])[0];
		
			if(count($duplicado) == 0 || ($mismoRegistro['IdEleccion'] == $duplicado[0]['IdEleccion'] &&
			$mismoRegistro['Nombre'] == $eleccion['Nombre'])){
				$rs = eleccion_model::guardar_eleccion($eleccion);
				redirect('EleccionCTR');
			}else{
				$eleccion['Error']="";
				encabezado::aplicar('Nueva Eleccion');
				$this->load->view('FormEleccion',['eleccion'=>$eleccion,
				'error'=>"Ya existe un Partido con este nombre"]);
				pie::aplicar();
			}
		}
	}
	public function Eliminar($id=0){
		$rs = eleccion_model::borrar($id);
		if($rs>0){
			redirect('EleccionCTR');
		}
	}

}

/* End of file Controllername.php */
