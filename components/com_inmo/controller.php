<?php
	require_once('components/com_inmo/inmo.php');
	
	function build_component($id) {
				$inmo = new Inmo();
				$inmo->get_inmo($id);

				$content = '<div class="inmo_container">';
				if ($inmo->inmo_images != '') {
					$images = $inmo->inmo_images;
					$image = explode ("&", $images);
					array_pop($image);
					$content .= '<a href="./images/' . $inmo->inmo_id . '/' . $image[0] . '" target="_new"><img class="inmo_img_portada" src="./images/' . $inmo->inmo_id . '/' . $image[0] . '" /></a>';
				} else {
					$content .= '<a href="./images/casa.jpg" target="_new"><img class="inmo_img_portada" src="./images/casa.jpg" /></a>';
				}
				if ($inmo->inmo_op == 'Alquiler') {
					$content .= '<h3 class="inmo_price">' . $inmo->inmo_price . ' €/mes</h3>';
				} else {
					$content .= '<h3 class="inmo_price">' . $inmo->inmo_price . ' €</h3>';
				}
				$content .= '<h3 class="inmo_name">' . $inmo->inmo_name . '</h3>';
				$content .= '<p class="inmo_detalles">Referencia: <strong>' . $inmo->inmo_id . '</strong></p>';
				$content .= '<p class="inmo_detalles">Tipo de operación: <strong>' . $inmo->inmo_op . '</strong></p>';
				$content .= '<p class="inmo_detalles">Tipo de inmueble: <strong>' . $inmo->inmo_type . '</strong></p>';
				$content .= '<p class="inmo_detalles">Dimensiones: <strong>' . $inmo->inmo_size . ' m²</strong></p>';
				$content .= '<p class="inmo_detalles">Habitaciones: <strong>' . $inmo->inmo_habit . '</strong></p>';
				$content .= '<p class="inmo_detalles">Cuartos de baño: <strong>' . $inmo->inmo_wc . '</strong></p>';
				$content .= '<p class="inmo_info">' . $inmo->inmo_info . '</p>';
					$content .= '<div class="inmo_images">';
					if ($inmo->inmo_images != '') {
						foreach ($image as $value) {
							$content .= '<a href="./images/' . $inmo->inmo_id . '/' . $value . '" target="_new"><img class="inmo_img_gallery" src="./images/' . $inmo->inmo_id . '/' . $value . '" /></a>';
						}
					}
					$content .= '</div>';
				$content .= '<div style="clear:both"></div><p class="inmo_detalles">Para una visita o más información pongase en <a href="?com=com_contact">contacto</a> con nosotros en nuestras oficinas, nuestro teléfono o a través de nuestro formulario de <a href="?com=com_contact">contacto</a> indicando la referencia del inmueble.</p>';
				$content .= '</div>';
				return $content;
	}
	
	function build_metas() {
		$metas = '<link href="components/com_inmo/css/style.css" rel="stylesheet" type="text/css" />';
		return $metas;
	}
?>