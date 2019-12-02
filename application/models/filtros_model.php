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

}

/* End of file filtros_model.php */
