<?php require_once 'includes/cabecera.php'; ?>

<?php
$categoria = conseguirCategoria($db, $_GET['id']);

if (!isset($categoria['id'])) {
    header("Location: index.php");
}


?>








<?php require_once 'includes/lateral.php'; ?>

<!--inicio contenido principal entradas-->
<div id="principal">



    <h1> Entradas de <?= $categoria['nombre'] ?></h1>

    <?php
    $entradas = conseguirEntradas($db, null, $_GET['id']);
    if (!empty($entradas) && mysqli_num_rows($entradas) >= 1):

        while ($entrada = mysqli_fetch_assoc($entradas)):
    ?>


            <article class="entrada">

                <a href="entrada.php?id=<?= $entrada['id']?>">
                    <h2><?= $entrada['titulo']; ?></h2>
                    <span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
                    <p>
                        <?= substr($entrada['descripcion'], 0, 150) . '...'; ?>

                    </p>
                </a>
            </article>


        <?php
        endwhile;

    else:
        ?>

        <div class="alerta">No hay entradas en esta categoria </div>

    <?php endif; ?>

</div>
<!--fin contenido principal entradas-->


<div class="clearfix"></div>

</div><!--fin contenedor-->

<?php require_once 'includes/pie.php'; ?>