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
			
			function quitarAcentos($text)
				{
					$text = htmlentities($text, ENT_QUOTES, 'UTF-8');
					$text = strtolower($text);
					$patron = array (
						// Espacios, puntos y comas por guion
						'/[\., ]+/' => '-',
			 
						// Vocales
						'/&agrave;/' => 'a',
						'/&egrave;/' => 'e',
						'/&igrave;/' => 'i',
						'/&ograve;/' => 'o',
						'/&ugrave;/' => 'u',
			 
						'/&aacute;/' => 'a',
						'/&eacute;/' => 'e',
						'/&iacute;/' => 'i',
						'/&oacute;/' => 'o',
						'/&uacute;/' => 'u',
			 
						'/&acirc;/' => 'a',
						'/&ecirc;/' => 'e',
						'/&icirc;/' => 'i',
						'/&ocirc;/' => 'o',
						'/&ucirc;/' => 'u',
			 
						'/&atilde;/' => 'a',
						'/&etilde;/' => 'e',
						'/&itilde;/' => 'i',
						'/&otilde;/' => 'o',
						'/&utilde;/' => 'u',
			 
						'/&auml;/' => 'a',
						'/&euml;/' => 'e',
						'/&iuml;/' => 'i',
						'/&ouml;/' => 'o',
						'/&uuml;/' => 'u',
			 
						'/&auml;/' => 'a',
						'/&euml;/' => 'e',
						'/&iuml;/' => 'i',
						'/&ouml;/' => 'o',
						'/&uuml;/' => 'u',
			 
						// Otras letras y caracteres especiales
						'/&aring;/' => 'a',
						'/&ntilde;/' => 'n',
			 
						// Agregar aqui mas caracteres si es necesario
			 
					);
			 
					$text = preg_replace(array_keys($patron),array_values($patron),$text);
					return $text;
				}
?>