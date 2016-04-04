<?php
	require_once ('core/db_abstract.php');
	
	class TopSearch extends DBAbstract {

		public $inmo_op = array();
		public $cont_inmo = array();
		public $cont_contador = array();
		
		public function get_topsearch($opcion1) {
			$this->rows = '';
			$this->query = "SELECT * FROM cont_contador WHERE inmo_op = '$opcion1' ORDER BY cont_contador DESC LIMIT 0,5";
			$this->get_results_from_query();
				foreach ($this->rows as $fila):
					foreach ($fila as $property=>$value) {
						@array_push($this->$property, $value);
					}
				endforeach;
		}

	}
?>