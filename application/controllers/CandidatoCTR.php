<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatoCTR extends CI_Controller {


	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Candidatos");
		$this->load->view('FormCandidato',['persona'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nuevo Candidato');
				$this->load->view('FormCandidato',['persona'=>$data]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				
			}
		}
	}

}

/* End of file CandidatoCTR.php */
