<?php



if (isset($_POST)) {


    //cargamos la conexion a la bd
    require_once "includes/conexion.php";

    session_start();

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre'] )  : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($db, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;


    //array de errores, para ir guardando los posibles errores en el formulario

    $errores = array();


    //var_dump($apellido);

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
    //password
    if (!empty($password)) {

        $passwordValidado = true;
        echo "El password es correcto";
    } else {
        $passwordValidado = false;
        $errores['password'] = "El password no es valido";
        echo "El password está mal escrito </br>";
    }



    //validar que no hayan errores antes de insertar en SQL
    $guardar_usuario = false;

    if (count($errores) == 0) {
        $guardar_usuario = true;

        echo "<h2> Cero errores detectados </h2>";
        echo "</br>";

        //antes de insertar datos, hay que encriptar las password

        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);


        //recien ahora inserto datos en base de datos, validados,sin errores y pass con hash

        $sql = ("INSERT INTO usuarios VALUES(null,'$nombre','$apellido','$email','$password_segura', CURDATE())");
        $guardar = mysqli_query($db, $sql);

        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con exito";
        } else {
            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";
        }
    } else {

        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');



echo "</br>";
//var_dump($_POST);
//var_dump($errores);
