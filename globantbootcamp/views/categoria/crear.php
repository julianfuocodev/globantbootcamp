<!--Vista de crear categorias-->
<div class="container-fluid text-center">

    <!--Titulo-->
    <h1>Crear nueva categoria</h1>

    <!--Formulario-->
    <form action="<?=base_url?>categoria/save" method="POST">

        <div class="p-3 containter">
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" required />
        </div>

        <div class="p-3 containter">
            <input type="submit" value="Guardar" />
        </div>

    </form>

</div>