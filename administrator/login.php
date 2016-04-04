<?php
	if (isset($_POST['submit'])) {
		//vemos si el usuario y contraseña es váildo 
		if ($_POST["user"]=="admin" && $_POST["pass"]=="1234"){ 
			//usuario y contraseña válidos 
			//defino una sesion y guardo datos 
			session_start(); 
			$_SESSION["autentificado"]= "SI"; 
			header ("Location: index.php");	
		} else { 
			//si no existe le mando otra vez a la portada 
			header("Location: login.php?errorusuario=si"); 
		} 
	} else {
?>
<html> 
<head> 
	<title>Autentificación PHP</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head> 

<body>
		<form action="" method="POST"> 
			<table align="center" width="225" cellspacing="2" cellpadding="2" border="0"> 
				<tr> 
					<td colspan="2" align="center"> 
					<?php
						if (isset($_GET["errorusuario"])) {
							if ($_GET["errorusuario"]=="si") {
								echo '<span style="color:red">DATOS INCORRECTOS</span>';
							}
						} else {
								echo '<span style="color:green">ACCESO</span>';
						}
					?>
					</td>
				</tr> 
				<tr> 
					<td align="right">Usuario:</td> 
					<td><input type="Text" name="user" size="8" maxlength="50"></td> 
				</tr> 
				<tr> 
					<td align="right">Contraseña:</td> 
					<td><input type="password" name="pass" size="8" maxlength="50"></td> 
				</tr> 
				<tr> 
					<td colspan="2" align="center"><input type="submit" name="submit" value="Aceptar"></td> 
				</tr> 
			</table> 
		</form> 
	<?php
		}
	?>
</body> 

</html> 