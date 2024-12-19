<?php require_once 'includes/redireccion.php';?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>



<div id="principal">
    <h1>Crear Categorias</h1>
    <br>
    <p>
        Añade aqui nuevas categorias:
    </p>
    <br>

    <form action="guardarCategoria.php" method="POST">

    <label for="nombre">Nombre de la categoría: </label>
    <input type="text" name="nombre">
    <input type="submit" value="Guardar">

    </form>
 


</div>
<!--fin contenido principal entradas-->


<div class="clearfix"></div>

</div><!--fin contenedor-->

<?php require_once 'includes/pie.php'; ?>