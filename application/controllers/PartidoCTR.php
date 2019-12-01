<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class PartidoCTR extends CI_Controller {

	public function index()
	{
		$partidos = partido_model::listado_partido();
		encabezado::aplicar("Listado de Partidos");
		$this->load->view('ListadoPartidos',['partidos'=>$partidos]);
		pie::aplicar();
	}
	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Partido");
		$this->load->view('FormPartido',['partido'=>false,'eleccion'=>false,'error'=>""]);
		pie::aplicar();
		if($_POST){
			$partido = array("IdPartido"=>$_POST['IdPartido'],"Nombre"=>$_POST['Nombre'],
				'IdEleccion'=>$_POST['Eleccion'],'Color'=>$_POST['Color']);
			
			$duplicado = partido_model::partido_x_nombre($partido['Nombre'],$partido['IdEleccion']);
				if(count($duplicado) == 0){
					$rs = partido_model::guardar_partido($partido);
					redirect('CandidatoCTR');
				}else{
					$eleccion = eleccion_model::eleccion_x_id($partido['IdEleccion']);
					$partido['Error']="";
					encabezado::aplicar('Nuevo Partido');
					$this->load->view('FormPartido',['partido'=>$partido,'eleccion'=>$eleccion,
					'error'=>"Ya existe un Partido con este nombre"]);
					pie::aplicar();
				}
		}
	}
	public function Editar($id = 0)
	{
		$partido = partido_model::partido_x_id($id)[0];
		$eleccion = eleccion_model::eleccion_x_id($partido['IdEleccion']);
		encabezado::aplicar("Nuevo Partido");
		$this->load->view('FormPartido',['partido'=>$partido,'eleccion'=>$eleccion,'error'=>""]);
		pie::aplicar();
		if($_POST){
			$partido = array("IdPartido"=>$_POST['IdPartido'],"Nombre"=>$_POST['Nombre'],
				'IdEleccion'=>$_POST['Eleccion'],'Color'=>$_POST['Color']);
			$duplicado = partido_model::partido_x_nombre($partido['Nombre'],$partido['IdEleccion']);

			$mismoRegistro = partido_model::partido_x_id($partido['IdPartido'])[0];
		
			if(count($duplicado) == 0 || ($mismoRegistro['IdPartido'] == $duplicado[0]['IdPartido'] &&
			$mismoRegistro['Nombre'] == $partido['Nombre'])){
				partido_model::guardar_partido($partido);
				redirect('PartidoCTR');
			}else{
					$eleccion = eleccion_model::eleccion_x_id($partido['IdEleccion']);
					$partido['Error']="";
					encabezado::aplicar('Nuevo Partido');
					$this->load->view('FormPartido',['partido'=>$partido,'eleccion'=>$eleccion,
					'error'=>"Ya existe un Partido con este nombre"]);
					pie::aplicar();
				}
		}
	}

}

/* End of file NivelCTR.php */
