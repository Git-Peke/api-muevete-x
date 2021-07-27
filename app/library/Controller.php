<?php 
	class Controller{
		public function modelo($modelo){
		//cargar
		require_once "../app/models/" . $modelo . ".php";
		//instanciar
		return new $modelo();
		}
		
		public function isEmail($email){
		
		$email = test_input($email);
	
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 				return false;
			}
			else {
				return true;
			}
		}
	
	}