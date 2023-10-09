<?php

function iniciarSesion($clave , $usuario){

    session_start();

    $_SESSION[$clave]=$usuario;
    

}


function cerrarSesion(){

    session_destroy();

    header("Location: http://localhost/Ejercicio26.09.2023/login.php");

}


function leerValorSession($clave){

    $usuario = $_SESSION[$clave];

    return $usuario;

}


?>