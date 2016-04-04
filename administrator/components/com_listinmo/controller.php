<?php
	require_once('components/com_listinmo/inmo.php');
	
	function build_component() {
		$inmo = new Inmo();
		$inmo->get_inmo();
		$html = '<div style="margin:25px"><h2>Listado de inmuebles</h2>';
		if ($inmo->inmo_id != ''):
			$html .= '<a href="?com=com_newinmo"><input style="margin-bottom:15px; padding:5px 15px; font-size: 1em;" name="newmenu" type="button" value="Nuevo inmueble" /></a><table border="0" cellpadding="0" cellspacing="0"><tr style="background-color: #DFDFDF;"><td align="left"><h3>Nombre del inmueble</h3></td><td align="center"><h3>Ref</h3></td><td align="center"><h3>Operación</h3></td><td align="center"><h3>Tipo</h3></td><td><h3>m2</h3></td><td align="center"><h3>Habitaciones</h3></td><td align="center"><h3>Baños</h3></td><td align="center"><h3>Precio</h3></td><td align="center"><h3>Borrar</h3></td></tr>';
			foreach ($inmo->inmo_id as $key=>$value) {
				$html .= '<tr><td><a href="index.php?com=com_editinmo&id=' . $value . '">' . $inmo->inmo_name[$key] . '</a></td><td align="right">' . $inmo->inmo_id[$key] . '</td><td align="center">' . $inmo->inmo_op[$key] . '</td><td align="center">' . $inmo->inmo_type[$key] . '</td><td align="right">' . $inmo->inmo_size[$key] . '</td><td align="right">' . $inmo->inmo_habit[$key] . '</td><td align="right">' . $inmo->inmo_wc[$key] . '</td><td align="right">' . $inmo->inmo_price[$key] . '</td><td align="center"><a href="?com=com_delinmo&id=' . $value . '"><input name="deletemenu" type="button" value="X" /></a></td></tr>';
			}
			$html .= '</table></div>';
				return $html;
		else:
			die('<p>Error: No se encuentra el inmueble</p>');
		endif;
	}
	
	function build_metas() {
	}
?>