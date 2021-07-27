<?php 
/**
 * Get JSON File especific user
 */
class User extends Controller
{
    public function __construct()
    {
      $this->model = $this->modelo('userModel');
    }
    public function index(){
    	echo '{"ERROR":"Bad Request/Not Request"}';
    }
    public function data($emailuser){
    $valid = $this->model->getArticlesEspecifics($emailuser);
    if ($valid) {
        
    }  
    else {
        
    }
/*
Duvuelve la informacion puntual de un usuario en un JSON 
*/
    }
    public function top($top)
    {
    	
    }
}

