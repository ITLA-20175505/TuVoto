<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatoCTR extends CI_Controller {
	public function index()
	{
		
	}

	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Candidato");
		$this->load->view('FormCandidato',['persona'=>false,'error'=>false]);
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
				$nombres = explode(" ",$_POST['Nombres']);
				$Candidato = array("IdCandidato"=>$_POST['IdCandidato'],"IdPartido"=>$_POST['Partido'],
				'IdNivel'=>$_POST['Nivel'],'Cedula'=>$_POST['Cedula'],'Apellidos'=>$_POST['Apellidos'],
				'Nombres'=>$nombres[0]);
				$duplicado = Candidato_model::Candidato_x_Cedula($Candidato['Cedula']);
				if(count($duplicado) == 0){
					Candidato_model::guardar_Candidato($Candidato);
					// redirect('CandidatoCTR');
				}else{
					$Candidato['Error']="";
					encabezado::aplicar('Nuevo Candidato');
					$this->load->view('FormCandidato',['persona'=>$Candidato,
					'error'=>"Ya existe un Candidato con esta cedula"]);
					pie::aplicar();
				}
			}
		}
	}
	public function Editar($id = 0){
		$Candidato = Candidato_model::Candidato_x_IdCandidato($id);
		$Candidato[0]['Error']="";
		encabezado::aplicar("Editar Candidato Registrado");
		$this->load->view('FormCandidato',['persona'=>$Candidato[0],'error'=>false]);
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
				$nombres = explode(" ",$_POST['Nombres']);
				$Candidato = array("IdCandidato"=>$_POST['IdCandidato'],"IdPartido"=>$_POST['Partido'],
				'IdNivel'=>$_POST['Nivel'],'Cedula'=>$_POST['Cedula'],'Apellidos'=>$_POST['Apellidos'],
				'Nombres'=>$nombres[0]);
				$duplicado = Candidato_model::Candidato_x_Cedula($Candidato['Cedula']);
				$mismoRegistro = Candidato_model::Candidato_x_IdCandidato($_POST['IdCandidato']);
				if((count($duplicado) == 1 || count($duplicado==0))&& 
				$mismoRegistro[0]['IdCandidato'] == $Candidato['IdCandidato']){
					Candidato_model::guardar_Candidato($Candidato);
					redirect('CandidatoCTR');
				}else{
					$Candidato['Error']="";
					encabezado::aplicar('Nuevo Candidato');
					$this->load->view('FormCandidato',['persona'=>$Candidato,
					'error'=>"Ya existe un Candidato con esta cedula"]);
					pie::aplicar();
				}
			}
		}
	}
	public function Eliminar($id=0){
		$rs = Candidato_model::borrar($id);
		if($rs>0){
			redirect('CandidatoCTR');
		}
	}
}

/* End of file CandidatoCTR.php */
