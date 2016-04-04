<?php
	require_once ('core/db_abstract.php');
	
	class Menu extends DBAbstract {

		public $item_id = array();	
		public $item_name = array();	
		public $item_alias = array();	
		public $item_url = array();	
		public $item_pos = array();	
		
		public function get_items() {
			$this->query = "SELECT * FROM uno_items ORDER BY item_pos";
			$this->get_results_from_query();
			foreach ($this->rows as $nivel):
				foreach ($nivel as $property=>$value):
					array_push($this->$property, $value);
				endforeach;
			endforeach;
		}
	
	}
?>