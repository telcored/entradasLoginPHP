<?php

if (isset($_POST)){

    require_once 'includes/conexion.php';

   $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;



   //creacion de un array de errores
   $errores = array();

   //validacion de datos antes de guardarlos de la base de datos

   //nombre
   if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {

       $nombreValidado = true;
       echo "El nombre es correcto";
   } else {
       $nombreValidado = false;
       $errores['nombre'] = "El nombre no es valido";
       echo "El nombre está mal escrito";
   }

   if (count($errores) == 0){

    $sql = " INSERT INTO categorias VALUES(NULL, '$nombre'); ";

    $guardar = mysqli_query($db, $sql);

   }

   

    
}

header('Location: index.php');