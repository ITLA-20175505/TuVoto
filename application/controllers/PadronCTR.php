<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class PadronCTR extends CI_Controller {

	public function index()
	{
		$eleccion = eleccion_model::eleccion_x_Activo();
		if(count($eleccion)>0){
			$eleccion = $eleccion[0];
			encabezado::aplicar("Mesa Electoral No. 25");
			$this->load->view('FormPadron',['persona'=>false,'error'=>false,'confirmacion'=>false,
			'eleccion'=>$eleccion]);
			pie::aplicar();
		}else{
			$urlEleccion = base_url('index.php/EleccionCTR');
			echo "<script>alert('No hay Eleccion Activa')
			window.location = '{$urlEleccion}';</script>";
		}
	
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				$data['IdVotacion']="";
				encabezado::aplicar('Mesa Electoral No. 25');
				$this->load->view('FormPadron',['persona'=>$data,'error'=>false,'confirmacion'=>false]);
				pie::aplicar();
			}else if((isset($_POST['Cedula'])) && $_POST['Cedula']!=""){
				$nombres = explode(" ",$_POST['Nombres']);
				$votacion = array("IdVotacion"=>$_POST['IdVotacion'],"IdEleccion"=>$_POST['Eleccion'],
				'Cedula'=>$_POST['Cedula'],'Apellidos'=>$_POST['Apellidos'],
				'FechaNacimiento'=>$_POST['FechaNacimiento'],'Nombres'=>$nombres[0]);
				$duplicado = votacion_model::votacion_x_Cedula($votacion['Cedula']);
				if(count($duplicado) == 0){
					votacion_model::guardar_votacion($votacion);
					$urlVotacion = base_url('index.php/VotacionCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlVotacion');";
					encabezado::aplicar("Mesa Electoral No. 25");
					$this->load->view('FormPadron',['persona'=>false,'error'=>false,'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
					$Votacion['Error']="";
					encabezado::aplicar("Mesa Electoral No. 25");
					$this->load->view('FormPadron',['persona'=>$Votacion,
					'error'=>"Ya existe un Voto con este numero de Cedula",'confirmacion'=>false]);
					pie::aplicar();
				}
			}
		}
	}
}
