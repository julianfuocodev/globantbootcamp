<!--Vista de todas las categorias-->

<div class="container-fluid text-center m-2">

    <!--Title-->
    <h1 class="text-center m-2">Panel de control de categorias</h1>

    <!--Llamo al metodo crear categoria-->
    <div class="m-4">
        <a href="<?=base_url?>categoria/crear"
            class="text-center text-white text-decoration-none h3 border rounded-pill p-2 m-2 bg-dark">
            Crear categoria
        </a>
    </div>


    <!--Creo tabla de categorias-->
    <table class="d-flex justify-content-center m-4">

        <!--Indice-->
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
        </tr>

        <!--croe bucle while para llenar la tabla de la categoria por cada elemento del objeto-->
        <?php while($cat = $categorias->fetch_object()): ?>
        <tr>
            <td><?=$cat->id;?></td>
            <td><?=$cat->nombre;?></td>
        </tr>

		<!--cierro bucle-->
        <?php endwhile; ?>
    </table>


</div>