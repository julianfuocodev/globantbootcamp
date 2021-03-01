<!--Vista de administrador de la gestion de pedidos-->
<div class="container-fluid text-center">

    <!--Titulo-->
    <h1 class="m-3 p-3">Detalle del pedido</h1>

    <!--Si existe un pedido-->
    <?php if (isset($pedido)): ?>

    <!--Si estoy en la session de admin-->
    <?php if(isset($_SESSION['admin'])): ?>

    <!--Titulo-->
    <h3 class="m-3 p-3">Cambiar estado del pedido</h3>

    <!--Cambiar estado del pedido por selec-->
    <form action="<?=base_url?>pedido/estado" method="POST" class="m-3 p-3">
        <input type="hidden" value="<?=$pedido->id?>" name="pedido_id" />

        <!--Seleccionar estado-->
        <select name="estado">
            <option value="confirm" <?=$pedido->estado == "confirm" ? 'selected' : '';?>>En espera</option>
            <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : '';?>>Preparando</option>
            <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : '';?>>Enviando</option>
            <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : '';?>>Enviado</option>
        </select>

        <!--Send-->
        <input type="submit" value="Cambiar estado" />
    </form>

    <?php endif; ?>

    <!--Datos de envio-->
    <div>
        <h3>Datos de envio</h3>
        <p>Provincia: <?= $pedido->provincia ?></p>
        <p>Cuidad: <?= $pedido->localidad ?> </p>
        <p>Direccion: <?= $pedido->direccion ?> </p>
    </div>

    <!--Datos del pedido-->
    <div>
        <h3>Datos del pedido</h3>
        <p>Estado: <?=MyGlobalFunction::showStatus($pedido->estado)?></p>
        <p>Número de pedido: <?= $pedido->id ?></p>
        <p>Total a pagar: $ <?= $pedido->coste ?> </p>
    </div>

    <!--Tabla de productos del pedido-->
    <div>

        <!--Titulo-->
        <h3 class="m-3 p-3">Productos:</h3>

        <!--Tabla-->
        <table class="d-flex justify-content-center m-4 p-4">

            <!--Indice-->
            <tr>
                <th class="m-3 p-3">Imagen</th>
                <th class="m-3 p-3">Nombre</th>
                <th class="m-3 p-3">Precio</th>
                <th class="m-3 p-3">Unidades</th>
            </tr>

            <!--Creo un ciclo while por cada elemento del objeto-->
            <?php while ($producto = $productos->fetch_object()): ?>
            <tr>
                <td>
                    <?php if ($producto->imagen != null): ?>
                    <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img-thumbnail card-img-top"
                        width="100" height="100" />
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"
                        class="text-decoration-none h3"><?= $producto->nombre ?></a>
                </td>
                <td>
                    <h4><?= $producto->precio ?></h4>
                </td>
                <td>
                    <h4><?= $producto->unidades ?></h4>
                </td>
            </tr>

            <!--Cierro ciclo-->
            <?php endwhile; ?>
        </table>
    </div>

    <?php endif; ?>
</div>