<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EleccionCTR extends CI_Controller {

	public function index()
	{
		$elecciones = eleccion_model::listado_eleccion();
		encabezado::aplicar("Listado de Elecciones");
		$this->load->view('ListadoElecciones',['elecciones'=>$elecciones]);
		pie::aplicar();
	}
	public function EleccionActiva(){
		$eleccion = eleccion_model::eleccion_x_Activo();
		if(count($eleccion) > 0){
			$eleccion = $eleccion[0];
			$niveles = nivel_model::nivel_x_Eleccion($eleccion['IdEleccion']);
			$partidos = partido_model::partido_x_id($eleccion['IdEleccion']);
			$candidatos = candidato_model::candidato_x_Eleccion($eleccion['IdEleccion']);
			encabezado::aplicar("Eleccion Activa");
			$this->load->view('EleccionActiva',['eleccion'=>$eleccion,'niveles'=>$niveles,
			'partidos'=>$partidos,'candidatos'=>$candidatos]);
			pie::aplicar();
		}else{
			$urlEleccion = base_url('index.php/EleccionCTR');
			$sw = base_url('base/js/sweetalert.js');
		
			 echo "<script>alert('No hay Eleccion Activa')
			 window.location = '{$urlEleccion}';</script>";
		}
	}
	public function Nuevo()
	{	
		encabezado::aplicar("Nueva Eleccion");
		$this->load->view('FormEleccion',['eleccion'=>false,'error'=>false,'confirmacion'=>false]);
		pie::aplicar();
		if($_POST){
			$eleccion = array('IdEleccion'=>$_POST['IdEleccion'],'Nombre'=>$_POST['Nombre'],
			'FechaInicio'=>$_POST['FechaInicio'],'FechaFin'=>$_POST['FechaFin']);
			$duplicado = eleccion_model::eleccion_x_Nombre($eleccion['Nombre']);
			if(count($duplicado) == 0){
				$rs = eleccion_model::guardar_eleccion($eleccion);
				$urlActivar = base_url('index.php/EleccionCTR/Activar/').$rs['IdEleccion'];
				$urlEleccion = base_url('index.php/EleccionCTR');
				$confirmar =
				"activar('Registro Guardado','Desea Activar esta Eleccion?','success',
				'Activar','$urlActivar');";
				encabezado::aplicar("Nueva Eleccion");
				$this->load->view('FormEleccion',['eleccion'=>false,'error'=>false,
				'confirmacion'=>$confirmar]);
				pie::aplicar();
			}else{

				$eleccion['Error']="";
				encabezado::aplicar('Nueva Eleccion');
				$this->load->view('FormEleccion',['eleccion'=>$eleccion,
				'error'=>"Ya existe una Eleccion con este nombre",'confirmacion'=>false]);
				pie::aplicar();
			}
		}
	}
	public function Editar($id=0)
	{
		$eleccion = eleccion_model::eleccion_x_id($id);
		if(count($eleccion)> 0){
			$eleccion = $eleccion[0];
			$fechainicio = strtotime($eleccion['FechaInicio']);
			$fechafin = strtotime($eleccion['FechaFin']);
			$eleccion['FechaInicio'] = date('Y-m-d\TH:i', $fechainicio);
			$eleccion['FechaFin'] = date('Y-m-d\TH:i', $fechafin);
			encabezado::aplicar("Editar Eleccion");
			$this->load->view('FormEleccion',['eleccion'=>$eleccion,'error'=>false,'confirmacion'=>false]);
			pie::aplicar();
			if($_POST){
			
				$eleccion = array('IdEleccion'=>$_POST['IdEleccion'],'Nombre'=>$_POST['Nombre'],
				'FechaInicio'=>$_POST['FechaInicio'],'FechaFin'=>$_POST['FechaFin']);
				$duplicado = eleccion_model::eleccion_x_Nombre($eleccion['Nombre']);
				$mismoRegistro = eleccion_model::eleccion_x_id($eleccion['IdEleccion'])[0];
			
				if(count($duplicado) == 0 || ($mismoRegistro['IdEleccion'] == $duplicado[0]['IdEleccion'] &&
				$mismoRegistro['Nombre'] == $eleccion['Nombre'])){
					$rs = eleccion_model::guardar_eleccion($eleccion);
					$urlEleccion = base_url('index.php/EleccionCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlEleccion');";
					encabezado::aplicar("Nueva Eleccion");
					$this->load->view('FormEleccion',['eleccion'=>false,'error'=>false,
					'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
					$eleccion['Error']="";
					encabezado::aplicar('Nueva Eleccion');
					$this->load->view('FormEleccion',['eleccion'=>$eleccion,
					'error'=>"Ya existe una Eleccion con este nombre",'confirmacion'=>false]);
					pie::aplicar();
				}
			}
		}else{
			$urlEleccion = base_url('index.php/EleccionCTR');
			echo "<script>alert('No Existe la Eleccion')
			window.location = '{$urlEleccion}';</script>";
		}
	}
	public function Eliminar($id=0){
		$rs = eleccion_model::borrar($id);
		if($rs>0){
			redirect('EleccionCTR');
		}
	}
	public function Desactivar($id=0){
		$rs = eleccion_model::desactivar($id);
		if($rs>0){
			redirect('EleccionCTR');
		}
	}
	public function Activar($id=0){
		$rs = eleccion_model::activar($id);
		if($rs>0){
			redirect('EleccionCTR');
		}
	}

}

/* End of file Controllername.php */
