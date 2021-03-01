<?php

//Coneccion a la base de datos mediate clase


class Database{

	//Metodo conectar
	public static function connect(){

		//Entro a la base de datos
		$db = new mysqli('localhost', 'root', '', 'testing3');

		//Seteo el alfabeto utf8
		$db->query("SET NAMES 'utf8'");
		
		return $db;
	}
}

