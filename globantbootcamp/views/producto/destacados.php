<!--Vista de los productos del index-->

<div class="container-fluid">

	<!--Titulo-->
    <h2 class="text-center p-4">Nuestros productos destacados</h2>

    <div class="row">

        <!--Genero un bucle while por cada elemento-->
        <?php while($product = $productos->fetch_object()): ?>

        <div class="col-3 card p-3" style="5rem">

            <!--ver producto mediante enlace por id-->
            <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">

                <!--Verifico si hay imagen y la imprimo-->
                <?php if($product->imagen != null): ?>
                <img src="<?=base_url?>uploads/images/<?=$product->imagen?>" class="img-thumbnail card-img-top"
                    width="200" height="200" />
                <?php endif; ?>

            </a>

            <div class="text-center ">
				<!--imprimo nombre-->
                <h2 class="text-center text-dark text-decoration-none h3"><?=$product->nombre?></h2>
				<!--imprimo valor-->
                <p class="text-center text-danger text-decoration-none h3 "><?=$product->precio?></p>
				<!--agrego al carrito mediante id-->
                <a href="<?=base_url?>carrito/add&id=<?=$product->id?>"
                    class="text-center text-white text-decoration-none h3 border rounded-pill p-2 m-2 bg-dark">Comprar</a>
            </div>
        </div>

		<!--cierro bucle while-->
        <?php endwhile; ?>

    </div>
</div>