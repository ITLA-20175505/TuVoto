<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class PadronCTR extends CI_Controller {

	public function index()
	{
		encabezado::aplicar("Mesa Electoral No. 25");
		$this->load->view('FormPadron',['persona'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Mesa Electoral No. 25');
				$this->load->view('FormPadron',['persona'=>$data]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				
			}
		}
	}
}