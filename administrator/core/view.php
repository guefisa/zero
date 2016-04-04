<?php

	class BuildView {
	
		public $dictionary = array();
		public $template;
		
		public function add ($html, $pos) {
			$this->dictionary[$pos] = $html;
		}
		
		# Carga la plantilla HTML en una variable y reemplaza las marcas con el contenido dinamico
		public function render () {
			$this->template = file_get_contents("templates/default/index.html");
			if ($this->dictionary !=''):
				foreach ($this->dictionary as $key => $value) {
					$this->template = str_replace($key, $value, $this->template);
				}
			endif;
			print $this->template;
		}
	}
	
?>