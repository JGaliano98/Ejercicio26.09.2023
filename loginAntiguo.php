<?php

session_start(); 

require_once "funciones.php";
require_once "funcioneslogin.php";

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$login = isset($_POST['login']);
$registrarse = isset($_POST['registrarse']);




//$_SESSION['usuario']=$usuario;


if($login){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $resultado = compruebaUsuario('login.csv',$usuario,$contraseña);

        if ($resultado === true) {
            echo "Credenciales válidas.";

            login($_POST['usuario']);

            header("Location: http://localhost/Ejercicio26.09.2023/index.php?usuario=$usuario");

        } elseif ($resultado === false) {
            echo "Credenciales inválidas.";
        }
    }
}

if ($registrarse){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        header("Location: http://localhost/Ejercicio26.09.2023/registro.php");

    }

}

?>