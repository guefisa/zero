<?php
	require_once('components/com_listArticle/article.php');
	
	function build_component() {
		$article = new Article();
		$article->get_article();
		$html = '<div style="margin:25px"><h2>Secciones</h2>';
		if ($article->article_content != ''):
			// Nuevo articulo deshabilitado para facilitar uso al cliente
			// $html .= '<a href="?com=com_newArticle"><input style="margin-bottom:15px; padding:5px 15px; font-size: 1em;" name="newarticle" type="button" value="Artículo nuevo" /></a>';
			$html .= '<table border="0" cellpadding="0" cellspacing="0"><tr style="background-color: #DFDFDF;"><td><h3>Nombre del artículo</h3></td><td><h3>Borrar</h3></td></tr>';
			foreach ($article->article_id as $key=>$value) {
				$html .= '<tr><td><a href="index.php?com=com_editArticle&id=' . $value . '">' . $article->article_name[$key] . '</a></td><td align="center"><span style="color:green">Protegido</span><!-- <a href="?com=com_delarticle&id=' . $value . '"><input name="delete" type="button" value="X" /></a> --></td></tr>';
			}
			$html .= '</table></div>';
				return $html;
		else:
			die('<p>Error: No se encuentra el articulo</p>');
		endif;
	}
	
	function build_metas() {
	}
?>