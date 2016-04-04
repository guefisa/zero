<?php
	require_once('modules/mod_menu/menu.php');
	
	function build_menu() {
		$mainmenu = new Menu();
		$mainmenu->get_items();
		
		$html = '<ul>';
		foreach ($mainmenu->item_name as $key=>$value):
			if ($mainmenu->item_id[$key] != '1'):
				$html .= '<li><a href="' . $mainmenu->item_url[$key] . '&itemid=' . $mainmenu->item_id[$key] . '">' . $value . '</a></li>';
			else:
				$html .= '<li><a href="./">' . $value . '</a></li>';
			endif;
		endforeach;
		$html .= '</ul>';
		
		return $html;
	}
	
?>