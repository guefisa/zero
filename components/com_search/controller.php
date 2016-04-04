<?php
	require_once('components/com_search/search.php');
	
	function build_component() {
	
		if (isset($_GET['type'])) {
			$_POST['inmo_type'] = $_GET['type'];
			$_POST['inmo_op'] = $_GET['op'];
		}
	
		if ($_POST){
			$selected = 'selected/';
			if ($_POST['inmo_type'] == 'Todos los inmuebles') {
				$opcion1 = "";
				$opcion2 = $_POST['inmo_op'];
				$inmo = new Inmo();
				$inmo->get_all($opcion2);
				$inmo->cont_contador_all($opcion2);

			} elseif ($_POST['inmo_type'] == 'ban1'){
				$opcion1 = "";
				$opcion2 = "";
				$on1 = "Piso";
				$on2 = "Apartamento";
				$on3 = "Obra nueva";
				$inmo = new Inmo();
				$inmo->get_multisearch($on1, $on2, $on3);
				
			} elseif ($_POST['inmo_type'] == 'ban2'){
				$opcion1 = "";
				$opcion2 = "";
				$on1 = "Casa";
				$on2 = "Chalet";
				$on3 = "Obra nueva";
				$inmo = new Inmo();
				$inmo->get_multisearch($on1, $on2, $on3);
				
			} elseif ($_POST['inmo_type'] == 'ban3'){
				$opcion1 = "";
				$opcion2 = "";
				$on1 = "Oficima";
				$on2 = "Local comercial";
				$on3 = "nave";
				$inmo = new Inmo();
				$inmo->get_multisearch($on1, $on2, $on3);
				
			} elseif ($_POST['inmo_type'] == 'ban4'){
				$opcion1 = "";
				$opcion2 = "";
				$on1 = "Garaje";
				$on2 = "Terreno";
				$on3 = "NULL";
				$inmo = new Inmo();
				$inmo->get_multisearch($on1, $on2, $on3);
				
			} else {
				$opcion1 = $_POST['inmo_type'];
				$opcion2 = $_POST['inmo_op'];
				$inmo = new Inmo();
				$inmo->get_inmo($opcion1, $opcion2);
				$inmo->cont_contador($opcion1, $opcion2);
			}

			$html = '
				<h3 class="csstitleorange">Buscador:</h3>
				<div class="cssbuscador">
					<form action="index.php" method="post" name="buscador">
						<fieldset>
							<legend>Elige el tipo de inmueble:</legend>';
							if ($opcion2 == 'alquiler') {
								$html .= '
									<input name="inmo_op" type="radio" value="alquiler" checked />
									<label>Alquiler</label>
									<input name="inmo_op" type="radio" value="venta" />
								';
							} else {
								$html .= '
									<input name="inmo_op" type="radio" value="alquiler" />
									<label>Alquiler</label>
									<input name="inmo_op" type="radio" value="venta"  checked/>
								';
							}
							$html .= '<label>Venta</label>
							<select name="inmo_type">';
							 if ($opcion1 == 'Todos los inmuebles') {
								$html .='<option selected/>Todos los inmuebles</option>';
							 } else {
								$html .='<option>Todos los inmuebles</option>';
							 }
							 if ($opcion1 == 'Piso') {
								$html .='<option selected/>Piso</option>';
							 } else {
								$html .='<option>Piso</option>';
							 }
							 if ($opcion1 == 'Apartamento') {
								$html .='<option selected/>Apartamento</option>';
							 } else {
								$html .='<option>Apartamento</option>';
							 }
							 if ($opcion1 == 'Casa') {
								$html .='<option selected/>Casa</option>';
							 } else {
								$html .='<option>Casa</option>';
							 }
							 if ($opcion1 == 'Chalet') {
								$html .='<option selected/>Chalet</option>';
							 } else {
								$html .='<option>Chalet</option>';
							 }
							 if ($opcion1 == 'Obra nueva') {
								$html .='<option selected/>Obra nueva</option>';
							 } else {
								$html .='<option>Obra nueva</option>';
							 }
							 if ($opcion1 == 'Garaje') {
								$html .='<option selected/>Garaje</option>';
							 } else {
								$html .='<option>Garaje</option>';
							 }
							 if ($opcion1 == 'Oficina') {
								$html .='<option selected/>Oficina</option>';
							 } else {
								$html .='<option>Oficina</option>';
							 }
							 if ($opcion1 == 'Local comercial') {
								$html .='<option selected/>Local comercial</option>';
							 } else {
								$html .='<option>Local comercial</option>';
							 }
							 if ($opcion1 == 'Terreno') {
								$html .='<option selected/>Terreno</option>';
							 } else {
								$html .='<option>Terreno</option>';
							 }
							 if ($opcion1 == 'Nave') {
								$html .='<option selected/>Nave</option>';
							 } else {
								$html .='<option>Nave</option>';
							 }

							$html .= '</select>
							<input class="submit" name="submit" type="submit" value="Buscar" />
						</fieldset>
					</form>
				</div>';
			$html .= '<div style="margin:25px">';
			if ($inmo->inmo_id != ''):
				$html .= '<table><caption>lista de busqueda</caption><thead><tr><th scope="col" align="left">Nombre del inmueble</th><th scope="col" align="center">Operación</th><th scope="col" align="center">Tipo</th><th scope="col" align="center">Dimensiones</th><th scope="col" align="center">Habitaciones</th><th scope="col" align="center">Baños</th><th scope="col" align="center" width="75px">Precio</th></tr></thead><tbody>';
				foreach ($inmo->inmo_id as $key=>$value) {
					$html .= '<tr><td align="left"><a href="?com=com_inmo&id=' . $inmo->inmo_id[$key] . '">' . $inmo->inmo_name[$key] . '</a></td><td align="center">' . $inmo->inmo_op[$key] . '</td><td align="center">' . $inmo->inmo_type[$key] . '</td><td align="right">' . $inmo->inmo_size[$key] . ' m²</td><td align="right">' . $inmo->inmo_habit[$key] . '</td><td align="right">' . $inmo->inmo_wc[$key] . '</td><td align="right">' . $inmo->inmo_price[$key] . ' €</td></tr>';
				}
				$html .= '</tbody></table></div>';
				
					return $html;
			else:
				die('<p>Error: No se encuentra el inmueble</p>');
			endif;

			
		} else {
		
			$html = '
				<h3 class="csstitleorange">Buscador:</h3>
				<div class="cssbuscador">
					<form action="" method="post" name="buscador">
						<fieldset>
							<legend>Elige el tipo de inmueble:</legend>
							<input name="inmo_op" type="radio" value="alquiler" checked />
							<label>Alquiler</label>
							<input name="inmo_op" type="radio" value="venta" />
							<label>Venta</label>
							<select name="inmo_type">
								<option>Todos los inmuebles</option>
								<option>Piso</option>
								<option>Apartamento</option>
								<option>Casa</option>
								<option>Chalet</option>
								<option>Obra nueva</option>
								<option>Garaje</option>
								<option>Oficina</option>
								<option>Local comercial</option>
								<option>Terreno</option>
								<option>Nave</option>
							</select>
							<input class="submit" name="submit" type="submit" value="Buscar" />
						</fieldset>
					</form>
				</div>

				<p class="separatorp">Traspasos o cesiones de empresa: Bares, restaurantes, comercios, etc.</p>
				<br />
				<h3 class="csstitleorange">Tipos de inmueble que se pueden encontrar:</h3>

				<div class="cssinfo">
					<a href="?type=ban1&op=NULL">
					<div class="tipoinm">
					<h4>Piso</h4>
						<p>Apartamento, ático, loft, en contrucción...</p>
					</div>
					</a>
					<a href="?type=ban2&op=NULL">
					<div class="tipoinm">
					<h4>Chalet o casa</h4>
						<p>Casa, chalet, pareado, en contrucción...</p>
					</div>
					</a>
					<a href="?type=ban3&op=NULL">
					<div class="tipoinm">
					<h4>Oficina</h4>
						<p>Oficina, local, nave, traspaso de negocio...</p>
					</div>
					</a>
					<a href="?type=ban4&op=NULL">
					<div class="tipoinm">
					<h4>Otros</h4>
						<p>Garaje, terreno y otros inmuebles...</p>
					</div>
					</a>
				</div>
				<br />
			';
			
			return $html;
		}
	}
	
	function build_metas() {
		$metas = '<link href="components/com_search/css/style.css" rel="stylesheet" type="text/css" />';
		return $metas;
	}
?>