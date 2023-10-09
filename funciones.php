<?php
    function leeFicheroCSV($fichero){
        $datos=[];
        //abrimos el archivo
        $archivo=fopen($fichero,"r");
        if ($archivo!==false){
            //obtenemos las filas y las metemos en el array
            while (($fila=fgetcsv($archivo,0))!==false) {
                $datos[]=$fila;
            }
            fclose($archivo);
        }else{
            echo("No se ha podido leer el archivo CSV");
        }
        return $datos;
    }


    function guardaFicheroCSV($datos,$ruta,$forma){
        //abrimos el archivo
        $archivo=fopen($ruta,$forma);
        //entramos al archivo
        if ($archivo!==false){
            //añadimos los datos al archivo con fputcsv
            fputcsv($archivo, $datos);
            fclose($archivo);
            
        }else{
            echo "No se ha podido leer el archivo";
        }
    }

    function borrarDatoCSV($ruta,$id) {
        //guardamos los datos del csv en un array

        $datos=leeFicheroCSV($ruta);

        //recorre el array del csv
        foreach ($datos as $clave=>$fila) {
            if ($fila[0]===$id){

                array_splice($datos,$clave,1); //Con splice seleccionamos la parte del array que queremos eliminar

                //Guardamos el fichero ya modificado.

                guardaFicheroCSV($datos,$ruta,"w");
            }
        }

    }

    function muestraFicheroCSV($datos) {
        //bucle foreach para recorrer el array

        foreach ($datos as $dato) {
            foreach ($dato as $key) {
                echo $key;
            }
        }
    }

    function modificaFicheroCSV($datoaModificar,$ruta,$id) {

        //Leemos los datos del csv y lo metemos a un array
        $datos=leeFicheroCSV($ruta);

        $existe=false; //Inicializamos existe en falso

        foreach ($datos as $key=>$fila) { //bucle para ver si existe el dato
            if ($fila[0]===$id){
                $existe=true;
                unset($datos[$key]); //con el unset borramos el elemento a modificar
                break;
            }
        }

        if ($existe==true){ //Si existe, se modifica y se guarda el nuevo fichero.
            guardaFicheroCSV($datoaModificar,$ruta,"w");
        }
    }
?>

