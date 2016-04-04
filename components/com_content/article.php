<?php
	require_once ('core/db_abstract.php');
	
	class Article extends DBAbstract {

		public $article_id;	
		public $article_name;
		public $article_alias;		
		public $article_content;
		public $article_metas;
		
		public function get_article($article_id) {
			$this->rows = '';
			$this->query = "SELECT * FROM uno_articles WHERE article_id = '" . $article_id . "'";
			$this->get_results_from_query();
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $property=>$value):
					$this->$property = $value;
				endforeach;
			endif;
		}
	
	}
?>