<?php
	class getModel{

		private $db;
		
		public function __construct()
		{
			$this->db = new Base;
		}

		public function getArticlesRecent(){
			$this->db->query("SELECT * FROM `public` ORDER BY `id` DESC LIMIT 6");
			return json_encode($this->db->registros());
		}
		public function getArticlesEspecifics($de,$a){
			$this->db->query("SELECT * FROM `public` WHERE id >= ".$de." and  id <= ".$a);

				return json_encode($this->db->registros());
			
		}
	}



	/*
INSERT INTO public(`nombre`, `descripcion`, `kms`, `fecha de inicio`) VALUES ('[value-1]','[value-2]','11','2021-07-30 10:00:00')
SELECT * FROM `public` WHERE id <= 5 and  id >= 3 
	*/