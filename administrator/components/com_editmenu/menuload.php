<?php
	require_once ('core/db_abstract.php');
	
	class menuItem extends DBAbstract {

		public $item_id;	
		public $item_name;
		public $item_alias;		
		public $item_url;
		public $item_pos;
		
		public function get_item($id) {
			$this->rows = '';
			$this->query = "SELECT * FROM uno_items WHERE item_id = '" . $id . "'";
			$this->get_results_from_query();
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $property=>$value):
					$this->$property = $value;
				endforeach;
			endif;
		}
	
	}
?>