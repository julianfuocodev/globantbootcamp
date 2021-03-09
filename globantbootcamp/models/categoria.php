<?php

require_once "rules/abstractCategoria.php";
require_once "rules/traitsDatabase.php";

// Creo el Modelo Categoria = tabla sql categoria

class Categoria extends abstractCategoria{

	use traitsDatabase;

	//Getters----------------------------------------------------------
	public function getId() {
		return $this->id;
	}
	public function getNombre() {
		return $this->nombre;
	}

	//Setters----------------------------------------------------------
	public function setId($id) {
		$this->id = $id;
	}
	public function setNombre($nombre) {
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