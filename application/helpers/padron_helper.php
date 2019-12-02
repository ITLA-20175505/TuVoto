<?php

class Padron{

    public static $apiUrl = "http://173.249.49.169:88/api/test/consulta/";
   

    static function ConsultarPadron($cedula){
         // create curl resource
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, self::$apiUrl.$cedula);
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output contains the output string
        $output = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);   
		$datos= json_decode($output,true);
		if(isset($datos['Cedula'])){
			$datos['Cedula']= substr($datos['Cedula'],0,3)."-".substr($datos['Cedula'],3,7)."-".substr($datos['Cedula'],10);
		}
        if(count($datos)>4){
           
			$datos['Error']="";
			$datos['Apellidos'] = $datos['Apellido1']. " ".$datos['Apellido2'];
            $datos['FechaNacimiento'] = strtotime($datos['FechaNacimiento'] );
            $datos['FechaNacimiento'] = date( 'd-m-Y', $datos['FechaNacimiento'] );
            return $datos;
        }else{
            $datos['Nombres']="";
            $datos['Apellidos']="";
			$datos['Cedula']="";
			$datos['FechaNacimiento']="";
			$datos['LugarNacimiento']="";
            return $datos;
        }
	}

}
