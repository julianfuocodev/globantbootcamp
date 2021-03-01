<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>BOOTCAMP GLOBANT TIENDA EN PHP MVCPOO por Fuoco</title>

    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>

<body>

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

    <div id="container-fluid">

        <!--Header-->
        <header id="header" class="container-fluid bg-dark text-center">
            <div id="logo">
                <img src="<?=base_url?>assets/img/logo.png" alt="Logo" />
                <a href="<?=base_url?>" class="text-white text-decoration-none h4 p-2 m-2">
                    Bootcamp Globant - Tienda en PHP con MVCPOO por Julian Fuoco
                </a>
            </div>
        </header>

        <!-- MENU -->
        <?php $categorias = MyGlobalFunction::showCategorias(); ?>

        <nav id="menu" class="container-fluid bg-dark text-center p-4">
            <a href="<?=base_url?>" class="m-2 p-2 text-white h-5 text-decoration-none">Inicio</a>
            <?php while($cat = $categorias->fetch_object()): ?>
            <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"
                class="m-2 p-2 text-white h-5 text-decoration-none"><?=$cat->nombre?></a>
            <?php endwhile; ?>
        </nav>

        <!-- ABRO MAIN -->
        <div id="content">
            <!-- CONTENIDO CENTRAL -->
            <div id="central">