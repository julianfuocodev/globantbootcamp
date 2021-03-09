<!--Vista del producto seleccionado por id-->

<div class="container-fluid">

    <?php if (isset($product)): ?>
	
	<!--imprimo nombre-->
    <h2 class="text-center p-2 m-2"><?= $product->nombre ?></h2>

        <div id="detail-product" class="row">

			<!--imprimo imagen-->
            <div class="col m-4">
                <?php if ($product->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="img-thumbnail card-img-top m-4"
                    max-width="100" max-height="100"/>
                <?php endif; ?>
            </div>

            <div class="col m-4">
				<!--imprimo descripcion-->
                <p class="h4 text-center"><?= $product->descripcion ?></p>
				<!--imprimo valor-->
                <p class="text-danger text-end">$<?= $product->precio ?></p>
				<!--agrego al carrito mediante id-->
                <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="text-center text-white text-decoration-none h3 border rounded-pill p-2 m-2 bg-dark">Comprar</a>
            </div>

        </div>

	<!--Si no existe un producto con ese id comunico el error-->
    <?php else: ?>
    <h1>ERROR No existe ningun producto</h1>
    <?php endif; ?>

</div>