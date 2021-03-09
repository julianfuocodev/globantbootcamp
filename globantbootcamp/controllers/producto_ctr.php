<?php

//Modelo

require_once 'models/producto.php';



//Controlador

class producto_ctr{
	

	//Metodo mostrar producto

	public function index(){
		$producto = new Producto();

		//Tomo 9 productos random
		$productos = $producto->getRandom(9);
	
		//Vista
		require_once 'views/producto/destacados.php';
	}
	


	//Metodo ver producto seleccionado

	public function ver(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		
			$producto = new Producto();
			$producto->setId($id);
			
			//Tomo 1 producto
			$product = $producto->getOne();
			
		}

		//Vista
		require_once 'views/producto/ver.php';
	}
	


	//Metodo gestionar producto
	
	public function gestion(){
		MyGlobalFunction::isAdmin();
		
		//tomo todos los productos
		$producto = new Producto();
		$productos = $producto->getAll();
		
		//vista
		require_once 'views/producto/gestion.php';
	}
	


	//Metodo vista crear producto

	public function crear(){
		MyGlobalFunction::isAdmin();

		//vista
		require_once 'views/producto/crear.php';
	}
	


	//Metodo guardar producot en la base de datos

	public function save(){
		MyGlobalFunction::isAdmin();
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $descripcion && $precio && $stock && $categoria){
				$producto = new Producto();
				$producto->setNombre($nombre);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				$producto->setCategoria_id($categoria);
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
					
					$save = $producto->edit();
				}else{
					$save = $producto->save();
				}
				
				if($save){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
			}else{
				$_SESSION['producto'] = "failed";
			}
		}else{
			$_SESSION['producto'] = "failed";
		}
		header('Location:'.base_url.'producto/gestion');
	}
	


	//Metodo editar producto

	public function editar(){
		MyGlobalFunction::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Producto();
			$producto->setId($id);
			
			$pro = $producto->getOne();
			
			require_once 'views/producto/crear.php';
			
		}else{
			header('Location:'.base_url.'producto/gestion');
		}
	}
	


	//Metodo eliminar producto

	public function eliminar(){
		MyGlobalFunction::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		header('Location:'.base_url.'producto/gestion');
	}
	
}