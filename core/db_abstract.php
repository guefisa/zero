<?php
	abstract class DBAbstract {
	
		private static $db_host = ''; // ej: 'localhost'
		private static $db_user = '';
		private static $db_pass = '';
		private static $db_name = '';
		
		protected $conn;	// Contiene el objeto que conecta con la DB
		protected $query;	// Para guardar la consulta SQL a la DB
		protected $rows;	// Para guardar los resultados de la consulta a la DB
		
		private function open_connection() {
			$this->conn = new mysqli(self::$db_host, self::$db_user, self::$db_pass, self::$db_name);
			$this->conn->query("SET NAMES 'utf8'");
			if (mysqli_connect_errno()):
				die("<p>No se puede conectar a la base de datos: " . mysqli_connect_error() . "</p>");
			endif;
		}
		
		private function close_connection() {
			$this->conn->close();
		}

		protected function execute_single_query() {
			$this->open_connection();
			$this->conn->query($this->query);
			$this->close_connection();
		}
		
		protected function get_results_from_query() {
			$this->open_connection();
			$result = $this->conn->query($this->query);
			$this->rows = array(); // Vacío el array de la propiedad $rows
			while ($this->rows[] = $result->fetch_assoc());
			$result->close();
			array_pop($this->rows); // Elimino la última fila que while agrega porque está vacía
			$this->close_connection();
		}
	}
?>