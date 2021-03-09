<!--Vista confirmar pedido -->

<div class="container-fluid text-center">

    <?php if (isset($_SESSION['identity'])): ?>

    <!--Titulo-->
    <h1 class="text-center m-3">Realizar pedido</h1>

    <!--Volver al carrito-->
    <a href="<?= base_url ?>carrito/index" class="text-center text-white text-decoration-none border rounded-pill p-1 m-4 bg-dark">Volver al carrito</a>

    <!--Formulario de envio titulo-->
    <h4>Dirección para el envio:</h4>

    <!--Formulario de envio-->
    <form action="<?=base_url.'pedido/add'?>" method="POST">

        <div class="p-3 containter">
            <label for="provincia">Provincia</label><br>
            <input type="text" name="provincia" required />
        </div>
        <div class="p-3 containter">
            <label for="ciudad">Ciudad</label><br>
            <input type="text" name="localidad" required />
        </div>
        <div class="p-3 containter">
            <label for="direccion">Dirección</label><br>
            <input type="text" name="direccion" required />
        </div>
        <div class="p-3 containter">
            <input type="submit" value="Confirmar pedido" />
        </div>

    </form>

	<!--Error-->
    <?php else: ?>
    <h1>Ups algo salio mal, verifica estar logueado o que hayan productos en el carrito.</h1>
    <?php endif; ?>
</div>