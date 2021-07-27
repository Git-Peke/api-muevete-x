<?php 

	class userModel{

		private $db;
		
		public function __construct()
		{
			$this->db = new Base;
		}

		public function getEspecificUser($useremail){
			$this->db->query("SELECT * FROM `public` ORDER BY `id` DESC LIMIT 6");
		
			return json_encode($this->db->registros());
		
		}
	}

