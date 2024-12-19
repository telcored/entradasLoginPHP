<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>



<div id="principal">
    <h1>Crear Entradas</h1>
    <br>
    <p>
        Añade aqui nuevas entradas:
    </p>
    <br>

    <form action="guardarEntrada.php" method="POST">

        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

        <label for="descripcion">Descripcion: </label>
        <textarea name="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>
        

        <label for="categoria">Categoria: </label>
        <select name="categoria" id="">

            <?php
            $categorias = conseguirCategorias($db);
            if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):

            ?>

                    <option value="<?= $categoria['id'] ;?>">
                        <?= $categoria['nombre']?>

                    </option>

            <?php 
                endwhile;
            endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>
       
        <input type="submit" value="Guardar">
    </form>



</div>
<!--fin contenido principal entradas-->

<?php borrarErrores(); ?>


<div class="clearfix"></div>

</div><!--fin contenedor-->

<?php require_once 'includes/pie.php'; ?>