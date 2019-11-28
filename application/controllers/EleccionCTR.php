<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EleccionCTR extends CI_Controller {

	public function index()
	{
		encabezado::aplicar("Nueva Eleccion");
		$this->load->view('FormEleccion',['persona'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nueva Eleccion');
				$this->load->view('FormEleccion',['persona'=>$data]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				
			}
		}
	}
	public function Nuevo()
	{
		encabezado::aplicar('Nueva Eleccion');
		$this->load->view('FormEleccion');
	}

}

/* End of file Controllername.php */
