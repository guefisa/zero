		<?php
		require_once ('components/com_newArticle/newArticle.php');
		require_once ('components/com_newArticle/helper.php');
		
			function build_component() {
				$content = '';
				if ($_POST){
					if ($_POST['article_alias'] == '') {
						$_POST['article_alias'] = quitarAcentos($_POST['article_title']);
					}
					$article = new newArticle();
					$article->set($_POST);
					
					$content = '<div style="margin:150px 0; text-align: center;"><h3>Artículo guardado correctamente</h3><p><a href="?com=com_listArticle"><input style="padding:5px 15px; font-size: 1em;" name="aceptar" type="button" value="Aceptar" /></a></p></div>';
					return $content;
					
				} else 	{
							# Este formulario tiene los campos alias y metas ocultos para poder usarlos si es neceserio que el cliente pueda editar este contenido
							$content ='
							<form class="article_form" name="article_data" method="post" action="">
								<fieldset>
									<legend>Editor de articulos</legend>
									<label>Título:</label>
										<input class="text" name="article_title" type="text" />
									<!-- <label>Alias:</label> -->
										<input class="text" name="article_alias" type="hidden" />
									<!-- <label>Metas:</label> -->
										<input class="text" name="article_metas" type="hidden" />
									<label>Contenido:</label>
										<textarea name="article_content"></textarea>
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