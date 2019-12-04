<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class filtros_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    static function cant_admin(){
        $CI =& get_instance();
        $admins = $CI->db
        ->where('IdRol',1)
        ->get('usuarios')
        ->result_array();
        return count($admins);
    }
    
    static function cant_dias(){
        $CI =& get_instance();
        $dias = $CI->db
        ->query("select DATEDIFF(curdate(),e.FechaFin) * -1 as DiasFaltantes from elecciones e
        where e.Active = 1;
            ")
        ->result_array();
        if(count($dias )>0){
            return $dias[0];
        }else{
            return 0;
        }
        
    }
    static function cant_facilitador(){
        $CI =& get_instance();
        $facilitador = $CI->db
        ->where('IdRol',2)
        ->get('usuarios')
        ->result_array();
        return count($facilitador);
    }
    static function cant_Partidos(){
        $CI =& get_instance();
        $partidos = $CI->db
        ->distinct('Nombre')
        ->get('partidos')
        ->result_array();
        return count($partidos);
    }
    static function cant_Candidatos(){
        $CI =& get_instance();
        $candidatos = $CI->db
        ->distinct('Cedula')
        ->get('candidatos')
        ->result_array();
        return count($candidatos);
    }
    static function cant_Niveles(){
        $CI =& get_instance();
        $niveles = $CI->db
        ->distinct('Nombre')
        ->get('niveles')
        ->result_array();
        return count($niveles);
    }
    static function cant_Votos(){
        $CI =& get_instance();
        $votos = $CI->db
        ->distinct('Cedula')
        ->get('votaciones')
        ->result_array();
        return count($votos);
    }
    static function votos_x_candidatos($IdEleccion){
        $CI =& get_instance();
        $votos = $CI->db
        ->query("select concat(c.Nombres,' ',c.Apellidos) as Candidato,(n.Nombre) as Nivel,
        p.Siglas as Partido,count(vd.IdCandidato) as votos, concat(round((count(vd.IdCandidato)/TotalVotos() * 100),0),'%') as porcentaje from votaciones_detalle vd 
        inner join Candidatos c on
        c.IdCandidato = vd.IdCandidato
        inner join partidos p on
        p.IdPartido = c.IdPartido
        inner join niveles n on
        n.IdNivel = vd.IdNivel 
        inner join elecciones e on
        e.IdEleccion = n.IdEleccion 
        where e.IdEleccion=?
        group by vd.IdCandidato
        ",$IdEleccion)
        ->result_array();
        return $votos;
    }
    static function votos_x_partidos($IdEleccion){
        $CI =& get_instance();
        $votos = $CI->db
        ->query("
        select p.Nombre as Partido,count(vd.IdCandidato) as votos, concat(round((count(vd.IdCandidato)/TotalVotos() * 100),0),'%') as porcentaje from votaciones_detalle vd 
        inner join Candidatos c on
        c.IdCandidato = vd.IdCandidato
        inner join partidos p on
        p.IdPartido = c.IdPartido
        inner join niveles n on
        n.IdNivel = vd.IdNivel 
        inner join elecciones e on
        e.IdEleccion = n.IdEleccion 
        where e.IdEleccion=?
        group by p.IdPartido
        ",$IdEleccion)
        ->result_array();
        return $votos;
    }
    static function total_votos_x_candidatos($idEleccion){
        $CI =& get_instance();
        $votos = $CI->db
        ->query(" select count(vd.IdCandidato) as votos, 
        concat(round((count(vd.IdCandidato)/TotalVotos() * 100),0),'%') as porcentaje from votaciones_detalle vd
        inner join Niveles n on
        n.IdNivel = vd.IdNivel
        where n.IdEleccion = ?
        ",$idEleccion)
        ->result_array();
        return $votos;
    }
   
}

/* End of file filtros_model.php */
