<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCTR extends CI_Controller {

	public function index()
	{
		encabezado::aplicar('Reportes de Votaciones');
		$this->load->view('ReporteVotacion');
		pie::aplicar();
	}

}

/* End of file ReporteCTR.php */
