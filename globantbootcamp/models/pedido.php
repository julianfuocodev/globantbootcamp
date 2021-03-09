<?php


require_once "rules/abstractPedido.php";
require_once "rules/traitsDatabase.php";

// Creo el Modelo Pedido = tabla sql pedidos

class Pedido extends abstractPedido {


	use traitsDatabase;

	
	//Getters-----------------------------------------------------------
	public function getId() {
		return $this->id;
	}
	public function getUsuario_id() {
		return $this->usuario_id;
	}
	public function getProvincia() {
		return $this->provincia;
	}
	public function getLocalidad() {
		return $this->localidad;
	}
	public function getDireccion() {
		return $this->direccion;
	}
	public function getCoste() {
		return $this->coste;
	}
	public function getEstado() {
		return $this->estado;
	}
	public function getFecha() {
		return $this->fecha;
	}
	public function getHora() {
		return $this->hora;
	}



	//Setters-----------------------------------------------------------
	public function setId($id) {
		$this->id = $id;
	}
	public function setUsuario_id($usuario_id) {
		$this->usuario_id = $usuario_id;
	}
	public function setProvincia($provincia) {
		$this->provincia = $this->db->real_escape_string($provincia);
	}
	public function setLocalidad($localidad) {
		$this->localidad = $this->db->real_escape_string($localidad);
	}
	public function setDireccion($direccion) {
		$this->direccion = $this->db->real_escape_string($direccion);
	}
	public function setCoste($coste) {
		$this->coste = $coste;
	}
	public function setEstado($estado) {
		$this->estado = $estado;
	}
	public function setFecha($fecha) {
		$this->fecha = $fecha;
	}
	public function setHora($hora) {
		$this->hora = $hora;
	}


	//Metodos --------------------------------------------------------------------



	//tomar todo
	public function getAll(){

		//creo variable ya definida con el query y el sql
		$productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
		return $productos;
	}
	

	//tomar por id
	public function getOne(){

		//creo variable ya definida con el query y el sql
		$producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}
	


	//tomar por usuario
	public function getOneByUser(){

		//creo coneccion al sql
		$sql = "SELECT p.id, p.coste FROM pedidos p "
				. "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";
			
		//utilizo query		
		$pedido = $this->db->query($sql);
		
		//retorno en objeto
		return $pedido->fetch_object();
	}
	


	//tomar todos los pedidos de todos los usuarios
	public function getAllByUser(){

		//creo coneccion al sql
		$sql = "SELECT p.* FROM pedidos p "
				. "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";
		
		//utilizo query
		$pedido = $this->db->query($sql);
			
		return $pedido;
	}
	
	

	//tomar los productos por pedido
	public function getProductosByPedido($id){

		//creo coneccion al sql
		$sql = "SELECT pr.*, lp.unidades FROM productos pr "
				. "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
				. "WHERE lp.pedido_id={$id}";
		
		//utilizo query
		$productos = $this->db->query($sql);
			
		return $productos;
	}
	


	//save
	public function save(){

		$result = false;

		//creo coneccion al sql
		$sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getProvincia()}', '{$this->getLocalidad()}', '{$this->getDireccion()}', {$this->getCoste()}, 'confirm', CURDATE(), CURTIME());";
		
		//utilizo query
		$save = $this->db->query($sql);
		
		//verifico
		if($save){
			$result = true;
		}
		return $result;
	}
	


	//save en pedidos linkeados
	public function save_linea(){

		$result = false;

		//creo coneccion al sql
		$sql = "SELECT LAST_INSERT_ID() as 'pedido';";

		//utilizo query
		$query = $this->db->query($sql);

		//tomo el pedido del objeto
		$pedido_id = $query->fetch_object()->pedido;
		

		//hago un foreach por los elementos de la session carrito para linkear pedido
		foreach($_SESSION['carrito'] as $elemento){
			$producto = $elemento['producto'];
			
			//creo codigo sql con cada producto de la session
			$insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";

			//utilizo query
			$save = $this->db->query($insert);
			
		}
		
		//verifico
		if($save){
			$result = true;
		}
		return $result;
	}
	


	//editar
	public function edit(){

		$result = false;

		//creo coneccion al sql
		$sql = "UPDATE pedidos SET estado='{$this->getEstado()}' ";

		//concateno texto al sql
		$sql .= " WHERE id={$this->getId()};";
		
		//utilizo el query
		$save = $this->db->query($sql);
		
		//verficio
		if($save){
			$result = true;
		}
		return $result;
	}
}