<?php
	require_once ('core/db_abstract.php');
	
	class Inmo extends DBAbstract {

		public $inmo_id = array();	
		public $inmo_name = array();
		public $inmo_op = array();
		public $inmo_type = array();
		public $inmo_size = array();
		public $inmo_habit = array();
		public $inmo_wc = array();
		public $inmo_info = array();
		public $inmo_images = array();
		public $inmo_price = array();
		
		public function get_inmo() {
			$this->rows = '';
			$this->query = "SELECT * FROM cont_inmo ORDER BY inmo_id DESC";
			$this->get_results_from_query();
				foreach ($this->rows as $fila):
					foreach ($fila as $property=>$value) {
						array_push($this->$property, $value);
					}
				endforeach;
		}
	
	}
?>