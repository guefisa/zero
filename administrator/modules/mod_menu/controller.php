<?php	
	function build_menu() {
		$html = '<ul>';
		$html .= '<li><a href="?com=com_listinmo">INMUEBLES</a></li>';
		$html .= '<li><a href="?com=com_listArticle">SECCIONES</a></li>';
		// $html .= '<li><a href="?com=com_listmenu">Menús</a></li>'; // Esta opcion la dejo deshabilitada para facilitar el uso y proteger de malos usos
		$html .= '<li><a href="exit.php">Salir</a></li>';
		$html .= '</ul>';
		return $html;
	}
	
?>