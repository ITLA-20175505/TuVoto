<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioCTR extends CI_Controller {

	public function Nuevo()
	{
		encabezado::aplicar('Nuevo Usuario');
		$this->load->view('FormUsuario');
		pie::aplicar();
	}

}

/* End of file Controllername.php */
