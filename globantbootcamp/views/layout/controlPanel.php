<!-- Panel de control -->
<div id="lateral" class="container-fluid">
        <div class="row align-items-center bg-dark bg-gradient p-4">

            <div id="carrito" class="col">

                <?php $stats = MyGlobalFunction::statsCarrito(); ?>
                
                <a href="<?=base_url?>carrito/index" class="text-white text-decoration-none p-2">Productos
                    (<?=$stats['count']?>)</a>
                <a href="<?=base_url?>carrito/index" class="text-white text-decoration-none p-2">Total:
                    <?=$stats['total']?> $</a>
                <a href="<?=base_url?>carrito/index" class="text-white text-decoration-none p-2">Ver el carrito</a>
            </div>

            <div id="login" class="col">

                <?php if(!isset($_SESSION['identity'])): ?>
                <form action="<?=base_url?>usuario/login" method="post">
                    <label for="email" class="text-white text-decoration-none p-2">Email</label>
                    <input type="email" name="email" />
                    <label for="password" class="text-white text-decoration-none p-2">Contraseña</label>
                    <input type="password" name="password" />
                    <input type="submit" value="Enviar" />
                    <a href="<?=base_url?>usuario/registro" class="text-white text-decoration-none p-2">Registrate
                        aqui</a>
                </form>

                <?php else: ?>
                <h5 class="text-white text-decoration-none p-2">Bienvenido <?=$_SESSION['identity']->nombre?>
                    <?=$_SESSION['identity']->apellidos?></h5>
                <?php endif; ?>

                <?php if(isset($_SESSION['admin'])): ?>
                <a href="<?=base_url?>categoria/index" class="text-white text-decoration-none p-2">Gestionar
                    categorias</a>
                <a href="<?=base_url?>producto/gestion" class="text-white text-decoration-none p-2">Gestionar
                    productos</a>
                <a href="<?=base_url?>pedido/gestion" class="text-white text-decoration-none p-2">Gestionar pedidos</a>
                <?php endif; ?>

                <?php if(isset($_SESSION['identity'])): ?>
                <a href="<?=base_url?>pedido/mis_pedidos" class="text-white text-decoration-none p-2">Mis pedidos</a>
                <a href="<?=base_url?>usuario/logout" class="text-white text-decoration-none p-2">Cerrar sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>