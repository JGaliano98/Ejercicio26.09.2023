<?php
//session_start();



require "funciones.php";
require "funcioneslogin.php";

//Declaramos las variables

$id = $_POST['id'];
$nombre =$_POST['nombre'];

//$usuario = $_SESSION['usuario'];

$usuario = $_POST['usuario'];


//Declaramos los botones

$nuevo = isset($_POST['nuevo']);
$eliminar = isset($_POST['eliminar']);
$modificar = isset($_POST['modificar']);
$muestra = isset($_POST['muestra']);
$logout = isset ($_POST['logout']);




if($nuevo){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $array = leeFicheroCSV('documento.csv');

        $datos=[$id,$nombre];

        guardaFicheroCSV($datos,'documento.csv','a');

    }
}

if ($eliminar){
    if ($_SERVER['REQUEST_METHOD']=="POST"){

        $datos =[$id,$nombre];

        $resultado = borrarDatoCSV('documento.csv', $id);
        
        /*if ($resultado === true) {
            echo "Los datos se han eliminado exitosamente.";
        } else {
            echo "No se pudieron eliminar los datos o se produjo un error.";
        }*/
      
    
    }
}

if($modificar){
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $datos=[$id,$nombre];
        modificaFicheroCSV($datos,'documento.csv',$id);
    
    }

}


if ($muestra){
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        $datos=leeFicheroCSV('documento.csv');
        muestraFicheroCSV($datos);
    }
}

if($logout){

    if ($_SERVER['REQUEST_METHOD']=="POST"){
        
        logout($usuario);

        cerrarSesion();

    }

}


?>