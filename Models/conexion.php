<?php

class Conexion{

	public static function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=gestor-moctezuma","root","");
		return $link;

	}

}