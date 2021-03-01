<!--Vista editar o crear producto-->

<!--Si se recibe una variable objeto mestro editar-->
<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
<h1 class="text-center">Editar un producto de la base de datos <?=$pro->nombre?></h1>

<!--metodo guardar producto ya existente-->
<?php $url_action = base_url."producto/save&id=".$pro->id; ?>


<!--Sino se recibe nada muestro crear-->
<?php else: ?>
<h1 class="text-center">Agregar un nuevo producto a la base de datos</h1>

<!--metodo guardar-->
<?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>


<div class="container">

    <!--Formulario-->
    <div>
        <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

			<!--nombre-->
            <div class="p-2 containter text-center">
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>" />
            </div>

			<!--descripction-->
            <div class="p-2 containter text-center">
                <label for="descripcion">Descripción</label><br>
                <textarea name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
            </div>

			<!--valor-->
            <div class="p-2 containter text-center">
                <label for="precio">Precio</label><br>
                <input type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" />
            </div>
			
			<!--stock-->
            <div class="p-2 containter text-center">
                <label for="stock">Stock</label><br>
                <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>" />
            </div>

			<!--categoria-->
            <div class="p-2 containter text-center">
                <label for="categoria">Categoria</label><br>
                <?php $categorias = MyGlobalFunction::showCategorias(); ?>
                <select name="categoria">
                    <?php while ($cat = $categorias->fetch_object()): ?>
                    <option value="<?= $cat->id ?>"
                        <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                        <?= $cat->nombre ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
			
			<!--imagen-->
            <div class="p-2 containter text-center">
                <label for="imagen">Imagen</label><br>
                <input type="file" name="imagen" />
                <input type="submit" value="Guardar" />
            </div>

        </form>

    </div>

</div>