<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class eleccion_model extends CI_Model {
	public function __construct(){
        parent::__construct();
    }

    static function guardar_eleccion($eleccion){
        $CI =& get_instance();
        $result = null;
        if (isset($eleccion['IdEleccion']) && $eleccion['IdEleccion'] >0) {
            $CI->db->where('IdEleccion', $eleccion['IdEleccion']);
            $CI->db->update('elecciones', $eleccion);
            $result = array('Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);
        }else{
            $CI->db->insert('elecciones', $eleccion);
            $result = array('IdEleccion'=>$CI->db->insert_id(),
            'Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);

        }
        return $result;
    }

    static function eleccion_x_id($id){
        $CI =& get_instance();
        $eleccion = $CI->db
        ->where('IdEleccion',$id)
        ->get('elecciones')
        ->result_array();
        return $eleccion;
	}
	static function eleccion_x_Nombre($nombre){
        $CI =& get_instance();
        $eleccion = $CI->db
        ->where('Nombre',$nombre)
        ->get('elecciones')
        ->result_array();
        return $eleccion;
    }

	static function eleccion_x_Activo(){
        $CI =& get_instance();
        $eleccion = $CI->db
        ->where('Active',true)
        ->get('elecciones')
        ->result_array();
        return $eleccion;
    }

    static function listado_eleccion(){
        $CI =& get_instance();
        
		$rs = $CI->db->get('elecciones')->result_array();
		foreach($rs as $key=>$eleccion){
			if($eleccion['Active']== true){
				$rs[$key]['Active'] = "SI";
			}else{
				$rs[$key]['Active'] = "NO";
			}
		}
        return $rs;
    }

    static function borrar($id){
        $CI =& get_instance();
        $sql = "delete from elecciones where IdEleccion=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
    }

	

}

/* End of file eleccion_model.php */
