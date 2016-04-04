		<?php
		require_once ('components/com_editinmo/editinmo.php');
		require_once ('components/com_editinmo/helper.php');
		
		# Hago una copia del componente com_content para llamar al articulo con un nombre de funcion diferente ya que me daba error porque puse el mismo #################
			require_once('components/com_editinmo/inmoload.php');

			function get_name($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_name;
			}
			
			function get_op($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_op;
			}
			
			function get_type($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_type;
			}
			
			function get_size($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_size;
			}

			function get_habit($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_habit;
			}

			function get_wc($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_wc;
			}
			
			function get_info($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_info;
			}
			
			function get_images($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_images;
			}
			
			function get_price($id) {
				$inmo = new menuInmo();
				$inmo->get_inmo($id);
				return $inmo->inmo_price;
			}
		####################################################################################################################################################################
	
			function build_component() {
				$id = @$_GET[id];

				$inmo_name = get_name($id);
				$inmo_op = get_op($id);
				$inmo_type = get_type($id);
				$inmo_size = get_size($id);
				$inmo_habit = get_habit($id);
				$inmo_wc = get_wc($id);
				$inmo_info = get_info($id);
				$inmo_images = get_images($id);
				$inmo_price = get_price($id);
				
				$content = '';
				if ($_POST){
				
					# Con esto creo una variable con los nombres de las imagenes que voy a subir
						if (!is_dir('../images/' . $id)) {
							mkdir('../images/' . $id);
						}
						$uploads_dir = '../images/' . $id;
						$inmo_images_add = '';
						foreach ($_FILES["archivos"]["error"] as $key => $error) {
							if ($error == UPLOAD_ERR_OK) {
								$tmp_name = $_FILES["archivos"]["tmp_name"][$key];
								$name = $_FILES["archivos"]["name"][$key];
								$name = quitarAcentos($name);
								$name = strtolower($name);
								$inmo_images_add .= $name . '&';
								move_uploaded_file($tmp_name, "$uploads_dir/$name");
							}
						}
						if (isset($_POST['del_img'])) {
							foreach ($_POST['del_img'] as $value) {
								$inmo_images = str_replace($value . '&', '', $inmo_images);
								unlink('../images/' .$id . '/' . $value);
							}
						}
					
					$inmo_images = $inmo_images . $inmo_images_add;
				
					$inmo = new editInmo();
					$inmo->set($_POST, $inmo_images, $id);

					$content .= '<div style="margin:150px 0; text-align: center;"><h3>EL inmueble ref ' . $id . ' ha sido modificado correctamente</h3><p><a href="?com=com_listinmo"><input style="padding:5px 15px; font-size: 1em;" name="aceptar" type="button" value="Aceptar" /></a></p></div>';
					return $content;
					
				} else 	{
							$content ='
							<form class="article_form" name="inmo_data" method="post" action="" enctype="multipart/form-data">
								<fieldset>
									<legend>Editor de inmuebles</legend>
									<div class="head">
										<label>Nombre del inmueble:</label>
											<input class="text" name="inmo_name" type="text" value = "' . $inmo_name . '"/>
										<label>Tipo de operación:</label>
											<select name="inmo_op">';
												if ($inmo_op == 'Venta') {
													$content .= '<option selected>Venta</option>';
												} else {
													$content .= '<option selected>Alquiler</option>';
												}
												$content .= '<option>Alquiler</option>
												<option>Venta</option>
											</select>
										<label>Tipo de inmueble:</label>
											<select name="inmo_type">';
												if ($inmo_type == 'Piso') {
													$content .= '<option selected>Piso</option>';
												} elseif ($inmo_type == 'Apartamento') {
													$content .= '<option selected>Apartamento</option>';
												} elseif ($inmo_type == 'Casa') {
													$content .= '<option selected>Casa</option>';
												} elseif ($inmo_type == 'Chalet') {
													$content .= '<option selected>Chalet</option>';
												} elseif ($inmo_type == 'Obra nueva') {
													$content .= '<option selected>Obra nueva</option>';
												} elseif ($inmo_type == 'Garaje') {
													$content .= '<option selected>Garaje</option>';
												} elseif ($inmo_type == 'Oficina') {
													$content .= '<option selected>Oficina</option>';
												} elseif ($inmo_type == 'Local comercial') {
													$content .= '<option selected>Local comercial</option>';
												} elseif ($inmo_type == 'Terreno') {
													$content .= '<option selected>Terreno</option>';
												} else {
													$content .= '<option selected>Nave</option>';
												}
												$content .= '<option>Piso</option>
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
									</div>
									<div class="head">
										<label>Dimensiones (m²) :</label>
											<input class="text" name="inmo_size" type="text" value = "' . $inmo_size . '"/>
										<label>Habitaciones:</label>
											<select name="inmo_habit">';
												if ($inmo_habit == '1') {
													$content .= '<option selected>1</option>';
												} elseif ($inmo_habit == '2') {
													$content .= '<option selected>2</option>';
												} elseif ($inmo_habit == '3') {
													$content .= '<option selected>3</option>';
												} elseif ($inmo_habit == '4') {
													$content .= '<option selected>4</option>';
												} elseif ($inmo_habit == '5') {
													$content .= '<option selected>5</option>';
												} else {
													$content .= '<option selected>6</option>';
												}
												$content .= '<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
											</select>
										<label>Baños:</label>
											<select name="inmo_wc">';
												if ($inmo_wc == '1') {
													$content .= '<option selected>1</option>';
												} elseif ($inmo_wc == '2') {
													$content .= '<option selected>2</option>';
												} else {
													$content .= '<option selected>3</option>';
												}
												$content .= '<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
									</div>
									<div class="head">
										<label>Precio:</label>
											<input class="text" name="inmo_price" type="text" value = "' . $inmo_price . '" />
									</div>
									<label>Descripción:</label>
										<textarea name="inmo_info">' . $inmo_info . '</textarea>
									<label>Adjuntar imagenes: (Marque la imagen que desea borrar y/o use el cargador para añadir nuevas imagenes)</label>';
											if ($inmo_images != '') {
												$image = explode ("&", $inmo_images);
												array_pop($image);
												foreach ($image as $value) {
													$content .= '<div class="img_container"><a href="../images/' . $id . '/' . $value . '" target="_new"><img class="inmo_img_gallery" src="../images/' . $id . '/' . $value . '" /></a><div style="clear:both;"></div>Borrar: <input name="del_img[]" type="checkbox" value="' . $value . '" /></div>';
												}
											}
									   $content .= '<div style="clear:both;"></div>
									   <div style="display:inline-block;" id="adjuntos">
									   <input type="file" name="archivos[]" />
									   </div>
									   <span class="alink" onClick="addCampo()">Subir otro archivo</span>
								</fieldset>
								<div class="normal">
									<input name="submit" type="submit" value="Guardar" />
									<a href="?com=com_listinmo"><input name="cancel" type="button" value="Cancelar" /></a>
								</div>
							</form>';
						}
				
				return $content;
			}
			
			function build_metas($article_id) {
				$metas = '<link href="components/com_editinmo/css/style.css" rel="stylesheet" type="text/css" />';
				$metas .= '<script src="components/com_editinmo/multi.js"></script>';
				$metas .= "
					<!-- TinyMCE -->
					<script type='text/javascript' src='./media/jscripts/tiny_mce/tiny_mce.js'></script>
					<script type='text/javascript'>
						tinyMCE.init({
							// General options
							mode : 'textareas',
							theme : 'advanced',
							plugins : 'pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave',

							// Theme options
							theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,fontselect,fontsizeselect',
							theme_advanced_buttons2 : 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor',
							theme_advanced_buttons3 : 'tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen',
							theme_advanced_toolbar_location : 'top',
							theme_advanced_toolbar_align : 'left',
							theme_advanced_statusbar_location : 'bottom',
							theme_advanced_resizing : true,

							// Example content CSS (should be your site CSS)
							// using false to ensure that the default browser settings are used for best Accessibility
							// ACCESSIBILITY SETTINGS
							content_css : false,
							// Use browser preferred colors for dialogs.
							browser_preferred_colors : true,
							detect_highcontrast : true,

							// Drop lists for link/image/media/template dialogs
							template_external_list_url : 'lists/template_list.js',
							external_link_list_url : 'lists/link_list.js',
							external_image_list_url : 'lists/image_list.js',
							media_external_list_url : 'lists/media_list.js',

							// Style formats
							style_formats : [
								{title : 'Bold text', inline : 'b'},
								{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
								{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
								{title : 'Example 1', inline : 'span', classes : 'example1'},
								{title : 'Example 2', inline : 'span', classes : 'example2'},
								{title : 'Table styles'},
								{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
							],

							// Replace values for the template plugin
							template_replace_values : {
								username : 'Some User',
								staffid : '991234'
							}
						});
					</script>
					<!-- /TinyMCE -->
				";
				return $metas;
			}
		?>