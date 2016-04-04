		<?php
			include ('components/com_contact/helper.php'); // Cargo las funciones para validar el formulario desde el server
			function build_component() {
				$content = '';
				if ($_POST){
					if (validateUsername($_POST["name"]) && validateEmail($_POST["email"])) {
							$msg = "Nombre: " . $_POST["name"] . "\n" . "Email: " . $_POST["email"] . "\n" . "Conuslta: " . $_POST["query"] . "\n"; 
							$headers = "From: Zero <guefisa@gmail.com>\r\n";
							mail("guefisa@gmail.com","Consulta de " . $_POST["name"],$msg,$headers);
							$content .= "<p>La consulta ha sido correctamente enviada. Muchas gracias.</p>";
						} else {
							$content .= "<p>Ha ocurrido un error al validar el formulario. Por favor vuelva a rellenar el formulario con un nombre y email válidos.</p>";
						}
					}
				$content .='
				<form class="contact_form" name="form1" method="post" action="">
					<fieldset>
						<legend>Formulario de contacto</legend>
						<label>Nombre:</label>
							<input class="text" name="name" type="text" />
						<label>Email:</label>
							<input class="text" name="email" type="text" />
						<label>Consulta:</label>
							<textarea name="query"></textarea>
					</fieldset>
					<input name="submit" type="submit" value="Enviar" />
					<input name="reset" type="reset" value="Cancelar" />
				</form>';
				
				return $content;
			}
			
			function build_metas($article_id) {
				$metas = '<link href="components/com_contact/css/style.css" rel="stylesheet" type="text/css" />';
				return $metas;
			}
		?>