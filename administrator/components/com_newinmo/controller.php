		<?php
		require_once ('components/com_newinmo/newinmo.php');
		require_once ('components/com_newinmo/helper.php');
		
			function build_component() {
				$content = '';
				if ($_POST){
					# Con esto creo una variable con los nombres de las imagenes que voy a subir
					$inmo_images = '';
					foreach ($_FILES["archivos"]["error"] as $key => $error) {
						if ($error == UPLOAD_ERR_OK) {
							$tmp_name = $_FILES["archivos"]["tmp_name"][$key];
							$name = $_FILES["archivos"]["name"][$key];
							$name = quitarAcentos($name);
							$name = strtolower($name);
							$inmo_images .= $name . '&';
						}
					}
					# Inserto los datos en la base de datos y recupero el id de referencia
					$inmo = new newInmo();
					$inmo->insert($_POST, $inmo_images);
							# Creo una carpeta con el id de referencia y subo las imagenes a esta carpeta
							@mkdir('../images/' . $inmo->inmo_id);
							$uploads_dir = '../images/' . $inmo->inmo_id;
							foreach ($_FILES["archivos"]["error"] as $key => $error) {
								if ($error == UPLOAD_ERR_OK) {
									$tmp_name = $_FILES["archivos"]["tmp_name"][$key];
									$name = $_FILES["archivos"]["name"][$key];
									$name = quitarAcentos($name);
									$name = strtolower($name);
									move_uploaded_file($tmp_name, "$uploads_dir/$name");
								}
							}
					$content .= '<div style="margin:150px 0; text-align: center;"><h3>El inmueble ref: ' . $inmo->inmo_id . ' ha sido agregado correctamente</h3><p><a href="?com=com_listinmo"><input style="padding:5px 15px; font-size: 1em;" name="aceptar" type="button" value="Aceptar" /></a></p></div>';
				
					return $content;
					
				} else 	{
							$content ='
							<form class="article_form" name="inmo_data" method="post" action="" enctype="multipart/form-data">
								<fieldset>
									<legend>Editor de inmuebles</legend>
									<div class="head">
										<label>Nombre del inmueble:</label>
											<input class="text" name="inmo_name" type="text" />
										<label>Tipo de operación:</label>
											<select name="inmo_op">
												<option>Venta</option>
												<option>Alquiler</option>
											</select>
										<label>Tipo de inmueble:</label>
											<select name="inmo_type">
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
									</div>
									<div class="head">
										<label>Dimensiones (m²) :</label>
											<input class="text" name="inmo_size" type="text" />
										<label>Habitaciones:</label>
											<select name="inmo_habit">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
											</select>
										<label>Baños:</label>
											<select name="inmo_wc">
												<option>1</option>
												<option>2</option>
												<option>3</option>
											</select>
									</div>
									<div class="head">
										<label>Precio:</label>
											<input class="text" name="inmo_price" type="text" />
									</div>
									<label>Descripción:</label>
										<textarea name="inmo_info"></textarea>
									<label>Adjuntar imagenes:</label>
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
				$metas = '<link href="components/com_newinmo/css/style.css" rel="stylesheet" type="text/css" />';
				$metas .= '<script src="components/com_newinmo/multi.js"></script>';
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