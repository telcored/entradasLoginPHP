<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];

    



   
    //creacion de un array de errores
    $errores = array();

    //validacion de datos antes de guardarlos de la base de datos

    
    if (empty($titulo)) {
        $errores['titulo'] = ' El titulo no es valido';
    }

    if (empty($descripcion)) {
        $errores['descripcion'] = ' La descripcion no es valida';
    }

    if (empty($categoria) && !is_numeric($categoria) ){
        $errores['categoria'] = ' La categoria no es valido';
    }


    if (count($errores) == 0){
        $sql = "INSERT INTO entradas VALUES (NULL, $usuario, $categoria, '$titulo', '$descripcion', CURDATE()); ";
        $guardar= mysqli_query($db, $sql);

        header('Location: index.php');

        
    }else{
        $_SESSION['errores_entrada'] = $errores;
        header('Location: crearEntrada.php');

    }

}

