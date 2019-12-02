<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioCTR extends CI_Controller {

	public function index()
	{
		$usuarios = usuario_model::listado_usuario();
		encabezado::aplicar("Listado de Usuarios");
		$this->load->view('ListadoUsuarios',['usuarios'=>$usuarios]);
		pie::aplicar();
	}

	public function Nuevo()
	{
		encabezado::aplicar("Nuevo Usuario");
		$this->load->view('FormUsuario',['persona'=>false,'error'=>false,'confirmacion'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				$data['Contrasena']="";
				$data['IdUsuario']="";
				encabezado::aplicar('Nuevo Usuario');
				$this->load->view('FormUsuario',['persona'=>$data,'error'=>false,'confirmacion'=>false]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				$nombres = explode(" ",$_POST['Nombres']);
				$usuario = array("IdUsuario"=>$_POST['IdUsuario'],"IdRol"=>$_POST['Rol'],
				'Cedula'=>$_POST['Cedula'],'Contrasena'=>$_POST['Password'],
				'Apellidos'=>$_POST['Apellidos'],'Nombres'=>$nombres[0]);
				$duplicado = usuario_model::usuario_x_Cedula($usuario['Cedula']);
				if(count($duplicado) == 0){
					usuario_model::guardar_usuario($usuario);
					$urlUsuario = base_url('index.php/UsuarioCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlUsuario');";
					encabezado::aplicar("Nuevo Usuario");
					$this->load->view('FormUsuario',['persona'=>false,'error'=>false,'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
					$usuario['Error']="";
					encabezado::aplicar('Nuevo Usuario');
					$this->load->view('FormUsuario',['persona'=>$usuario,
					'error'=>"Ya existe un usuario con esta cedula",'confirmacion'=>false]);
					pie::aplicar();
				}
			}
		}
	}
	public function Editar($id = 0){
		$usuario = usuario_model::usuario_x_IdUsuario($id);
		$usuario[0]['Error']="";
		encabezado::aplicar("Editar Usuario Registrado");
		$this->load->view('FormUsuario',['persona'=>$usuario[0],'error'=>false,'confirmacion'=>false]);
		pie::aplicar();
		if($_POST){
			if(isset($_POST['ConsultaCedula']) && $_POST['ConsultaCedula']!= ""){
				$cedula = $_POST['ConsultaCedula'];
				$cedula = str_replace('-', '', $cedula);
				$data = Padron::ConsultarPadron($cedula);
				encabezado::aplicar('Nuevo Usuario');
				$this->load->view('FormUsuario',['persona'=>$data]);
				pie::aplicar();
			}else if(isset($_POST['Cedula']) && $_POST['Cedula']!=""){
				$nombres = explode(" ",$_POST['Nombres']);
				$usuario = array("IdUsuario"=>$_POST['IdUsuario'],"IdRol"=>$_POST['Rol'],
				'Cedula'=>$_POST['Cedula'],'Contrasena'=>$_POST['Password'],
				'Apellidos'=>$_POST['Apellidos'],'Nombres'=>$nombres[0]);
				$duplicado = usuario_model::usuario_x_Cedula($usuario['Cedula']);
				$mismoRegistro = usuario_model::usuario_x_IdUsuario($_POST['IdUsuario']);
				if((count($duplicado) == 1 || count($duplicado==0))&& 
				$mismoRegistro[0]['IdUsuario'] == $usuario['IdUsuario']){
					usuario_model::guardar_usuario($usuario);
					$urlUsuario = base_url('index.php/UsuarioCTR');
					$confirmar =
					"confirmarSave('Aviso','El Registro fue guardado exitosamente!','success',
					'OK','$urlUsuario');";
					encabezado::aplicar("Nuevo Usuario");
					$this->load->view('FormUsuario',['persona'=>false,'error'=>false,'confirmacion'=>$confirmar]);
					pie::aplicar();
				}else{
					$usuario['Error']="";
					encabezado::aplicar('Nuevo Usuario');
					$this->load->view('FormUsuario',['persona'=>$usuario,
					'error'=>"Ya existe un usuario con esta cedula",'confirmacion'=>false]);
					pie::aplicar();
				}
			}
		}
	}
	public function Eliminar($id=0){
		$rs = usuario_model::borrar($id);
		if($rs>0){
			redirect('UsuarioCTR');
		}
	}
}

/* End of file Controllername.php */
