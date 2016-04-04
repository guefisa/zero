<?php
	require_once ('core/db_abstract.php');
	
	class newMenu extends DBAbstract {

		public $item_name;
		public $item_alias;		
		public $item_url;
		public $item_pos;
		
		# Crear un nuevo articulo
		public function insert($article_data=array()) {
			foreach ($article_data as $campo=>$valor) {
				$$campo = $valor;
			}
			$this->query = "INSERT INTO uno_items (item_name, item_alias, item_url, item_pos) VALUES ('$item_name', '$item_alias', '$item_url', '$item_pos')";
			$this->execute_single_query();
		}
	
	}
?>