<?php
	require_once('core/view.php');

	class Handler {
		public $com;
		public $id;

		public function get() {
		
			if(isset($_GET['com'])):
				$this->com = $_GET['com'];
			else:
				$this->com = 'com_search';
			endif;
			
			if(isset($_GET['id'])):
				$this->id = $_GET['id'];
			else:
				$this->id = '1';
			endif;
			
		}
	}

	# Creo los objetos tpl(plantilla) y handler (que no es mas que lo de arriba)
	$tpl = new BuildView();
	$handler = new Handler();
	$handler->get();

	# Selecciono el componente adecuado
	if (file_exists('components/' . $handler->com . '/controller.php')) {
		require_once('components/' . $handler->com . '/controller.php');
	} else {
		die("Error al cargar el componente");
	}
	
	# Este es el menu
	require_once('modules/mod_menu/controller.php');
	
	# Escribo el diccionario y lo utilizo con la plantilla
	if(function_exists('build_menu')):
		$tpl->add(build_menu(), '<zero::mainmenu />');
	endif;
	if(function_exists('build_metas')):
		$tpl->add(build_metas($handler->id), '<zero::metas />');
	endif;
	if(function_exists('build_component')):
		$tpl->add(build_component($handler->id), '<zero::content />');
	endif;
	
	require_once('components/com_topsearch/controller.php');
	$tpl->add(build_module('venta'), '<zero::topsearchsell />');
	$tpl->add(build_module('alquiler'), '<zero::topsearchrent />');
	$tpl->render();

?>