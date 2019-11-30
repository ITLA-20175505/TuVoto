<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class PartidoCTR extends CI_Controller {

	public function index()
	{
	
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

}

/* End of file NivelCTR.php */
