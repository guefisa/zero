<?php
	require_once ('core/db_abstract.php');
	
	class delInmo extends DBAbstract {
		
		public function del($id) {
			$this->query = "DELETE FROM cont_inmo WHERE inmo_id='$id'";
			$this->execute_single_query();
		}
	}
?>
