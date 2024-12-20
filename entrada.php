<?php require_once 'includes/cabecera.php'; ?>

<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);

if (!isset($entrada_actual['id'])) {
    header("Location: index.php");
}
?>

<?php require_once 'includes/lateral.php'; ?>

<!--inicio contenido principal entradas-->
<div id="principal">

    <h1> <?= $entrada_actual['titulo'] ?></h1>

    <a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
        <h2> <?= $entrada_actual['categoria'] ?> </h2>
    </a>


    <h4><?= $entrada_actual['fecha'] ?> | <?= $entrada_actual['usuario'] ;?></h4>
    <p>
        <br>
        <?= $entrada_actual['descripcion'] ?>
    </p>

    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
        <br>
        <a href="editarEntrada.php?id=<?=$entrada_actual['id'];?>" class="boton ">Editar Entrada</a>
        <a href="borrar.php?id=<?=$entrada_actual['id'];?>" class="boton boton-verde">Borrar Entrada</a>

    <?php endif; ?>

</div><!--fin contenido principal entradas-->


<div class="clearfix"></div>
</div><!--fin contenedor-->

<?php require_once 'includes/pie.php'; ?>