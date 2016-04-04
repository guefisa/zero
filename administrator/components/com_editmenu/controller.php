		<?php
		require_once ('components/com_editmenu/editmenu.php');
		require_once ('components/com_editmenu/helper.php');
		
		# Hago una copia del componente com_content para llamar al articulo con un nombre de funcion diferente ya que me daba error porque puse el mismo #################
			require_once('components/com_editmenu/menuload.php');

			function get_name($id) {
				$item = new menuItem();
				$item->get_item($id);
				return $item->item_name;
			}
			
			function get_alias($id) {
				$item = new menuItem();
				$item->get_item($id);
				return $item->item_alias;
			}
			
			function get_url($id) {
				$item = new menuItem();
				$item->get_item($id);
				return $item->item_url;
			}
			
			function get_pos($id) {
				$item = new menuItem();
				$item->get_item($id);
				return $item->item_pos;
			}		
		####################################################################################################################################################################
	
			function build_component() {
				$id = @$_GET[id];
				$item_name = get_name($id);
				$item_alias = get_alias($id);
				$item_url = get_url($id);
				$item_pos = get_pos($id);
				
				$content = '';
				if ($_POST){
					if ($_POST['item_alias'] == '') {
						$_POST['item_alias'] = quitarAcentos($_POST['item_name']);
					}
					$edit = new editItem();
					$edit->set($_POST, $id);
					
					$content .= '<div style="margin:150px 0; text-align: center;"><h3>El Item de menú ha sido modificado correctamente</h3><p><a href="?com=com_listmenu"><input style="padding:5px 15px; font-size: 1em;" name="aceptar" type="button" value="Aceptar" /></a></p></div>';
					return $content;
					
				} else 	{
							$content ='
							<form class="article_form" name="article_data" method="post" action="">
								<fieldset>
									<legend>Editor de articulos</legend>
									<label>Nombre:</label>
										<input class="text" name="item_name" type="text" value="' . $item_name . '" />
									<label>Alias:</label>
										<input class="text" name="item_alias" type="text" value="' . $item_alias . '" />
									<label>URL:</label>
										<input class="text" name="item_url" type="text" value="' . $item_url . '" />
									<label>POS:</label>
										<input class="text" name="item_pos" type="text" value="' . $item_pos . '" />
								</fieldset>
								<div class="article_footer">
								<input name="submit" type="submit" value="Guardar" />
								<a href="?com=com_listmenu"><input name="cancel" type="button" value="Cancelar" /></a>
								</div>
							</form>';
						}
				
				return $content;
			}
			
			function build_metas($article_id) {
				$metas = '<link href="components/com_newArticle/css/style.css" rel="stylesheet" type="text/css" />';
				return $metas;
			}
		?>