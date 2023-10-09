<?php

require "funcionesRegistro.php";


$usuario=$_POST['usuario']?$_POST['usuario']:"";
$contrasena = $_POST['contrasena']?$_POST['contrasena']:"";
$foto =$_FILES['foto']['name']?$_FILES['foto']['name']:"";

$ultimo_login = $_COOKIE['cookie'];


$registrar = isset($_POST['registrar']);

$login = isset($_POST['login']);

if ($registrar){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $respuesta = registraUsuario($usuario, $contrasena, $foto,'login.csv');

        if(isset($_FILES)) {
            $dirSubida = 'C:/xampp/htdocs/Ejercicio26.09.2023/fotos/';
            $ficheroSubido = $dirSubida . basename($_FILES['foto']['name']);
                
            $foto = file_get_contents($_FILES['foto']['tmp_name']);
            $foto = base64_encode($foto);

            if (move_uploaded_file($_FILES['foto']['tmp_name'], $ficheroSubido)) 
            {     
                echo "<img src='data:image/png;base64,$foto' title='var'/>";

                header("Location: http://localhost/Ejercicio26.09.2023/login.php");                       
                
            } 
            else 
            {
                echo "Archivo NO válido.\n";
            }
        }

    }
}

if ($login){

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        header("Location: http://localhost/Ejercicio26.09.2023/login.php");  

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

    <form method="post" enctype="multipart/form-data">
        <h1>REGISTRO DE USUARIOS</h1>
        <br>
        <label>NOMBRE DE USUARIO: <input type="text" name="usuario" id="usuario">  </label><br><br>
        <label>CONTRASEÑA: <input type="text" name="contrasena" id="contrasena"> </label><br><br>
        <label>FOTOGRAFÍA: <input type="file" name="foto"></label><br><br>
        <input type="submit" value="registrar" name="registrar">
        <input type="submit" value="login" name="login">

    </form>
    
</body>
</html>

<?php

if (isset($ultimo_login))
echo "Ultimo login: " . date("d/m/y \a \l\a\s H:i", $ultimo_login);
else
echo "Bienvenido. Esta es su primera visita.";


?>