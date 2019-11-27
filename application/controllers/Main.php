<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		encabezado::aplicar("Sistema Elecciones");
		$this->load->view('Inicio');
		pie::aplicar();
	}

}

/* End of file Controllername.php */
