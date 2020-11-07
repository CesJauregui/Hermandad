<?php
    include "includes/header.php";
    $query = mysqli_query($conexion,"SELECT * FROM usuario");
    if (mysqli_num_rows($query) === 0) {
        echo "";
    }else{
        include "login.php";
    }
?>