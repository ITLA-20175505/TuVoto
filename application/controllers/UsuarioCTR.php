<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioCTR extends CI_Controller {

	public function index()
	{
		
	}

	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Usuario");
		$this->load->view('FormUsuario',['persona'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nuevo Usuario');
				$this->load->view('FormUsuario',['persona'=>$data]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				
			}
		}
		
	}

}

/* End of file Controllername.php */
