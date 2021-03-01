<?php

// Creo el Modelo producto = tabla sql producto

class Producto{

	//propiedades------------------------------------------------------
	private $id;
	private $categoria_id;
	private $nombre;
	private $descripcion;
	private $precio;
	private $stock;
	private $oferta;
	private $fecha;
	private $imagen;
	private $db;
	


	//coneccion a la base de datos
	public function __construct() {
		$this->db = Database::connect();
	}
	


	//Getters----------------------------------------------------------
	function getId() {
		return $this->id;
	}
	function getCategoria_id() {
		return $this->categoria_id;
	}
	function getNombre() {
		return $this->nombre;
	}
	function getDescripcion() {
		return $this->descripcion;
	}
	function getPrecio() {
		return $this->precio;
	}
	function getStock() {
		return $this->stock;
	}
	function getOferta() {
		return $this->oferta;
	}
	function getFecha() {
		return $this->fecha;
	}
	function getImagen() {
		return $this->imagen;
	}



	//Setters------------------------------------------------------
	function setId($id) {
		$this->id = $id;
	}
	function setCategoria_id($categoria_id) {
		$this->categoria_id = $categoria_id;
	}
	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}
	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}
	function setPrecio($precio) {
		$this->precio = $this->db->real_escape_string($precio);
	}
	function setStock($stock) {
		$this->stock = $this->db->real_escape_string($stock);
	}

	function setOferta($oferta) {
		$this->oferta = $this->db->real_escape_string($oferta);
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}



	//Metodos-------------------------------------------------


	//tomar todos los productos
	public function getAll(){
		$productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
		return $productos;
	}
	


	//tomar todas las categorias
	public function getAllCategory(){
		$sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
				. "INNER JOIN categorias c ON c.id = p.categoria_id "
				. "WHERE p.categoria_id = {$this->getCategoria_id()} "
				. "ORDER BY id DESC";
		$productos = $this->db->query($sql);
		return $productos;
	}
	


	//tomar productos random 
	public function getRandom($limit){
		$productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
		return $productos;
	}
	 


	//tomar producto por id
	public function getOne(){
		$producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}
	


	//guardar productos en la base de datos
	public function save(){

		$result = false;

		//creo el codigo a la sql
		$sql = "INSERT INTO productos VALUES(NULL,
		{$this->getCategoria_id()},
		'{$this->getNombre()}',
		'{$this->getDescripcion()}',
		{$this->getPrecio()},
		{$this->getStock()},
		null,
		CURDATE(),
		'{$this->getImagen()}');";

		//utilizo la query
		$save = $this->db->query($sql);
		
		//verifico
		if($save){
			$result = true;
		}
		return $result;
	}
	


	//editar
	public function edit(){

		$result = false;

		//creo el codigo a la sql
		$sql = "UPDATE productos SET nombre=
		'{$this->getNombre()}',
		descripcion='{$this->getDescripcion()}',
		precio={$this->getPrecio()},
		stock={$this->getStock()},
		categoria_id={$this->getCategoria_id()}";
		
		//en el caso de que no existe concateno codigo sql
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		//concateno codigo buscando producto por id
		$sql .= " WHERE id={$this->id};";
		

		//utilizo la query
		$save = $this->db->query($sql);
		

		//verifico
		if($save){
			$result = true;
		}
		return $result;
	}
	

	//Delete
	public function delete(){

		$result = false;

		//creo el codigo a la sql
		$sql = "DELETE FROM productos WHERE id={$this->id}";

		//utilizo la query
		$delete = $this->db->query($sql);
		
		//verifico
		if($delete){
			$result = true;
		}
		return $result;
	}
	
}