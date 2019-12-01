<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_model extends CI_Model {

	
    public function __construct(){
        parent::__construct();
    }

    static function guardar_usuario($usuario){
        $CI =& get_instance();
        $result = null;
        if (isset($usuario['IdUsuario']) && $usuario['IdUsuario'] >0) {
            $CI->db->where('IdUsuario', $usuario['IdUsuario']);
            $CI->db->update('usuarios', $usuario);
            $result = array('Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);
        }else{
            $CI->db->insert('usuarios', $usuario);
            $result = array('IdUsuario'=>$CI->db->insert_id(),
            'Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);

        }
        return $result;
    }

    static function usuario_x_IdUsuario($IdUsuario){
        $CI =& get_instance();
        $usuario = $CI->db
        ->where('IdUsuario',$IdUsuario)
        ->get('usuarios')
        ->result_array();
        return $usuario;
	}
	static function usuario_x_Cedula($Cedula){
        $CI =& get_instance();
        $usuario = $CI->db
        ->where('Cedula',$Cedula)
        ->get('usuarios')
        ->result_array();
        return $usuario;
    }

    static function listado_usuario(){
        $CI =& get_instance();
        
		$CI->db->select('u.*,r.Nombre as Rol');
		$CI->db->from('usuarios u');
		$CI->db->join('roles r', 'u.IdRol = r.IdRol')
		->order_by('IdUsuario ASC');
		$rs = $CI->db->get()->result_array();
		 return $rs;
	}
	static function listado_roles(){
        $CI =& get_instance();
        
        $rs = $CI->db->get('roles')->result_array();
        return $rs;
    }

    static function borrar($IdUsuario){
        $CI =& get_instance();
        $sql = "delete from usuarios where IdUsuario=?";
        $CI->db->query($sql, [$IdUsuario]);
        return $CI->db->affected_rows();
    }
    static function inicio_sesion($usr, $psw){
        $CI =& get_instance();
        $rs = $CI->db
        ->where(array(
            'cedula'=>$usr,
            'contrasena'=>$psw))
        ->get('usuarios')
        ->result_array();
        if(count($rs)>0){
            return array("login"=>true, "IdUsuarioUsuario"=>$rs[0]['IdUsuarioUsuario']);
        } else {
            return array("login"=>false);
        }
        return null;
     
    }
    
}

/* End of file ModelName.php */
