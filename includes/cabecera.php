
<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inicio Sesion - Telcored SPA</title>
</head>

<body>

    <!--cabecera-->
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">Telcored</a>

        </div>

        <!--menu-->
             <nav id="menu">
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>

                <?php
                
                 $categorias = conseguirCategorias($db);
                 if(!empty($categorias)):
                    
                    while ($categoria = mysqli_fetch_assoc($categorias)):  
                        
                ?>

                    <li>
                        <a href="categoria.php?id= <?= $categoria['id']; ?>"> <?= $categoria['nombre']; ?></a>
                      
                    </li>


                        
                <?php 
                    endwhile;
                endif; ?>


                <li>
                    <a href="index.php">Sobre mi</a>
                </li>

                <li>
                    <a href="index.php">Contacto</a>
                </li>
            </ul>
        </nav>
        <div class="clearfix">

        </div>


    </header>

    <div id="contenedor">