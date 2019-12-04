<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$filtros = array();
		$filtros['Cant_Admin'] = filtros_model::cant_admin();
		$filtros['Cant_Facilitador'] = filtros_model::cant_facilitador();
		$filtros['Cant_Partidos'] = filtros_model::cant_Partidos();
		$filtros['Cant_Candidatos'] = filtros_model::cant_Candidatos();
		$filtros['Cant_Niveles'] = filtros_model::cant_Niveles();
		$filtros['Cant_Votos'] = filtros_model::cant_Votos();
		$filtros['Dias_Restantes'] = filtros_model::cant_dias()['DiasFaltantes'];
		encabezado::aplicar("Sistema Elecciones");
		$this->load->view('Inicio',['filtros'=>$filtros]);
		pie::aplicar();
	}

}

/* End of file Controllername.php */
