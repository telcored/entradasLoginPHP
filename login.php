<?php

// Iniciar la sesin y conexion a la bd

require_once "includes/conexion.php";

// Recoger los datos formulario

if (isset($_POST)) {

    $email  = trim($_POST['email']);
    $password = $_POST['password'];

    //consulta para saber si existe el mail

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {

        $usuario = mysqli_fetch_assoc($login);

        //comprobar la contraseña
        $verificar = password_verify($password, $usuario['password']);

        if ($verificar) {

            //utilizar sesion para guardar los datos del usuario logueado 

            $_SESSION['usuario'] = $usuario;

            if (isset($_SESSION['error_login'])){
                $_SESSION['error_login'] = null;

            }


        } else {
            //Si algo falla enviar una sesion con el fallo
            $_SESSION['error_login'] = "Login Incorrecto!!";
        }

    } else {
        //manejar el error
        $_SESSION['error_login'] = "Login Incorrecto!!";
    }
}

//redirigir al index

header("Location: index.php" );