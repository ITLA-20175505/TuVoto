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
        
		$rs = $CI->db->where('Eliminado=false')
		->get('elecciones')->result_array();
		foreach($rs as $key=>$eleccion){
			if($eleccion['Active']== true){
				$rs[$key]['Active'] = "SI";
			}else{
				$rs[$key]['Active'] = "NO";
			}
		}
        return $rs;
    }
    static function activar($id){
		eleccion_model::desactivar($id);
		$CI =& get_instance();
		$sql = "update elecciones set Active=false where IdEleccion!=?";
        $CI->db->query($sql, [$id]);
        $sql = "update elecciones set Active=true where IdEleccion=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
	}
	static function desactivar($id){
        $CI =& get_instance();
        $sql = "update elecciones set Active=false where IdEleccion=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
    }
    static function borrar($id){
        $CI =& get_instance();
        $sql = "update elecciones set Eliminado=true where IdEleccion=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
        
    }

    static function GetCasilla($IdEleccion,$IdNivel){
        $CI =& get_instance();
        $CI->db->select("c.IdCandidato as IdCandidato,concat(c.Nombres, ' ',c.Apellidos) as Candidato,p.Siglas as Partido, p.Color as Color,n.Nombre as Nivel,n.IdNivel as IdNivel,
        c.Foto as Foto");
		$CI->db->from('candidatos c');
        $CI->db->join('partidos p', 'c.IdPartido = p.IdPartido');
        $CI->db->join('elecciones e', 'e.IdEleccion = p.IdEleccion');
        $CI->db->join('niveles n', 'c.IdNivel = n.IdNivel')
        ->where('c.Active=true')
        ->where('e.IdEleccion',$IdEleccion)
        ->where('n.IdNivel',$IdNivel)
		->order_by('c.Nombres ASC');
		$rs = $CI->db->get()->result_array();
		 return $rs;
    }

	

}

/* End of file eleccion_model.php */
