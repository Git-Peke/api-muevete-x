<?php 


/*Requerir Configuracion*/

require_once "config/config.php";

/*Incluyendo Librerias Esenciales*/
require_once RUTA_APP."library/Base.php";
require_once RUTA_APP."library/Controller.php";
require_once RUTA_APP."library/Core.php";





/* Display Errors*/


if (PRODUCTION_MODE == 'true') {
	error_reporting(E_ALL ^ E_STRICT);ini_set('display_errors', 'On');
}
else{
	error_reporting(0);
	ini_set('display_errors', 'Off');

}


$start = new Core;
