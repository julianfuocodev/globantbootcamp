<?php

abstract class abstractPedido {

	protected $id;
	protected $usuario_id;
	protected $provincia;
	protected $localidad;
	protected $direccion;
	protected $coste;
	protected $estado;
	protected $fecha;
	protected $hora;
	protected $db;	


	abstract protected function getId();
	abstract protected function getUsuario_id();
	abstract protected function getProvincia();
	abstract protected function getLocalidad() ;
	abstract protected function getDireccion();
	abstract protected function getCoste();
	abstract protected function getEstado();
	abstract protected function getFecha();
	abstract protected function getHora() ;


	abstract protected function setId($id);
	abstract protected function setUsuario_id($usuario_id);
	abstract protected function setProvincia($provincia);
	abstract protected function setLocalidad($localidad);
	abstract protected function setDireccion($direccion);
	abstract protected function setCoste($coste);
	abstract protected function setEstado($estado);
	abstract protected function setFecha($fecha);
	abstract protected function setHora($hora);
}