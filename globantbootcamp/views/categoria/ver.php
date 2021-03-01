<!--Ver productos por categoria-->
<div class="container-fluid">

    <?php if (isset($categoria)): ?>

    <!--Nombre de la categoria-->
    <h1 class="text-center"><?= $categoria->nombre ?></h1>

    <!--Si la cantidad de productos es 0 mostrar-->
    <?php if ($productos->num_rows == 0): ?>
    <p>Esta categoria no tiene productos</p>
    <?php else: ?>

    <div class="container-fluid">
        <div class="row">
            <!--Hago un bucle while por cada producto existente en la categoria-->
            <?php while ($product = $productos->fetch_object()): ?>

            <div class="col-3 card p-3" style="5rem">

                <!--Linkeo al producto selecionado por id-->
                <a href="<?= base_url ?>producto/ver&id=<?= $product->id ?>">

                    <!--imprimo img-->
                    <?php if ($product->imagen != null): ?>
                    <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" class="img-thumbnail card-img-top"
                        width="200" height="200" />
                    <?php endif; ?>
                </a>

                <!--imprimo nombre-->
                <h2 class="text-center text-dark text-decoration-none"><?= $product->nombre ?></h2>

                <p class="text-center text-danger text-decoration-none h3"><?= $product->precio ?></p>

                <div class="m-4 text-center">
                    <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="text-center text-white text-decoration-none h3 border rounded-pill p-2 m-2 bg-dark">Comprar</a>
                </div>


            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <?php endif; ?>
    <?php else: ?>
    <h1>La categoría no existe</h1>
    <?php endif; ?>
</div>