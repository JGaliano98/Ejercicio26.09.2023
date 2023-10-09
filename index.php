<?php

$usuario=$_GET['usuario'];
$ultimo_login = $_COOKIE['cookie'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="principal1.php"> 
        <h1>FORMULARIO</h1> <br>
        <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
        <label>ID: <input type="text" name="id" id="id">  </label><br><br>
        <label>NOMBRE: <input type="text" name="nombre" id="nombre"> </label><br><br>
        <input type="submit" value="nuevo" name="nuevo">
        <input type="submit" value="eliminar" name="eliminar">
        <input type="submit" value="modificar" name="modificar">
        <input type="submit" value="muestra" name="muestra">
        <br><br>
        <input type="submit" value="logout" name="logout">
        

    </form>
</body>
</html>

<?php

if (isset($ultimo_login)){

    echo "Ultimo login: " . date("d/m/y \a \l\a\s H:i", $ultimo_login) . " por el usuario " . $usuario;

    

}

else{
echo "Bienvenido. Esta es su primera visita.";
}



?>