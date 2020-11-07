<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    include "../../admin/includes/db.php";
    
    if(isset($_POST['login_submit'])){
        $user=$_POST['users'];
        $pwd=$_POST['pwd'];

        $sql = "SELECT * FROM usuario WHERE user = '$user'";
        $result = mysqli_query($conexion,$sql);
        $row = mysqli_fetch_assoc($result); 
        $db_user = $row['user'];
        $db_pass = $row['pass'];
        $prof_pic = $row['profile_pic'];
        
        $rehashpwd = md5($pwd);

        if ($user === $db_user && $db_pass === $rehashpwd) {
            $_SESSION['userLogged'] = $user;
            $_SESSION['profile_pic'] = $prof_pic;
            header("location: ../../admin");
        }else{
            $_SESSION['log_user'] = $user;
            header("location: ../../cms-admin.php");
        }
    }
?>
