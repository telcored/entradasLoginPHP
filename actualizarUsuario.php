<?php


if (isset($_POST)) {


    //cargamos la conexion a la bd
    require_once "includes/conexion.php";



    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'])  : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;



    //array de errores, para ir guardando los posibles errores en el formulario

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

    echo "</br>";

    //apellidos
    if (!empty($apellido) && !is_numeric($apellido) && !preg_match("/[0-9]/", $apellido)) {

        $apellidoValidado = true;
        echo "El apellido es correcto";
    } else {
        $apellidoValidado = false;
        $errores['apellido'] = "El apellido no es valido";
        echo "El apellido está mal escrito </br>";
    }


    echo "</br>";
    //email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $emailValidado = true;
        echo "El email es correcto";
    } else {
        $emailValidado = false;
        $errores['email'] = "El email no es valido";
        echo "El email está mal escrito </br>";
    }


    echo "</br>";



    //validar que no hayan errores antes de actualizar en SQL
    $guardar_usuario = false;

    if (count($errores) == 0) {
        $usuario = $_SESSION['usuario'];
        $guardar_usuario = true;

        //comprobar si el email existe
        $sql = "SELECT id,email FROM usuarios WHERE email = '$email'  ";
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);


        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){ 
                //Actualizar usuario en la tabla de usuarios
                

                $sql = "UPDATE usuarios SET nombre='$nombre',apellidos='$apellido',email='$email' WHERE id=" . $_SESSION['usuario']['id'];

                $guardar = mysqli_query($db, $sql);

                if ($guardar) {
                    $_SESSION['usuario']['nombre'] = $nombre;
                    $_SESSION['usuario']['apellidos'] = $apellido;
                    $_SESSION['usuario']['email'] = $email;


                    $_SESSION['completado'] = "El registro se ha actualizado con exito";
                } else {
                    $_SESSION['errores']['general'] = "Fallo al actualizar el usuario";
                }

            }else{
                $_SESSION['errores']['general'] = "El usuario ya existe";
            }



    } else {

        $_SESSION['errores'] = $errores;
    }
}

header('Location: misDatos.php');
