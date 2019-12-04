<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class PadronCTR extends CI_Controller {

	public function index()
	{
		$eleccion = eleccion_model::eleccion_x_Activo();
		if(count($eleccion)>0){
			$eleccion = $eleccion[0];
			$hoy = date('Y-m-d H:i');
			$hoy=date('Y-m-d H:i', strtotime($hoy));
			$IFecha =  date('Y-m-d H:i', strtotime($eleccion['FechaInicio']));
			$TFecha =  date('Y-m-d H:i', strtotime($eleccion['FechaFin']));
		
			if ((($hoy >= $IFecha) && ($hoy <= $TFecha))){		
				encabezado::aplicar("Mesa Electoral No. 25");
				$this->load->view('FormPadron',['persona'=>false,'error'=>false,'confirmacion'=>false,
				'eleccion'=>$eleccion]);
				pie::aplicar();
				if($_POST){
					if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
						$cedula = $_POST['ConsultaCedula'];
						$cedula = str_replace('-', '', $cedula);
						$data = Padron::ConsultarPadron($cedula);
						$data['IdVotacion']="";
						encabezado::aplicar('Mesa Electoral No. 25');
						$duplicado = votacion_model::votacion_x_Cedula($data['Cedula']);
						if(count($duplicado) > 0){
							$this->load->view('FormPadron',['persona'=>false,'error'=>"Este Votante ya ejerció su derecho al voto",'confirmacion'=>false]);
						}else{
							$this->load->view('FormPadron',['persona'=>$data,'error'=>false,'confirmacion'=>false]);
						}
						pie::aplicar();
					}else if((isset($_POST['Cedula'])) && $_POST['Cedula']!=""){
						$cedula = $_POST['Cedula'];
						$cedula = str_replace('-', '', $cedula);
						$data = Padron::ConsultarPadron($cedula);
						$nombres = explode(" ",$data['Nombres']);
						$votacion = array("IdVotacion"=>'',"IdEleccion"=>$_POST['Eleccion'],
						'Cedula'=>$data['Cedula'],'Apellidos'=>$data['Apellidos'],'Foto'=>$data['Foto'],
						'FechaNacimiento'=>$data['FechaNacimiento'],'Nombres'=>$nombres[0]);
						$fechanacimiento = strtotime($data['FechaNacimiento']);
						$votacion['FechaNacimiento'] = date('Y-m-d', $fechanacimiento);
						$duplicado = votacion_model::votacion_x_Cedula($votacion['Cedula']);
						if(count($duplicado) == 0){
							$rs = votacion_model::guardar_votacion($votacion);
							$urlVotacion = base_url('index.php/VotacionCTR/CasillaVotacion/'.$rs['IdVotacion']);
							$confirmar =
							"confirmarSave('Aviso','Favor pasar al votante a la casilla de votacion','info',
							'OK','$urlVotacion');";
							encabezado::aplicar("Mesa Electoral No. 25");
							$this->load->view('FormPadron',['persona'=>false,'error'=>false,'confirmacion'=>$confirmar]);
							pie::aplicar();
						}else{
							
							$votacion['Error']="";
							$votacion['Foto']="";
							$votacion['LugarNacimiento'] = "";
							encabezado::aplicar("Mesa Electoral No. 25");
							$this->load->view('FormPadron',['persona'=>$votacion,
							'error'=>"Ya existe un Voto con este numero de Cedula",'confirmacion'=>false]);
							pie::aplicar();
						}
					}
				}	
			}else{
				$urlEleccion = base_url('index.php/EleccionCTR');
				echo "<script>alert('La Eleccion no esta disponible')
				</script>";
				// window.location = '{$urlEleccion}';
			}
		}else{
			$urlEleccion = base_url('index.php/EleccionCTR');
			echo "<script>alert('No hay Eleccion Activa')
			window.location = '{$urlEleccion}';</script>";
		}
	}
}
