<?php

function compruebaUsuario($archivo, $usuario, $contraseña) {


// Abrimos el archivo en modo lectura
$datos = fopen($archivo, "r");

if ($datos !== false) {

    // Iteramos sobre las filas del archivo CSV
    while (($fila = fgetcsv($datos)) !== false) {
        // Verificamos si la fila tiene al menos 2 elementos (usuario y contraseña)
        if (count($fila) >= 2) {
            $usuarioArchivo = $fila[0];
            $contraseñaArchivo = $fila[1];
            
            // Verificamos si el usuario y la contraseña coinciden
            if ($usuarioArchivo === $usuario && $contraseñaArchivo === $contraseña) {
                fclose($datos); // Cerramos el archivo
                
                return true; // Credenciales válidas
            }
        }
    }
    
    fclose($datos); // Cerramos el archivo

} else {
    return "Error al abrir el archivo CSV.";
}

return false; // Credenciales inválidas
}




function login ($usuario){

    $nuevaFila = array($usuario);

    $archivo = fopen('logueados.csv','w');



    if ($archivo !== false) {

        
        fputcsv($archivo, $nuevaFila);

        fclose($archivo); // Cerramos el archivo

        return "Datos agregados al archivo CSV.";
    
    } else {
        return "Error al abrir el archivo CSV.";
    }

}



function logout ($usuario){


    //$archivo = fopen('logueados.csv', 'w');

    $archivo = file('logueados.csv');
    if ($archivo !== false) {


        foreach ($archivo as $indice => $linea) {
            $datos = explode(',', $linea);
            
            // Verifica si el primer elemento de la línea (el nombre de usuario) coincide con el usuario a eliminar
            if (trim($datos[0]) === $usuario) {
                // Elimina la línea utilizando unset
                unset($archivo[$indice]);
                break; // Rompe el bucle después de encontrar y eliminar el usuario
            }
        }
    }

    file_put_contents('logueados.csv', implode('', $archivo));
}

function EstaLogueado($usuario,$ruta) {
    $datos=leeFicheroCSV($ruta);

    $existe=false;

    foreach ($datos as $valor) {
            if ($valor[0]===$usuario){
                $existe=true;
            }
    }

    return $existe;
}



?>
