<?php

// Creo el Modelo Usuario = tabla sql usuario

class Usuario{

	//propiedades------------------------------------------------------
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
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
	function getNombre() {
		return $this->nombre;
	}
	function getApellidos() {
		return $this->apellidos;
	}
	function getEmail() {
		return $this->email;
	}
	function getPassword() {
		//Metodo para guardar el password encriptado
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}
	function getRol() {
		return $this->rol;
	}
	function getImagen() {
		return $this->imagen;
	}


	//Setters------------------------------------------------------
	function setId($id) {
		$this->id = $id;
	}
	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}
	function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}
	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}
	function setPassword($password) {
		$this->password = $password;
	}
	function setRol($rol) {
		$this->rol = $rol;
	}
	function setImagen($imagen) {
		$this->imagen = $imagen;
	}



	//Metodos-------------------------------------------------


	//save
	public function save(){

		$result = false;

		//creo el codigo a la sql
		$sql = "INSERT INTO usuarios VALUES(NULL,
		'{$this->getNombre()}',
		'{$this->getApellidos()}',
		'{$this->getEmail()}',
		'{$this->getPassword()}',
		'user',
		null);";

		//utilizo la query
		$save = $this->db->query($sql);

		//verifico que traiga informacion
		if($save){
			$result = true;
		}
		return $result;		
	
	}
	


	//Login
	public function login(){

		$result = false;
		$email = $this->email;
		$password = $this->password;
		
		//creo el codigo a la sql
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";

		//utilizo la query
		$login = $this->db->query($sql);
		
		//verifico que traiga informacion
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			
			//verifico la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}
	
	
	
}