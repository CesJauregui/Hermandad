<?php ob_start();
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 include "db.php";
    //Creación de sesión
    (isset($_SESSION['userLogged'])) ? $user = $_SESSION['userLogged'] : header("location: ../cms-admin.php");
        $sql = "SELECT * FROM usuario WHERE user = '$user'";
        $result = mysqli_query($conexion,$sql);
        $row = mysqli_fetch_array($result);
        $users = $row['user'];
        $profile = $row['profile_pic'];
        $rol = $row['role'];

        //logout
        if (isset($_GET['logout'])) {
            unset($_SESSION['userLogged']);
            header("location: index.php");
        }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Panel de Administración</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript and ckeditor -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="ckfinder/ckfinder/ckfinder.js"></script>
    <script src="ckeditor/ckeditor/ckeditor.js"></script>
    <script src="ckeditor/ckeditor/img-responsive.js"></script>
<body>
