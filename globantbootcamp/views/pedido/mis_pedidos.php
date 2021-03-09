<!--Vista mis pedidos-->
<div class="container-fluid text-center">

    <?php if (isset($gestion)): ?>
    <h1>Gestionar pedidos</h1>
    <?php else: ?>
    <h1>Pedidos</h1>
    <?php endif; ?>

    <!--Creo tabla de pedidos-->
    <table class="d-flex justify-content-center m-4">

        <!--Indice-->
        <tr>
            <th class="p-4">Nº Pedido</th>
            <th class="p-4">Coste</th>
            <th class="p-4">Fecha</th>
            <th class="p-4">Estado</th>
        </tr>

        <!--Creo un ciclo while donde imprimo todos los elemento del objeto-->
        <?php while ($ped = $pedidos->fetch_object()):?>

        <tr>
            <td>
                <a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
            </td>
            <td>
                $ <?= $ped->coste ?>
            </td>
            <td>
                <?= $ped->fecha ?>
            </td>
            <td>
				<!--Verifico estatus del pedido-->
                <?=MyGlobalFunction::showStatus($ped->estado)?>
            </td>
        </tr>

        <!--Cierro Ciclo-->
        <?php endwhile; ?>
    </table>
</div>