<!--vista de panel de control de productos-->


<div class="container-fluid text-center">

    <!--Titulo-->
    <h1 class="text-center">Panel de control de productos</h1>

    <!--Crear producto ir a vista de crear producto-->
    <div class="m-4">
        <a href="<?=base_url?>producto/crear"
            class="text-center text-white text-decoration-none h3 border rounded-pill p-2 m-4 bg-dark">
            Crear producto
        </a>
    </div>

    <!--Se creo correctamente-->
    <?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <h4 class="text-success">El producto se ha creado correctamente</h4>

	<!--No se creo correctamente-->
    <?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <h4 class="text-danger">El producto NO se ha creado correctamente</h4>

    <?php endif; ?>

	<!--Cerrar sesion del producto crear-->
    <?php MyGlobalFunction::deleteSession('producto'); ?>

	<!--Se borro correctamente-->
    <?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <h4 class="text-success">El producto se ha borrado correctamente</h4>

	<!--No se borro correctamente-->
    <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <h4 class="text-danger">El producto NO se ha borrado correctamente</h4>

    <?php endif; ?>

	<!--Cerrar sesion del producto borrar-->
    <?php MyGlobalFunction::deleteSession('delete'); ?>
 
 	<!--Creo mi tabla de productos-->
    <table class="d-flex justify-content-center">
		
		<!--indice-->
        <tr>
            <th class="p-2">ID</th>
            <th class="p-2">NOMBRE</th>
            <th class="p-2">PRECIO</th>
            <th class="p-2">STOCK</th>
            <th class="p-2">ACCIONES</th>
        </tr>

		<!--creo un ciclo while por cada producto para completar la tabla-->
        <?php while($pro = $productos->fetch_object()): ?>
        
		<tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->stock;?></td>

			<!--linkeo a las funciones editar y eliminar-->
            <td>
                <a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="text-success">Editar</a>
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>"
                    class="text-danger">Eliminar</a>
            </td>
        </tr>

		<!--cierro bucle while-->
        <?php endwhile; ?>

    </table>

</div>
<