<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class VotacionCTR extends CI_Controller {

	public function CasillaVotacion($id=0)
	{
		$votante = votacion_model::votacion_x_id($id);
		if(count($votante) > 0){
			$votante = $votante[0];
			
			encabezado::aplicar("Casilla de Votacion");
			$this->load->view('Votar',['persona'=>$votante]);
			pie::aplicar();
		}else{
			$urlVotacion = base_url('index.php/PadronCTR');
			echo "<script>alert('No existe el voto')
			window.location = '{$urlVotacion}';</script>";
		}

	}

}

/* End of file VotacionCTR.php */
