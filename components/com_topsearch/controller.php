<?php
	require_once('components/com_topsearch/topsearch.php');
	
	function build_module($option) {
		$topsearch = New TopSearch();
		$topsearch->get_topsearch($option);
		$html='<ul>';
		foreach ($topsearch->cont_inmo as $value) {
			$html .= '<li><a href="?type=' . $value .'&op=' . $option . '">' . $value . '</a></li>';
		}
		$html .='</ul>';
		return $html;
	}
	
	function build_metas_module() {
		// $metas = '<link href="" rel="stylesheet" type="text/css" />';
		// return $metas;
	}
?>