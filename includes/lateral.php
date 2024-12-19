<!--barra lateral-->
<aside id="sidebar">

    <?php if (isset($_SESSION['usuario'])) : ?>

        <div id="usuario-logueado" class="bloque">
            <h3><?= 'Bienvenido,  ' . $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>

            <!--poner algunos botones para cerrar sesion y otras cosas -->
            <a href="crearEntrada.php" class="boton ">Crear Entradas</a>
            <a href="crearCategoria.php" class="boton boton-verde">Crear Categorias</a>
            <a href="misDatos.php" class="boton boton-naranja">Mis Datos</a>
            <a href="cerrarSesion.php" class="boton boton-rojo">Cerrar Sesión</a>

        </div>

    <?php endif; ?>


    <?php if (!isset($_SESSION['usuario'])) : ?>



        <div id="login" class="bloque">
            <h3>Hola, identificate por favor.</h3>


            <?php if (isset($_SESSION['error_login'])) : ?>

                <div class="alerta alerta-error">
                    <?= $_SESSION['error_login']; ?>
                </div>

            <?php endif; ?>



            <form action="login.php" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" autocomplete="off">

                <label for="password">Password</label>
                <input type="password" name="password">

                <input type="submit" value="Entrar">

            </form>
        </div>

        <div id="register" class="bloque">

            <h3>Registrate</h3>

            <!--mostrar errores-->
            <?php if (isset($_SESSION['completado'])): ?>

                <div class="alerta alerta-exito">
                    <?= $_SESSION['completado']; ?>
                </div>

            <?php elseif (isset($_SESSION['errores']['general'])): ?>

                <div class="alerta alerta-error">
                    <?= $_SESSION['errores']['general']; ?>
                </div>


            <?php endif; ?>


            <form action="registro.php" method="POST">

                <br>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" autocomplete="off">

                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" autocomplete="off">

                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>


                <label for="email">Email</label>
                <input type="email" name="email" autocomplete="off">

                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>


                <label for="password">Password</label>
                <input type="password" name="password">

                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>


                <input type="submit" name="submit" value="Registrar">

            </form>

            <?php borrarErrores(); ?>
        </div>

    <?php endif; ?>
</aside>