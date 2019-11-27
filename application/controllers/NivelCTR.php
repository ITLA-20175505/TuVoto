<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class NivelCTR extends CI_Controller {

	public function Nuevo()
	{
		encabezado::aplicar('Nuevo Nivel de Eleccion');
		$this->load->view('FormNivel');
		pie::aplicar();
	}

}

/* End of file NivelCTR.php */
