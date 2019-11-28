<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class PartidoCTR extends CI_Controller {

	public function index()
	{
		encabezado::aplicar("Nuevo Partido");
		$this->load->view('FormPartido',['persona'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nuevo Nivel');
				$this->load->view('FormPartido',['persona'=>$data]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				
			}
		}
	}
	public function Nuevo()
	{
		encabezado::aplicar('Nuevo Nivel de Eleccion');
		$this->load->view('FormNivel');
		pie::aplicar();
	}

}

/* End of file NivelCTR.php */
