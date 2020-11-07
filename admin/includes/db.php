<?php
    $db_host= "127.0.0.1";
    $db_user = "root";
    $db_pass = "";
    $db_name = "hermandad_bd";

    $conexion = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

    if (!$conexion) {
        die("No se puedo conectar a la base de datos" . mysqli_error($conexion));
    }
?>