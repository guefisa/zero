<?php
	require_once('components/com_listmenu/item.php');
	
	function build_component() {
		$item = new Item();
		$item->get_item();
		$html = '<div style="margin:25px"><h2>Listado de menus</h2>';
		if ($item->item_id != ''):
			$html .= '<a href="?com=com_newmenu"><input style="margin-bottom:15px; padding:5px 15px; font-size: 1em;" name="newmenu" type="button" value="Nuevo menú" /></a><table border="0" cellpadding="0" cellspacing="0"><tr style="background-color: #DFDFDF;"><td><h3>Nombre del menú</h3></td><td><h3>Borrar</h3></td></tr>';
			foreach ($item->item_id as $key=>$value) {
				$html .= '<tr><td><a href="index.php?com=com_editmenu&id=' . $value . '">' . $item->item_name[$key] . '</a></td><td align="center"><a href="?com=com_delmenu&id=' . $value . '"><input name="deletemenu" type="button" value="X" /></a></td></tr>';
			}
			$html .= '</table></div>';
				return $html;
		else:
			die('<p>Error: No se encuentra el menu item</p>');
		endif;
	}
	
	function build_metas() {
	}
?>