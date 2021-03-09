<?php

abstract class abstractCategoria {

    protected $id;
	protected $nombre;
    protected $db;


    abstract protected function getId();
	abstract protected function getNombre();



    abstract protected function setId($id);
	abstract protected function setNombre($nombre);

}