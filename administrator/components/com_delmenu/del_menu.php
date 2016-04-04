<?php
	require_once ('core/db_abstract.php');
	
	class delMenu extends DBAbstract {
		public function del($id) {
			$this->query = "DELETE FROM uno_items WHERE item_id='$id'";
			$this->execute_single_query();
		}
	}
?>
