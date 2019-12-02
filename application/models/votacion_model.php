<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class votacion_model extends CI_Model {

	public function __construct(){
        parent::__construct();
    }

    static function guardar_votacion($votacion){
        $CI =& get_instance();
        $result = null;
        if (isset($votacion['IdVotacion']) && $votacion['IdVotacion'] >0) {
            $CI->db->where('IdVotacion', $votacion['IdVotacion']);
            $CI->db->update('votaciones', $votacion);
            $result = array('Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);
        }else{
            $CI->db->insert('votaciones', $votacion);
            $result = array('IdVotacion'=>$CI->db->insert_id(),
            'Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);

        }
        return $result;
    }

    static function votacion_x_id($id){
        $CI =& get_instance();
        $votacion = $CI->db
        ->where('IdVotacion',$id)
        ->get('votaciones')
        ->result_array();
        return $votacion;
    }
	static function votacion_x_Cedula($Cedula){
        $CI =& get_instance();
        $votacion = $CI->db
        ->where('Cedula',$Cedula)
        ->get('votaciones')
        ->result_array();
        return $votacion;
	}
	static function votacion_x_Eleccion($IdEleccion){
		$CI =& get_instance();
		$rs = $CI->db->where('IdEleccion',$IdEleccion)
		->order_by('IdVotacion ASC')
		->get('votaciones')
		->result_array();
		 return $rs;
    }
    static function listado_votacion(){
        $CI =& get_instance();
		$rs = $CI->db->where('Active=true')
		->order_by('IdVotacion ASC')
		->get('votaciones')
		->result_array();
		return $rs;
    }

    static function borrar($id){
        $CI =& get_instance();
        $sql = "update votaciones set Active=false where IdVotacion=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
    }

}

/* End of file votacion_model.php */
