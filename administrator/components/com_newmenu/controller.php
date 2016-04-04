		<?php
		require_once ('components/com_newmenu/newmenu.php');
		require_once ('components/com_newmenu/helper.php');
		
			function build_component() {
				if ($_POST){
					if ($_POST['item_alias'] == '') {
						$_POST['item_alias'] = quitarAcentos($_POST['item_name']);
					}
					$article = new newMenu();
					$article->insert($_POST);
					
					$content = '<div style="margin:150px 0; text-align: center;"><h3>Menu item agregado correctamente</h3><p><a href="?com=com_listmenu"><input style="padding:5px 15px; font-size: 1em;" name="aceptar" type="button" value="Aceptar" /></a></p></div>';
					return $content;
					
				} else 	{
							$content ='
							<form class="article_form" name="item_data" method="post" action="">
								<fieldset>
									<legend>Editor de menús</legend>
									<label>Nombre:</label>
										<input class="text" name="item_name" type="text" />
									<label>Alias:</label>
										<input class="text" name="item_alias" type="text" />
									<label>URL:</label>
										<input class="text" name="item_url" type="text" />
									<label>Posición:</label>
										<input class="text" name="item_pos" type="text" />
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