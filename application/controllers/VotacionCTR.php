<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class VotacionCTR extends CI_Controller {

	public function CasillaVotacion($id=0)
	{
		$votante = votacion_model::votacion_x_id($id);
		
		if(count($votante) > 0){
			$votante = $votante[0];
			$duplicado = votacion_model::verificar_detalle_x_id($votante['IdVotacion']);
			if(count($duplicado) > 0){
				$urlVotacion = base_url('index.php/PadronCTR');
				echo "<script>alert('Esta persona ya ha ejercido su voto')
				window.location = '{$urlVotacion}';</script>";
			}else{
				encabezado::aplicar("Casilla de Votacion");
				$this->load->view('Votacion',['persona'=>$votante,'IdVotacion'=>$id,'confirmacion'=>false]);
				pie::aplicar();
				if($_POST){
					$niveles = $_POST['niveles'];
					$candidatos = $_POST['candidatos'];
					$votos = array();
					foreach($niveles as $key=>$nivel){
	
						$votos[] = array('IdVotacion'=>$_POST['IdVotacion'],'IdNivel'=>$nivel,'IdCandidato'=>$candidatos[$key]); 
					}
					$urlVotacion = base_url('index.php/VotacionCTR/imprimirVoto/').$_POST['IdVotacion'];
					$rs = votacion_model::guardar_votos($votos);
					$confirmar =
					"  confirmacion('Aviso', 'El Voto fue enviado con exito', 'success', 'Imprimir Recibo', '$urlVotacion');";
					encabezado::aplicar("Nuevo Usuario");
					$this->load->view('Votacion',['persona'=>false,'IdVotacion'=>false,'confirmacion'=>$confirmar]);
					pie::aplicar();
				}
			}
		}else{
			$urlVotacion = base_url('index.php/PadronCTR');
			echo "<script>alert('No existe el voto')
			window.location = '{$urlVotacion}';</script>";
		}

	}
	public function imprimirVoto($Id){
		$votacion = votacion_model::resumen_votacion($Id);
		$this->load->view('reporte',['votacion'=>$votacion]);
	}

}

/* End of file VotacionCTR.php */
