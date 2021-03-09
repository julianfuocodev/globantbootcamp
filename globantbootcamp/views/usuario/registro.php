<!--Vista del registro de usuarios-->

<div class="container">

    <!--Titulo-->
    <h1 class="text-center">Registrarse</h1>

    <!--Registro Exitoso-->
    <?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <h2 class="h2 text-success">Registro exitoso</h2>

    <!--Registro Erroneo-->
    <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <h2 class="h2 text-danger">Registro fallido</h2>
    <?php endif; ?>

    <?php MyGlobalFunction::deleteSession('register'); ?>

    <!--Formulario-->
    <form action="<?=base_url?>usuario/save" method="POST" class="text-center">

		<!--Nombre-->
        <div class="p-3 containter">
            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" required />
        </div>

		<!--Apellido-->
        <div class="p-3 containter">
            <label for="apellidos">Apellidos</label><br>
            <input type="text" name="apellidos" required />
        </div>

		<!--Email-->
        <div class="p-3 containter">
            <label for="email">Email</label><br>
            <input type="email" name="email" required />
        </div>

		<!--Contraseña-->
        <div class="p-3 containter">
            <label for="password">Contraseña</label><br>
            <input type="password" name="password" required />
        </div>

		<!--Enviar-->
        <div class="p-3 containter">
            <input type="submit" value="Registrarse" />
        </div>


    </form>

</div>