<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class NivelCTR extends CI_Controller {

	public function index()
	{
		$niveles = nivel_model::listado_nivel();
		encabezado::aplicar("Listado de Niveles de Elecciones");
		$this->load->view('ListadoNiveles',['niveles'=>$niveles]);
		pie::aplicar();
	}
	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Nivel");
		$this->load->view('FormNivel',['nivel'=>false,'eleccion'=>false,'error'=>"",'confirmacion'=>false]);
		pie::aplicar();
		if($_POST){
			$nivel = array("IdNivel"=>$_POST['IdNivel'],"Nombre"=>$_POST['Nombre'],
				'IdEleccion'=>$_POST['Eleccion']);
			
			$duplicado = nivel_model::nivel_x_Nombre($nivel['Nombre'],$nivel['IdEleccion']);
				if(count($duplicado) == 0){
					$rs = nivel_model::guardar_nivel($nivel);
					$urlNivel = base_url('index.php/NivelCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlNivel');";
					encabezado::aplicar("Nuevo Nivel");
					$this->load->view('FormNivel',
					['nivel'=>false,'eleccion'=>false,'error'=>"",'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
					$eleccion = eleccion_model::eleccion_x_id($nivel['IdEleccion']);
					$nivel['Error']="";
					encabezado::aplicar('Nuevo nivel');
					$this->load->view('FormNivel',['nivel'=>$nivel,'eleccion'=>$eleccion,
					'error'=>"Ya existe un Nivel con este nombre",'confirmacion'=>false]);
					pie::aplicar();
				}
		}
	}
	public function Editar($id = 0)
	{
		$nivel = nivel_model::nivel_x_id($id);
		if(count($nivel) > 0){
			$nivel = $nivel[0];
			$eleccion = eleccion_model::eleccion_x_id($nivel['IdEleccion']);
			encabezado::aplicar("Nuevo Nivel");
			$this->load->view('FormNivel',['nivel'=>$nivel,'eleccion'=>$eleccion,'error'=>"",'confirmacion'=>false]);
			pie::aplicar();
			if($_POST){
				$nivel = array("IdNivel"=>$_POST['IdNivel'],"Nombre"=>$_POST['Nombre'],
					'IdEleccion'=>$_POST['Eleccion']);
				$duplicado = nivel_model::nivel_x_nombre($nivel['Nombre'],$nivel['IdEleccion']);

				$mismoRegistro = nivel_model::nivel_x_id($nivel['IdNivel'])[0];
			
				if(count($duplicado) == 0 || ($mismoRegistro['IdNivel'] == $duplicado[0]['IdNivel'] &&
				$mismoRegistro['Nombre'] == $nivel['Nombre'])){
					nivel_model::guardar_nivel($nivel);
					$urlNivel = base_url('index.php/NivelCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlNivel');";
					encabezado::aplicar("Nuevo Nivel");
					$this->load->view('FormNivel',
					['nivel'=>false,'eleccion'=>false,'error'=>"",'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
						$eleccion = eleccion_model::eleccion_x_id($nivel['IdEleccion']);
						$nivel['Error']="";
						encabezado::aplicar('Nuevo Nivel');
						$this->load->view('FormNivel',['nivel'=>$nivel,'eleccion'=>$eleccion,
						'error'=>"Ya existe un Nivel con este nombre",'confirmacion'=>false]);
						pie::aplicar();
					}
			}
		}else{
			$urlNivel = base_url('index.php/NivelCTR');
			echo "<script>alert('No Existe el Nivel')
			window.location = '{$urlNivel}';</script>";
		}
	}
	public function Eliminar($id=0){
		$rs = nivel_model::borrar($id);
		if($rs>0){
			redirect('NivelCTR');
		}
	}
}

/* End of file NivelCTR.php */
