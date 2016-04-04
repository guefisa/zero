<?php
	require_once ('core/db_abstract.php');
	
	class editInmo extends DBAbstract {

		public $inmo_name;
		public $inmo_op;
		public $inmo_type;
		public $inmo_size;
		public $inmo_habit;
		public $inmo_wc;
		public $inmo_info;		
		public $inmo_price;
		
		# Modificar un inmueble existente
		public function set($inmo_data=array(), $inmo_images, $id) {
			foreach ($inmo_data as $campo=>$valor) {
				$$campo = $valor;
			}
			@$this->query = "UPDATE cont_inmo SET inmo_name = '$inmo_name', inmo_op = '$inmo_op', inmo_type = '$inmo_type', inmo_size = '$inmo_size', inmo_habit = '$inmo_habit', inmo_wc = '$inmo_wc', inmo_info = '$inmo_info', inmo_price = '$inmo_price', inmo_images = '$inmo_images' WHERE inmo_id = '$id'";
			$this->execute_single_query();
		}

	}
?>