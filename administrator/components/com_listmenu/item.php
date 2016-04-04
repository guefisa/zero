<?php
	require_once ('core/db_abstract.php');
	
	class Item extends DBAbstract {

		public $item_id = array();	
		public $item_name = array();
		public $item_alias = array();		
		public $item_url = array();
		public $item_pos = array();
		
		public function get_item() {
			$this->rows = '';
			$this->query = "SELECT * FROM uno_items";
			$this->get_results_from_query();
				foreach ($this->rows as $fila):
					foreach ($fila as $property=>$value) {
						array_push($this->$property, $value);
					}
				endforeach;
		}
	
	}
?>