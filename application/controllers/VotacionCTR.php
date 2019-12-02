<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class VotacionCTR extends CI_Controller {

	public function index()
	{
		encabezado::aplicar("Probando Votante 1");
		$this->load->view('Votacion',['persona'=>false]);
		pie::aplicar();
	}

}

/* End of file VotacionCTR.php */
