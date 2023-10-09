<?php

//require "UNO.php";

session_start();

$nombre = $_SESSION['usuario'];

echo "Mi nombre es $nombre y tengo 33 años";

?>


