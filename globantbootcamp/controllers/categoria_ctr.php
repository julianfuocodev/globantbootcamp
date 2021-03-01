<?php

//Modelo

require_once 'models/categoria.php';
require_once 'models/producto.php';



//Controlador

class categoria_ctr{
	
	//Tomo las categorias y las mando a pantalla

	public function index(){
		MyGlobalFunction::isAdmin();
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		
		//Vista
		require_once 'views/categoria/index.php';
	}
	


	//Metodo ver productos de las categorias

	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir categoria
			$categoria = new Categoria();
			$categoria->setId($id);
			$categoria = $categoria->getOne();
			
			// Conseguir productos;
			$producto = new Producto();
			$producto->setCategoria_id($id);
			$productos = $producto->getAllCategory();
		}
		
		//Vista
		require_once 'views/categoria/ver.php';
	}
	


	//Metodo Crear categoria

	public function crear(){
		MyGlobalFunction::isAdmin();

		//Vista
		require_once 'views/categoria/crear.php';
	}
	


	//Metodo Guardar categoria

	public function save(){
		MyGlobalFunction::isAdmin();

		//Si existe el post
	    if(isset($_POST) && isset($_POST['nombre'])){

			//Guardo la categoria en la base de datos
			$categoria = new Categoria();
			$categoria->setNombre($_POST['nombre']);
			$save = $categoria->save();
		}

		//despues de guardar vuelvo al index
		header("Location:".base_url."categoria/index");
	}
	
}