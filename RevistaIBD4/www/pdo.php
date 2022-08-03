<?php

try {

    $conexion = new PDO('mysql:host=localhost;port=8888;dbname=IBDRevista;charset=utf8mb4','root','root');
    echo "Conexion OK";

} catch( PDOException $e ) {
    echo "Error: " . $e->getMessage();
}

?>