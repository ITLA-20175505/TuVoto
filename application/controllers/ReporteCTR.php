<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCTR extends CI_Controller {

	public function index()
	{
		encabezado::aplicar('Reportes de Votaciones');
		$this->load->view('ReporteVotacion');
		pie::aplicar();
	}
	public function ImprimirReporte(){
		$this->load->view('ImprimirReportes',['eleccion'=>false]);
	}
	public function Imprimir($id=0){
		$eleccion = eleccion_model::eleccion_x_id($id);
		if(count($eleccion) > 0){
			$this->load->view('ImprimirReportes',['eleccion'=>$eleccion]);
		}else{
			$urlEleccion = base_url('index.php/EleccionCTR');
			echo "<script>alert('No existe la Eleccion')
			window.location = '{$urlEleccion}';</script>";
		}
	}

}

/* End of file ReporteCTR.php */
