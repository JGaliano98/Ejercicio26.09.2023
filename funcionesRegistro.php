<?php

require "funciones.php";

function registraUsuario($usuario, $contrasena, $nombrefoto, $ruta ){

    // Ruta completa de la foto en la carpeta de destino.
    $rutaFotoDestino = $ruta . '/' . $nombrefoto;

    // Abrimos el archivo CSV para añadir la información del usuario.
    $archivo = fopen($ruta, 'a');
        
    if ($archivo !== false) {
        // Añadimos el registro al archivo CSV con la ruta de la foto.
        $nuevo = [$usuario, $contrasena, $rutaFotoDestino];
        guardaFicheroCSV($nuevo, $ruta, 'a');
        fclose($archivo);
    } else {
        return false; // No se pudo abrir el archivo CSV.
    }

}

?>

