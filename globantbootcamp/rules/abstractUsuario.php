<?php

abstract class abstractUsuario {

		/**
		 * @var $id [number]
		 * refer sql usuarios table [id]
		 */
		protected $id;
	
		/**
		 * @var $nombre [string]
		 * refer sql usuarios table [nombre]
		 */
		protected $nombre;
	
		/**
		 * @var $apellidos [string]
		 * refer sql usuarios table [apellidos]
		 */
		protected $apellidos;
	
		/**
		 * @var $email [string]
		 * refer sql usuarios table [email]
		 */
		protected $email;
	
		/**
		 * @var $password [mixed]
		 * refer sql usuarios table [password]
		 */
		protected $password;
	
		/**
		 * @var $rol [string]
		 * refer sql usuarios table [rol]
		 */
		protected $rol;
	
		/**
		 * @var $imagen [string]
		 * refer sql usuarios table [imagen]
		 */
		protected $imagen;
		/**
		* @var $db 
		* refer Database
		*/
		protected $db;
			
	
		/**
		 * get Usuario Class $id
		 * @return $this->id [number]
		 */	
		abstract protected function getId();
	
		/**
		 * get Usuario Class $nombre
		 * @return $this->nombre [string]
		 */	
		abstract protected function getNombre();
	
		/**
		 * get Usuario Class $apellidos
		 * @return $this->apellidos [string]
		 */	
		abstract protected function getApellidos();
	
		/**
		 * get Usuario Class $email
		 * @return $this->email [string]
		 */	
		abstract protected function getEmail();
	
		/**
		 * get Usuario Class $password
		 * @return hash $this->password 
		 */	
		abstract protected function getPassword();
	
		/**
		 * get Usuario Class $rol
		 * @return $this->rol [string]
		 */	
		abstract protected function getRol();
	
		/**
		 * get Usuario Class $imagen
		 * @return $this->imagen [string]
		 */	
		abstract protected function getImagen();
	
	


		/**
		 * set Usuario Class $id
		 * save $this->id [number]
		 */	
		abstract protected function setId($id);
	
		/**
		 * set Usuario Class $nombre
		 * save $this->nombre scaped for special characters for use in sql [string]
		 */	
		abstract protected function setNombre($nombre);
	
		/**
		 * set Usuario Class $apellidos
		 * save $this->apellidos scaped for special characters for use in sql [string]
		 */
		abstract protected function setApellidos($apellidos);
	
		/**
		 * set Usuario Class $email
		 * save $this->email scaped for special characters for use in sql [string]
		 */
		abstract protected function setEmail($email);
	
		/**
		 * set Usuario Class $password
		 * save $this->password [string]
		 */	
		abstract protected function setPassword($password);
	
		/**
		 * set Usuario Class $rol
		 * save $this->rol [string]
		 */	
		abstract protected function setRol($rol);
	
		/**
		 * set Usuario Class $imagen
		 * save $this->imagen [string]
		 */	
		abstract protected function setImagen($imagen);
	
	
}