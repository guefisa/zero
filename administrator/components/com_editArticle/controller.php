		<?php
		require_once ('components/com_editArticle/editArticle.php');
		require_once ('components/com_editArticle/helper.php');
		
		# Hago una copia del componente com_content para llamar al articulo con un nombre de funcion diferente ya que me daba error porque puse el mismo #################
			require_once('../components/com_content/article.php');

			function get_article($article_id) {
				$article = new Article();
				$article->get_article($article_id);
				if ($article->article_content != ''):
					return $article->article_content;
				else:
					die('<p>Error: No se encuentra el articulo</p>');
				endif;
			}
			
			function get_name($article_id) {
				$article = new Article();
				$article->get_article($article_id);
				if ($article->article_content != ''):
					return $article->article_name;
				else:
					die('<p>Error: No se encuentra el articulo</p>');
				endif;
			}
			
			function get_alias($article_id) {
				$article = new Article();
				$article->get_article($article_id);
				if ($article->article_content != ''):
					return $article->article_alias;
				else:
					die('<p>Error: No se encuentra el articulo</p>');
				endif;
			}
			
			function get_metas($article_id) {
				$article = new Article();
				$article->get_article($article_id);
				if ($article->article_content != ''):
					return $article->article_metas;
				else:
					die('<p>Error: No se encuentra el articulo</p>');
				endif;
			}		
		####################################################################################################################################################################
	
			function build_component() {
				$id_art = @$_GET[id];
				$art_cont = get_article($id_art);
				$art_name = get_name($id_art);
				$art_alias = get_alias($id_art);
				$art_metas = get_metas($id_art);
				
				$content = '';
				if ($_POST){
					if ($_POST['article_alias'] == '') {
						$_POST['article_alias'] = quitarAcentos($_POST['article_title']);
					}
					$article = new newArticle();
					$article->set($_POST, $id_art);
				} else 	{
							# Este formulario tiene los campos alias y metas ocultos para poder usarlos si es neceserio que el cliente pueda editar este contenido
							$content ='
							<form class="article_form" name="article_data" method="post" action="">
								<fieldset>
									<legend>Editor de articulos</legend>
									<label>Título:</label>
										<input class="text" name="article_title" type="text" value="' . $art_name . '" />
									<!-- <label>Alias:</label> -->
										<input class="text" name="article_alias" type="hidden" value="' . $art_alias . '" />
									<!-- <label>Metas:</label> -->
										<input class="text" name="article_metas" type="hidden" value="' . $art_metas . '" />
									<label>Contenido:</label>
										<textarea name="article_content">' . $art_cont . '</textarea>
								</fieldset>
								<div class="article_footer">
								<input name="submit" type="submit" value="Guardar" />
								<a href="?com=com_listArticle"><input name="cancel" type="button" value="Cancelar" /></a>
								</div>
							</form>';
						}
				
				return $content;
			}
			
			function build_metas($article_id) {
				$metas = '<link href="components/com_newArticle/css/style.css" rel="stylesheet" type="text/css" />';
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