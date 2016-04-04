<?php
	require_once ('core/db_abstract.php');
	
	class delArticle extends DBAbstract {
		public function del($id) {
			$this->query = "DELETE FROM uno_articles WHERE article_id='$id'";
			$this->execute_single_query();
		}
	}
?>
