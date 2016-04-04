<?php
			function validateUsername($name){  
				//NO cumple longitud minima  
				if(strlen($name) < 3)  
					return false;  
				//SI longitud pero NO solo caracteres A-z  
				else if(!preg_match("/^[a-zA-Z]+$/", $name))  
					return false;  
				// SI longitud, SI caracteres A-z  
				else  
					return true;  
			}  
			  
			function validateEmail($email){   
				// SI escrito, NO VALIDO email  
				if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))  
					return false;  
				// SI rellenado, SI email valido  
				else  
					return true;  
			}
?>