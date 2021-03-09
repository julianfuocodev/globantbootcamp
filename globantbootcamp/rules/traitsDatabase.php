<?php

trait traitsDatabase {


	/**
     * Set construct for build a database conection
	 * 
	 * @var $db
     *
     * @return $this->db that is a Database conection
     */
	
	public function __construct() {
		$this->db = Database::connect();
	}

}