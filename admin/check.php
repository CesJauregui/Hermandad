<?php
    session_start();
    include 'includes/db.php';
    $use = $_SESSION ['userLogged'];

    if (isset($_POST['text'])) {
        $pwd = md5($_POST['text']);
        $query = mysqli_query($conexion, "SELECT pass FROM usuario WHERE user='$use'");
        $data = mysqli_fetch_array($query);
        $pwdfromdb = $data['pass'];
        if ($pwdfromdb==$pwd) {
            echo "<span class='text-success'>Correcto</span>";
        }else{
            echo "<span class='text-danger'>Incorrecto</span>";
        }
    }
?>