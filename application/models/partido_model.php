<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class partido_model extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

    static function guardar_partido($partido){
        $CI =& get_instance();
        $result = null;
        if (isset($partido['IdPartido']) && $partido['IdPartido'] >0) {
            $CI->db->where('IdPartido', $partido['IdPartido']);
            $CI->db->update('partidos', $partido);
            $result = array('Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);
        }else{
            $CI->db->insert('partidos', $partido);
            $result = array('IdPartido'=>$CI->db->insert_id(),
            'Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);

        }
        return $result;
    }

    static function partido_x_id($id){
        $CI =& get_instance();
        $partido = $CI->db
        ->where('IdPartido',$id)
        ->get('partidos')
        ->result_array();
        return $partido;
	}
	static function partido_x_Cedula($Cedula){
        $CI =& get_instance();
        $usuario = $CI->db
        ->where('Cedula',$Cedula)
        ->get('partidos')
        ->result_array();
        return $usuario;
    }

    static function listado_partido(){
        $CI =& get_instance();
        
        $rs = $CI->db->get('partidos')->result_array();
        return $rs;
    }

    static function borrar($id){
        $CI =& get_instance();
        $sql = "delete from partidos where IdPartido=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
    }

}

/* End of file partido_model.php */
