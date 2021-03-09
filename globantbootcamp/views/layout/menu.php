 <!-- MENU -->
 <?php $categorias = MyGlobalFunction::showCategorias(); ?>

<nav id="menu" class="container-fluid bg-dark text-center p-4">
    <a href="<?=base_url?>" class="m-2 p-2 text-white h-5 text-decoration-none">Inicio</a>
    <?php while($cat = $categorias->fetch_object()): ?>
    <a href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"
        class="m-2 p-2 text-white h-5 text-decoration-none"><?=$cat->nombre?></a>
    <?php endwhile; ?>
</nav>