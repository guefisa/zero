<?php
	require_once ('core/db_abstract.php');
	
	class editItem extends DBAbstract {

		public $item_name;
		public $item_alias;		
		public $item_url;
		public $item_pos;
		
		public function set($article_data=array(), $id) {
			foreach ($article_data as $campo=>$valor) {
				$$campo = $valor;
			}
			$this->query = "UPDATE uno_items SET item_name = '$item_name', item_alias = '$item_alias', item_url = '$item_url', item_pos = '$item_pos' WHERE item_id = '$id'";
			$this->execute_single_query();
		}

	}
?>