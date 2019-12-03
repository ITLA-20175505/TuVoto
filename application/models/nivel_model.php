<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class nivel_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    static function guardar_nivel($nivel){
        $CI =& get_instance();
        $result = null;
        if (isset($nivel['IdNivel']) && $nivel['IdNivel'] >0) {
            $CI->db->where('IdNivel', $nivel['IdNivel']);
            $CI->db->update('niveles', $nivel);
            $result = array('Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);
        }else{
            $CI->db->insert('niveles', $nivel);
            $result = array('IdNivel'=>$CI->db->insert_id(),
            'Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);

        }
        return $result;
    }

    static function nivel_x_id($id){
        $CI =& get_instance();
        $nivel = $CI->db
        ->where('IdNivel',$id)
        ->get('niveles')
        ->result_array();
        return $nivel;
    }
	static function nivel_x_nombre($nombre,$IdEleccion){
        $CI =& get_instance();
        $nivel = $CI->db
		->where('Nombre',$nombre)
		->where('IdEleccion',$IdEleccion)
        ->get('niveles')
        ->result_array();
		return $nivel;
    }
	static function nivel_x_Eleccion($IdEleccion){
        $CI =& get_instance();
        $niveles = $CI->db
        ->where('IdEleccion',$IdEleccion)
        ->get('niveles')
        ->result_array();
        return $niveles;
    }
    static function Id_niveles_x_Eleccion($IdEleccion){
        $CI =& get_instance();
        $niveles = $CI->db
        ->select('IdNivel')
        ->where('IdEleccion',$IdEleccion)
        ->get('niveles')
        ->result_array();
        return $niveles;
    }
    static function nombre_niveles_x_Eleccion($IdEleccion){
        $CI =& get_instance();
        $niveles = $CI->db
        ->select('Nombre')
        ->where('IdEleccion',$IdEleccion)
        ->get('niveles')
        ->result_array();
        return $niveles;
    }
    static function listado_nivel(){
        $CI =& get_instance();
        $CI->db->select('n.*,e.Nombre as Eleccion');
		$CI->db->from('niveles n');
		$CI->db->join('elecciones e', 'n.IdEleccion = e.IdEleccion')
		->where('n.Active=true')
		->order_by('IdNivel ASC');
		$rs = $CI->db->get()->result_array();
		 return $rs;
    }

    static function borrar($id){
        $CI =& get_instance();
		$sql = "update niveles set Active=false where IdNivel=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
    }
	

}

/* End of file nivel_model.php */
