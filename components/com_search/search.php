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
		public $inmo_price = array();
		
		public function get_inmo($opcion1, $opcion2) {
			$this->rows = '';
			$this->query = "SELECT * FROM cont_inmo WHERE inmo_type = '$opcion1' AND inmo_op = '$opcion2'";
			$this->get_results_from_query();
				foreach ($this->rows as $fila):
					foreach ($fila as $property=>$value) {
						@array_push($this->$property, $value);
					}
				endforeach;
		}

		public function get_all($opcion2) {
			$this->rows = '';
			$this->query = "SELECT * FROM cont_inmo WHERE inmo_op = '$opcion2'";
			$this->get_results_from_query();
				foreach ($this->rows as $fila):
					foreach ($fila as $property=>$value) {
						@array_push($this->$property, $value);
					}
				endforeach;
		}

		public function get_multisearch($on1, $on2, $on3) {
			$this->rows = '';
			$this->query = "SELECT * FROM cont_inmo WHERE inmo_type = '$on1' OR inmo_type = '$on2' OR inmo_type = '$on3'";
			$this->get_results_from_query();
				foreach ($this->rows as $fila):
					foreach ($fila as $property=>$value) {
						@array_push($this->$property, $value);
					}
				endforeach;
		}
		
		public function cont_contador($opcion1, $opcion2) {
			$this->query = "UPDATE cont_contador SET cont_contador = cont_contador+1 WHERE inmo_op = '$opcion2' AND cont_inmo = '$opcion1'";
			$this->execute_single_query();
		}

		public function cont_contador_all($opcion2) {
			$this->query = "UPDATE cont_contador SET cont_contador=1 WHERE inmo_op = '$opcion2'";
			$this->execute_single_query();
		}
	
	}
?>