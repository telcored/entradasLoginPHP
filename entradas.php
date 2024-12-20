<?php require_once 'includes/cabecera.php'; ?>

<?php require_once 'includes/lateral.php'; ?>

<!--inicio contenido principal entradas-->
<div id="principal">
    <h1>Todas Las  Entradas</h1>

    <?php 
       $entradas = conseguirEntradas($db,null);
       if(!empty($entradas)):

            while ($entrada = mysqli_fetch_assoc($entradas)):
    ?>


                    <article class="entrada">
                  
                        <a href="entrada.php?id=<?= $entrada['id']?>">
                            <h2><?= $entrada['titulo'] ;?></h2>
                            <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                            <p>
                                <?= substr($entrada['descripcion'],0,20).'...' ;?>

                            </p>
                        </a>
                    </article>


    <?php
             endwhile;


       endif;
    ?>




</div>
<!--fin contenido principal entradas-->


<div class="clearfix"></div>

</div><!--fin contenedor-->

<?php require_once 'includes/pie.php'; ?>