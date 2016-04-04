<?php
	require_once('components/com_content/article.php');
	
	function build_component($article_id) {
		$article = new Article();
		$article->get_article($article_id);
		if ($article->article_content != ''):
			if ($article->article_alias != 'inicio') {
				$title = "<h2>" . $article->article_name . "</h2>";
			} else {
				$title = "";
			}
			return $title . $article->article_content;
		else:
			die('<p>Error: No se encuentra el articulo</p>');
		endif;
	}
	
	function build_metas($article_id) {
		$article = new Article();
		$article->get_article($article_id);
		return $article->article_metas;
	}
?>