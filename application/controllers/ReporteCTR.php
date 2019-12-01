<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCTR extends CI_Controller {

	public function index()
	{
		encabezado::aplicar('Reportes');
		$this->load->view('Reporte');
		pie::aplicar();
	}

}

/* End of file ReporteCTR.php */
