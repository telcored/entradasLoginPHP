<?php

//datos de la conexion a SQL
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mvc';

$db = mysqli_connect($hostname, $username, $password, $database);



if ($db){
   // echo 'conexion exitosa!! </br> ';
   
    

}else{
    echo 'error pulento';
}

//iniciar la sesion en php

if(!isset($_SESSION)){
    session_start();
}