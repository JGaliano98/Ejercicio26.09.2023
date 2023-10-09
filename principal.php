<?php

require "funciones.php";

//Declaramos las variables
$id = $_POST['id'];
$nombre =$_POST['nombre'];

//Declaramos los botones

$nuevo = isset($_POST['nuevo']);
$eliminar = isset($_POST['eliminar']);
$modificar = isset($_POST['modificar']);
$muestra = isset($_POST['muestra']);

if($nuevo){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $array = leeFicheroCSV('documento.csv');

        $datos=[$id,$nombre];

        guardaFicheroCSV($datos,'documento.csv','a');

    }
}

if ($eliminar){
    if ($_SERVER['REQUEST_METHOD']=="POST"){

        if (eliminaDatosCSV('documento.csv', $usuario, $id)) {
            echo "Los datos se han eliminado exitosamente.";
        } else {
            echo "No se pudieron eliminar los datos o se produjo un error.";
        }
      
    
    }
}




if ($muestra){
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $datos=leeFicheroCSV('documento.csv');
        muestraCSV($datos);
    }
}



?>
