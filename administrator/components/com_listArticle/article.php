<?php
	require_once ('core/db_abstract.php');
	
	class Article extends DBAbstract {

		public $article_id = array();	
		public $article_name = array();
		public $article_alias = array();		
		public $article_content = array();
		public $article_metas = array();
		
		public function get_article() {
			$this->rows = '';
			$this->query = "SELECT * FROM uno_articles";
			$this->get_results_from_query();
				foreach ($this->rows as $fila):
					foreach ($fila as $property=>$value) {
						array_push($this->$property, $value);
					}
				endforeach;
		}
	
	}
?>