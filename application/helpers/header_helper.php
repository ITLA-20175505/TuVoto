<?php

class encabezado{

	public static $intancia;
	public static $titulo = "";
    public static function aplicar($nombre=""){
		self::$titulo = $nombre;
		self::$intancia = new encabezado();

    }

    public function __construct()
    {
        $CI =& get_instance();
		$CI->load->view('plantillas/encabezado',['titulo'=>self::$titulo]);          

    }
    
}
