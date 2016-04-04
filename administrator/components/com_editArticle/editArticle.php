<?php
	require_once ('core/db_abstract.php');
	
	class newArticle extends DBAbstract {

		public $article_title;
		public $article_alias;		
		public $article_content;
		public $article_metas;
		
		# Modificar un articulo existente
		public function set($article_data=array(), $id_art) {
			foreach ($article_data as $campo=>$valor) {
				$$campo = $valor;
			}
			$this->query = "UPDATE uno_articles SET article_name = '$article_title', article_alias = '$article_alias', article_content = '$article_content', article_metas = '$article_metas' WHERE article_id = '$id_art'";
			$this->execute_single_query();
		}

	}
?>