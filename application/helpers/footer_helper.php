<?php

class pie{

    public static $intancia;

    public static function aplicar(){

        self::$intancia = new pie();
    }

    public function __construct()
    {
        $CI =& get_instance();
		$CI->load->view('plantillas/pie');          
    }
    
}
