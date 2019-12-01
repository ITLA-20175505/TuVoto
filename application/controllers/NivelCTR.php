<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class NivelCTR extends CI_Controller {

	public function index()
	{
		$niveles = nivel_model::listado_nivel();
		encabezado::aplicar("Listado de Niveles de Elecciones");
		$this->load->view('ListadoNiveles',['niveles'=>$niveles]);
		pie::aplicar();
	}
	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Nivel");
		$this->load->view('FormNivel',['persona'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nuevo Nivel');
				$this->load->view('FormNivel',['persona'=>$data]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				
			}
		}
	}

}

/* End of file NivelCTR.php */
