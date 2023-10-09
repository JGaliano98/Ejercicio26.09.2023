<?php


require_once "funciones.php";
require_once "funcioneslogin.php";
require_once "sesion.php";


if(isset($_POST['usuario']) && isset($_POST['contraseña'])) {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
}

$login = isset($_POST['login']);
$registrarse = isset($_POST['registrarse']);




if($login){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $resultado = compruebaUsuario('login.csv',$usuario,$contraseña);

        if ($resultado === true) {

            //Creamos la cookie
            setcookie("cookie", time(), time()+3600);


            login($_POST['usuario']);

            iniciarSesion('user', $usuario);

            header("Location: http://localhost/Ejercicio26.09.2023/index.php");

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="post" action="login.php">
        <h1>LOGIN</h1> <br>
        <label>USUARIO: <input type="text" name="usuario" id="usuario">  </label><br><br>
        <label>CONTRASEÑA: <input type="text" name="contraseña" id="contraseña"> </label><br><br>
        <input type="submit" value="login" name="login"> <input type="submit" value="registrarse" name="registrarse">
        <br>
    
    </form>

</body>
</html>