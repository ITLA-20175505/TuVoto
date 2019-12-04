<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class votacion_model extends CI_Model {

	public function __construct(){
        parent::__construct();
    }
    static function guardar_votos($votos){
        $CI =& get_instance();
        $CI->db->insert_batch('votaciones_detalle',$votos);
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
    static function resumen_votacion($idVotacion){
        $CI =& get_instance();
        $rs = $CI->db->query("
select  concat(v.Nombres,' ',v.Apellidos) as Votante,n.Nombre as Nivel,concat(c.Nombres,' ',c.Apellidos) as Candidato,
p.Siglas as Partido,c.Foto as Foto from votaciones v
inner join votaciones_detalle vd on
v.IdVotacion = vd.IdVotacion
inner join niveles n on
n.IdNivel = vd.IdNivel 
inner join candidatos c on
c.IdCandidato = vd.IdCandidato
inner join partidos p on
p.IdPartido = c.IdPartido
where v.IdVotacion = ?
group by(Nivel)",$idVotacion)
		->result_array();
		return $rs;
    }

    static function borrar($id){
        $CI =& get_instance();
        $sql = "update votaciones set Active=false where IdVotacion=?";
        $CI->db->query($sql, [$id]);
        return $CI->db->affected_rows();
    }
    static function verificar_detalle_x_id($id){
        $CI =& get_instance();
        $detalle = $CI->db
        ->where('IdVotacion',$id)
        ->get('votaciones_detalle')
        ->result_array();
        return $detalle;
    }

}

/* End of file votacion_model.php */
