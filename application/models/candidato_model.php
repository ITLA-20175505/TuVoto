<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class candidato_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    static function guardar_candidato($candidato){
        $CI =& get_instance();
        $result = null;
        if (isset($candidato['IdCandidato']) && $candidato['IdCandidato'] >0) {
            $CI->db->where('IdCandidato', $candidato['IdCandidato']);
            $CI->db->update('candidatos', $candidato);
            $result = array('Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);
        }else{
            $CI->db->insert('candidatos', $candidato);
            $result = array('IdCandidato'=>$CI->db->insert_id(),
            'Registros Afectados'=> $CI->db->affected_rows(),
            'Error'=> $CI->db->error()["message"]);

        }
        return $result;
    }

    static function candidato_x_id($id){
        $CI =& get_instance();
        $candidato = $CI->db
        ->where('IdCandidato',$id)
        ->get('candidatos')
        ->result_array();
        return $candidato;
    }
	static function candidato_x_Cedula($Cedula){
        $CI =& get_instance();
        $candidato = $CI->db
        ->where('Cedula',$Cedula)
        ->get('candidatos')
        ->result_array();
        return $candidato;
    }
    static function listado_candidato(){
        $CI =& get_instance();
		$CI->db->select('c.*,n.Nombre as Nivel,p.Nombre as Partido');
		$CI->db->from('candidatos c');
		$CI->db->join('niveles n', 'c.IdNivel = n.IdNivel');
		$CI->db->join('partidos p', 'c.IdPartido = p.IdPartido')
		->order_by('IdCandidato ASC');
		$rs = $CI->db->get()->result_array();
		 return $rs;
    }

    static function borrar($id){
        $CI =& get_instance();
        $sql = "delete from candidatos where IdCandidato=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
    }
	

}

/* End of file candidato_model.php */
