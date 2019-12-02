<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatoCTR extends CI_Controller {
	public function index()
	{
		$candidatos = candidato_model::listado_candidato();
		encabezado::aplicar("Listado de Candidatos Postulados");
		$this->load->view('ListadoCandidatos',['candidatos'=>$candidatos]);
		pie::aplicar();
	}

	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Candidato");
		$this->load->view('FormCandidato',['persona'=>false,'error'=>false,'confirmacion'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nuevo Candidato');
				$this->load->view('FormCandidato',['persona'=>$data,'error'=>false,'confirmacion'=>false]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				$nombres = explode(" ",$_POST['Nombres']);
				$Candidato = array("IdCandidato"=>$_POST['IdCandidato'],"IdPartido"=>$_POST['Partido'],
				'IdNivel'=>$_POST['Nivel'],'Cedula'=>$_POST['Cedula'],'Apellidos'=>$_POST['Apellidos'],
				'Nombres'=>$nombres[0]);
				$duplicado = Candidato_model::Candidato_x_Cedula($Candidato['Cedula']);
				if(count($duplicado) == 0){
					Candidato_model::guardar_Candidato($Candidato);
					$urlCandidato = base_url('index.php/CandidatoCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlCandidato');";
					encabezado::aplicar("Nuevo Candidato");
					$this->load->view('FormCandidato',['persona'=>false,'error'=>false,'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
					$Candidato['Error']="";
					encabezado::aplicar('Nuevo Candidato');
					$this->load->view('FormCandidato',['persona'=>$Candidato,
					'error'=>"Ya existe un Candidato con esta cedula",'confirmacion'=>false]);
					pie::aplicar();
				}
			}
		}
	}
	public function Editar($id = 0){
		$Candidato = Candidato_model::candidato_x_id($id);
		$Candidato[0]['Error']="";
		encabezado::aplicar("Editar Candidato Registrado");
		$this->load->view('FormCandidato',['persona'=>$Candidato[0],'error'=>false,'confirmacion'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nuevo Candidato');
				$this->load->view('FormCandidato',['persona'=>$data,'error'=>false,'confirmacion'=>false]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				$nombres = explode(" ",$_POST['Nombres']);
				$Candidato = array("IdCandidato"=>$_POST['IdCandidato'],"IdPartido"=>$_POST['Partido'],
				'IdNivel'=>$_POST['Nivel'],'Cedula'=>$_POST['Cedula'],'Apellidos'=>$_POST['Apellidos'],
				'Nombres'=>$nombres[0]);
				$duplicado = Candidato_model::Candidato_x_Cedula($Candidato['Cedula']);
				$mismoRegistro = Candidato_model::candidato_x_id($_POST['IdCandidato']);
				if((count($duplicado) == 1 || count($duplicado)==0)&& 
				$mismoRegistro[0]['IdCandidato'] == $Candidato['IdCandidato']){
					Candidato_model::guardar_Candidato($Candidato);
					$urlCandidato = base_url('index.php/CandidatoCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlCandidato');";
					encabezado::aplicar("Nuevo Candidato");
					$this->load->view('FormCandidato',['persona'=>false,'error'=>false,'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
					$Candidato['Error']="";
					encabezado::aplicar('Nuevo Candidato');
					$this->load->view('FormCandidato',['persona'=>$Candidato,
					'error'=>"Ya existe un Candidato con esta cedula",'confirmacion'=>false]);
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
