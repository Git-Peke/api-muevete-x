<?php 

/**
 * Core , se encarga de la logica
 */
class Core
{
    /**
     * Declaracion de Variables , se le dan valores por defecto para evitar errores
     */

    protected $controladorActual = 'get';
    protected $metodoActual = 'index';
    public $parametros = [];


    public function getUrl()
    {
    if(isset($_GET['url'])){
        $url = rtrim($_GET['url'],'/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/',$url);
        return $url;
        }
    }

    public function __construct()
    {
/* Obtener URL */
    $url = $this->getUrl();

/* Chequeamos la existencia de controladores */

    if (file_exists("../app/controllers/" . ucwords($url[0]). '.php')){

/* Se setea el controlador */

        $this->controladorActual = ucwords($url[0]);

/* Para Evitar Bugs se UNSETEA La variable $url[0]*/

        unset($url[0]);

    }
/* Requerimos ControladorActual , y se instacia*/

        require_once "../app/controllers/" . $this->controladorActual . ".php";
        $this->controladorActual = new $this->controladorActual;

/* Chequeamos que esta definido la variable $url[1]*/

    if (isset($url[1])){

/*  Chequeamos que el metodo existe */

        if (method_exists($this->controladorActual, $url[1])) {

/*  Setear Metodo  */
            $this->metodoActual = $url[1];

/* Para Evitar Bugs se UNSETEA La variable $url[1]  */

            unset($url[1]);
        }
    }
/* Chequear si existen parametros y setearlos*/
     
    $this->parametros = $url ? array_values($url) : [];
    call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
    }
}