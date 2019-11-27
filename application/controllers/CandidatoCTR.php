<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CandidatoCTR extends CI_Controller {

	public function Nuevo()
	{
		encabezado::aplicar('Nuevo Candidato');
		$this->load->view('FormCandidato');
		pie::aplicar();
	}

}

/* End of file CandidatoCTR.php */
