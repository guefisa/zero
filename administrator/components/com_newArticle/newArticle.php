<?php
	require_once ('core/db_abstract.php');
	
	class newArticle extends DBAbstract {

		public $article_title;
		public $article_alias;		
		public $article_content;
		public $article_metas;
		
		# Crear un nuevo articulo
		public function set($article_data=array()) {
			foreach ($article_data as $campo=>$valor) {
				$$campo = $valor;
			}
			$this->query = "INSERT INTO uno_articles (article_name, article_alias, article_content, article_metas) VALUES ('$article_title', '$article_alias', '$article_content', '$article_metas')";
			$this->execute_single_query();
		}
	
	}
?>