<?php
class Producto {
	// property declaration
	public $var = 'a default value';
	public $id;
	public $nombre;
	public $precio;

	// method declaration
	public function displayVar()
	{
		echo $this->var;
	}

	public static function get($id) {
		return "<br/>Se ejecutó get del producto $id<br/>";
	}

	public static function post($data) {
		return "<br/>Se ejecutó post del producto con datos: " . json_encode($data) . "<br/>";
	}

	public static function put($data) {
		return "<br/>Se ejecutó put del producto con datos: " . json_encode($data) . "<br/>";
	}

	public static function delete($id) {
		return "<br/>Se ejecutó delete del producto $id<br/>";
	}
}
?>