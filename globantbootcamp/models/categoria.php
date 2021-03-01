<?php

// Creo el Modelo Categoria = tabla sql categoria

class Categoria{

	//propiedades-------------------------------------------------------------
	private $id;
	private $nombre;
	private $db;
	

	//coneccion a la base de datos
	public function __construct() {
		$this->db = Database::connect();
	}
	

	//Getters----------------------------------------------------------
	function getId() {
		return $this->id;
	}
	function getNombre() {
		return $this->nombre;
	}

	//Setters----------------------------------------------------------
	function setId($id) {
		$this->id = $id;
	}
	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}


	//Metodos-------------------------------------------------------------

	//tomar todo
	public function getAll(){

		//creo variable ya definida con el query y el sql
		$categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
		return $categorias;
	}
	


	//tomar por id
	public function getOne(){
		
		//creo variable ya definida con el query y el sql
		$categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	


	//guardar
	public function save(){

		$result = false;

		//creo el codigo a la sql
		$sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";

		//utilizo query
		$save = $this->db->query($sql);
		
		//verifico
		if($save){
			$result = true;
		}
		return $result;
	}
	
	
}