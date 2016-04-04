<?php
	require_once ('core/db_abstract.php');
	
	class newInmo extends DBAbstract {

		public $inmo_id;
		public $inmo_name;
		public $inmo_op;
		public $inmo_type;
		public $inmo_size;
		public $inmo_habit;
		public $inmo_wc;
		public $inmo_info;
		public $inmo_price;
		
		public function insert($inmo_data=array(), $inmo_images) {
			foreach ($inmo_data as $campo=>$valor) {
				$$campo = $valor;
			}
			$this->query = "INSERT INTO cont_inmo (inmo_id, inmo_name, inmo_op, inmo_type, inmo_size, inmo_habit, inmo_wc, inmo_info, inmo_images, inmo_price) VALUES (NULL, '$inmo_name', '$inmo_op', '$inmo_type', '$inmo_size', '$inmo_habit', '$inmo_wc', '$inmo_info', '$inmo_images', '$inmo_price')";
			$this->execute_single_query();
			$this->query = "SELECT inmo_id FROM cont_inmo ORDER BY inmo_id DESC LIMIT 0,1";
			$this->get_results_from_query();
			if(count($this->rows) == 1) {
				foreach ($this->rows[0] as $propiedad=>$valor) {
					$this->$propiedad = $valor;
				}
			}
		}
	
	}
?>