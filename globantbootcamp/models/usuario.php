<?php


require_once "rules/abstractUsuario.php";
require_once "rules/traitsDatabase.php";

/**
 * Usuario Class
 * Model to link Database to controller
 */

class Usuario extends abstractUsuario {


	use traitsDatabase;

	//Getters-----------------------------


	/**
	 * get Usuario Class $id
	 * @return $this->id [number]
	 */	
	public function getId() {
		return $this->id;
	}

	/**
	 * get Usuario Class $nombre
	 * @return $this->nombre [string]
	 */	
	public function getNombre() {
		return $this->nombre;
	}

	/**
	 * get Usuario Class $apellidos
	 * @return $this->apellidos [string]
	 */	
	public function getApellidos() {
		return $this->apellidos;
	}

	/**
	 * get Usuario Class $email
	 * @return $this->email [string]
	 */	
	public function getEmail() {
		return $this->email;
	}

	/**
	 * get Usuario Class $password
	 * @return hash $this->password 
	 */	
	public function getPassword() {

		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	/**
	 * get Usuario Class $rol
	 * @return $this->rol [string]
	 */	
	public function getRol() {
		return $this->rol;
	}

	/**
	 * get Usuario Class $imagen
	 * @return $this->imagen [string]
	 */	
	public function getImagen() {
		return $this->imagen;
	}


	//Setters-----------------------

	/**
	 * set Usuario Class $id
	 * save $this->id [number]
	 */	
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * set Usuario Class $nombre
	 * save $this->nombre scaped for special characters for use in sql [string]
	 */	
	public function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	/**
	 * set Usuario Class $apellidos
	 * save $this->apellidos scaped for special characters for use in sql [string]
	 */
	public function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	/**
	 * set Usuario Class $email
	 * save $this->email scaped for special characters for use in sql [string]
	 */
	public function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	/**
	 * set Usuario Class $password
	 * save $this->password [string]
	 */	
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * set Usuario Class $rol
	 * save $this->rol [string]
	 */	
	public function setRol($rol) {
		$this->rol = $rol;
	}

	/**
	 * set Usuario Class $imagen
	 * save $this->imagen [string]
	 */	
	public function setImagen($imagen) {
		$this->imagen = $imagen;
	}



	/**
	 *@var $sql build sql insert
	 *@var $save send $sql query to db
	 */	
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
	


	/**
	 *@var $sql build sql insert
	 *@var $login send $sql query to db
	 */	
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