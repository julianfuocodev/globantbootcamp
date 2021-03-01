<!--Vista del Carrito-->
<div class="container-fluid">

	<!--Titulo-->
    <h1 class="text-center">Tu carrito</h1>

    
    <?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>

    <!--Creo tabla del carrito-->
    <table class="d-flex justify-content-center m-4 p-4">
        <tr>
            <th class="m-4 p-4">Imagen</th>
            <th class="m-4 p-4">Nombre</th>
            <th class="m-4 p-4">Precio</th>
            <th class="m-4 p-4">Unidades</th>
            <th class="m-4 p-4">Funcion</th>
        </tr>

        <!--Creo un forech de los elementos-->
        <?php foreach($carrito as $indice => $elemento):$producto = $elemento['producto'];?>

        <tr>
			<!--img-->
            <td>
                <?php if ($producto->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img-thumbnail card-img-top"
                    width="100" height="100" />
                <?php endif; ?>
            </td>

			<!--name-->		
            <td>
                <a href="<?= base_url ?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            </td>

			<!--valor-->
            <td>
                <?=$producto->precio?>
            </td>

			<!--cantidad-->
            <td>
                <div>
					<?=$elemento['unidades']?>
					<!--llamo a la funcion sumar-->
                    <a href="<?=base_url?>carrito/up&index=<?=$indice?>" class="text-center text-white text-decoration-none border rounded-pill p-1 m-1 bg-dark">+</a>
					<!--llamo a la funcion restar-->
                    <a href="<?=base_url?>carrito/down&index=<?=$indice?>" class="text-center text-white text-decoration-none border rounded-pill p-1 m-1 bg-dark">-</a>
                </div>
            </td>

			<!--Llamo a la funcion sacar del carrito-->
            <td>
                <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="text-center text-white text-decoration-none border rounded-pill p-1 m-1 bg-dark">Eliminar</a>
            </td>
        </tr>
		<!--cierro for each-->
        <?php endforeach; ?>

    </table>

	<!--Vaciar carrito-->
    <div class="m-4 text-center">
        <a href="<?=base_url?>carrito/delete_all" class="text-center text-danger text-decoration-none h5 border rounded-pill p-2 m-2 bg-dark">Vaciar carrito</a>
    </div>

	<!--Monto total del carrito-->				
    <div class="m-4 text-center">
	
        <?php $stats = MyGlobalFunction::statsCarrito(); ?>
        <h3 class="text-center">Precio total:  $ <?=$stats['total']?></h3>

		<!--Enviar carrito a pedidos-->
        <a href="<?=base_url?>pedido/hacer" class="text-center text-success text-decoration-none h5 border rounded-pill p-2 m-2 bg-dark">Hacer pedido</a>
    </div>

	<!--En el caso que el carrito este vacio mostrar texto error-->				
    <?php else: ?>
    <p>error El carrito está vacio, añade algun producto</p>
    <?php endif; ?>

</div>