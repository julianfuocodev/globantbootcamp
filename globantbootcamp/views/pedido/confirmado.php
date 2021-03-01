<!--Vista de confirmacion de pedido-->

<div class="container-fluid text-center">

    <!--En el caso que el pedido se completo mostrar-->
    <?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Pedido completado, tienda en php metodologia mvcpoo por julian fuoco.
    </p>
    <br />

    <!--Datos del pedido-->
    <?php if (isset($pedido)): ?>
    <h3>Datos del pedido:</h3>
    <p>Número de pedido: <?= $pedido->id ?> </p><br>
    <p>Total a pagar: $ <?= $pedido->coste ?></p><br>
    <h3>Productos:</h3><br>

    <!--Tabla del pedido-->
    <table class="d-flex justify-content-center">

        <!--Indice-->
        <tr>
            <th class="m-3 p-3">Imagen</th>
            <th class="m-3 p-3">Nombre</th>
            <th class="m-3 p-3">Precio</th>
            <th class="m-3 p-3">Unidades</th>
        </tr>

        <!--Creo un ciclo while para traer cada elemento del objeto-->
        <?php while ($producto = $productos->fetch_object()): ?>

        <tr>
            <td>
                <?php if ($producto->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img-thumbnail card-img-top"
                    width="100" height="100" />
                <?php endif; ?>
            </td>
            <td>
                <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
            </td>
            <td>
                <?= $producto->precio ?>
            </td>
            <td>
                <?= $producto->unidades ?>
            </td>
        </tr>

        <!--Cierro Ciclo-->
        <?php endwhile; ?>
    </table>
    <?php endif; ?>

	<!--Mostrar error-->
    <?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Algo salio mal, intenta de nuevo</h1>
    <?php endif; ?>

</div>