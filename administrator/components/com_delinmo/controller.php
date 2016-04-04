<?php
	require_once('components/com_delinmo/del_inmo.php');
	
	function build_component() {
				$content = '';
				if (isset($_POST['submit'])){
				
					function rrmdir($dir) {
						foreach(glob($dir . '/*') as $file) {
							if(is_dir($file))
								rrmdir($file);
							else
								unlink($file);
						}
						rmdir($dir);
					}
					$img_dir = '../images/' . $_GET['id'];
					@rrmdir($img_dir);
					
					$inmo = new delInmo();
					$inmo->del($_GET['id']);
					
					$content = '<div style="margin:150px 0; text-align: center;"><h3>Inmueble eliminado correctamente</h3><p><a href="?com=com_listinmo"><input style="padding:5px 15px; font-size: 1em;" name="aceptar" type="button" value="Aceptar" /></a></p></div>';
					
				} else 	{
					# Formulario basico de confirmación
					$content ='
					<form style="margin:150px 0; text-align: center;" name="confirm_form" method="post" action="">
						<h3>Confirma que desea eliminar el inmueble</h3>
						<p>
							<input style="padding:5px 15px; font-size: 1em;" name="submit" type="submit" value="Aceptar" />
							<a href="?com=com_listinmo"><input style="padding:5px 15px; font-size: 1em;" name="cancel" type="button" value="Cancelar" /></a>
						</p>
					</form>';
				}
				return $content;
	}
	
	function build_metas() {
	}
?>