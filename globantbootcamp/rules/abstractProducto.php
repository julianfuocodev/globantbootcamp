<?php

abstract class abstractProducto {

    protected $id;
    protected $categoria_id;
	protected $nombre;
	protected $precio;
	protected $stock;
	protected $fecha;
	protected $imagen;
	protected $db;

    abstract protected function getId();
	abstract protected function getCategoria_id();
	abstract protected function getNombre();
	abstract protected function getDescripcion();
	abstract protected function getPrecio();
	abstract protected function getStock();
	abstract protected function getFecha();
	abstract protected function getImagen();


	
    abstract protected function setId($id);
	abstract protected function setCategoria_id($categoria_id);
	abstract protected function setNombre($nombre);
	abstract protected function setDescripcion($descripcion);
	abstract protected function setPrecio($precio);
	abstract protected function setStock($stock);
	abstract protected function setFecha($fecha);
	abstract protected function setImagen($imagen);
}