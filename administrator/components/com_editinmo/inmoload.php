<?php
	require_once ('core/db_abstract.php');
	
	class menuInmo extends DBAbstract {

		public $inmo_id;	
		public $inmo_name;
		public $inmo_op;
		public $inmo_type;
		public $inmo_size;
		public $inmo_habit;
		public $inmo_wc;
		public $inmo_info;
		public $inmo_images = '';
		public $inmo_price;
		
		public function get_inmo($id) {
			$this->rows = '';
			$this->query = "SELECT * FROM cont_inmo WHERE inmo_id = '" . $id . "'";
			$this->get_results_from_query();
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $property=>$value):
					$this->$property = $value;
				endforeach;
			endif;
		}
	
	}
?>