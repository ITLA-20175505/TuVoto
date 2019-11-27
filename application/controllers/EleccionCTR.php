<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EleccionCTR extends CI_Controller {

	public function Nuevo()
	{
		encabezado::aplicar('Nueva Eleccion');
		$this->load->view('FormEleccion');
	}

}

/* End of file Controllername.php */
