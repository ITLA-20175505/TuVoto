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
	static function partido_x_nombre($nombre,$IdEleccion){
        $CI =& get_instance();
        $partido = $CI->db
		->where('Nombre',$nombre)
		->where('IdEleccion',$IdEleccion)
        ->get('partidos')
        ->result_array();
		return $partido;
    }

    static function listado_partido(){
        $CI =& get_instance();
		$CI->db->select('p.*,e.Nombre as Eleccion');
		$CI->db->from('partidos p');
		$CI->db->join('elecciones e', 'p.IdEleccion = e.IdEleccion')
		->order_by('IdPartido ASC');
		$rs = $CI->db->get()->result_array();
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
