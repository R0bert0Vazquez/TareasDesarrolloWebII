<?php
require_once 'Producto.php';

	/***
	 * Modificar el código para que las funciones sean métodos de una clase llamada Producto.
	 * Usar una función php para llamar al método correspondiente de la clase Producto,
	 * dependiendo del método http usado en la solicitud. Ejemplo:
	 * 
	 *     Petición				|		Método a ejecutar
	 * -------------------------------------------------------------
	 * GET localhost/producto/1       	Producto::get(10) 
	 * POST localhost/producto/		  	Producto::post({"id":2, "nombre":"laptop", "precio":10000})
	 *  body: 
	 * 		{"id":2, 
	 * 		 "nombre":"laptop", 
	 * 		 "precio":10000}
	 * 
	 * PUT localhost/producto/		  	Producto::post({"id":2, "nombre":"Computadora de escritorio", "precio":15000})
	 *  body: 
	 * 		{"id":2, 
	 * 		 "nombre":"Computadora de escritorio", 
	 * 		 "precio":15000}
	 * 
	 * DELETE localhost/producto/2    	Producto::delete(2) 
	 */

	// mostrarle al cliente que ruta esta escribiendo y el método
	echo $_GET['PATH_INFO'];
	echo "<br/> {$_SERVER['REQUEST_METHOD'] } ";

	// Parametros que necesitamos de la ruta
	$parameters = explode('/',$_GET['PATH_INFO']);
	$recurso = $parameters[0];
	$id = isset($parameters[1]) ? $parameters[1] : null;
	$request_method = $_SERVER['REQUEST_METHOD'];

	$resultado = '';

	try {
		switch($request_method) {
			case 'GET':
				$resultado = Producto::get($id);
				break;
			case 'POST':
				$data = json_decode(file_get_contents('php://input'), true);
				$resultado = Producto::post($data);
				break;
			case 'PUT':
				$data = json_decode(file_get_contents('php://input'), true);
				$resultado = Producto::put($data);
				break;
			case 'DELETE':
				$resultado = Producto::delete($id);
				break;
			default:
				$resultado = "Método no soportado";
		}
	} catch (Exception $e) {
		$resultado = "Error: " . $e->getMessage();
	}

	echo $resultado;

?> 