<?php require 'includes/header.php'; 
    $user = $_SESSION['userLogged'];
    global $conexion;
    $sql = mysqli_query($conexion,"SELECT * FROM usuario WHERE user = '$user'");
    $data = mysqli_fetch_array($sql);
?>
<style>
    .form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .im{
        border-radius: 100%;
        width: 100px;
        height: 100px;
    }
</style>
        <div id="wrapper">
            <!-- Navigation -->
            <?php include 'includes/navigation.php'; ?>
                <div id="page-wrapper">
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="row">
                            <h1 class="page-header text-center">
                            Perfil <button id="myButton" class="btn btn-primary" onclick="ShowForm()">Habilitar edición </button> 
                            </h1>
                            <div class="alert alert-light  text-center form-group">
                                <strong>¡Si actualiza la contraseña, tiene que iniciar sesión de nuevo!</strong>
                            </div>
                        </div>
                    </div>
                    <form action="" method="post" role="form" class="form" id="myForm">
                        <img src="<?php echo $data['profile_pic'];?>" class="im" alt="">
                        
                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="text" class="form-control" name="usuar" id="us" value="<?php echo $data['user']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Contraseña actual</label>
                            <input type="password" class="form-control" name="oldPwd" id="oldPwd" >
                            <p id="check" style="font-size:11px;">
                        </div>
                        <div class="form-group">
                            <label>Nueva Contraseña</label>
                            <input type="password" class="form-control" name="pwd" id="new">
                        </div>
                        <div class="form-group">
                        <label>Rol</label>
                        <?php 
                                $sql= "SELECT * FROM usuario WHERE user = '$user'";
                                $res= mysqli_query($conexion,$sql);
                                while($row = mysqli_fetch_array($res)){
                                    $rol=$row['role'];
                                    echo "<input type='text' class='form-control' name='rolu' id='rol' value='$rol'>";
                                }
                            ?>
                        </div><br>
                        <button type="submit" name="updatee" id="button" class="btn btn-primary">Actualizar </button> <br>
                        <?php 
                        if (isset($_POST['updatee'])) {
                        $usr = isset($_POST['usuar']);
                        $oldpwd = $_POST['oldPwd'];
                        $newpass = $_POST['pwd'];
                        $rol = isset($_POST['rolu']);
                        $msg="";    
                           if (empty($oldpwd)) {
                                $msg = "<b>La contraseña actual es requerida</b>";
                                echo "<div class='alert alert-danger'>$msg</div>";
                            }elseif (empty($newpass)) {
                                $msg = "<b>La nueva contraseña es requerida</b>";
                                echo "<div class='alert alert-danger'>$msg</div>";
                            }else{
                            $query = mysqli_query($conexion, "SELECT pass FROM usuario WHERE user = '$user'");
                            $data = mysqli_fetch_array($query);
                            $pwdfromdb = $data['pass'];
                            $encrypwd= md5($oldpwd);
                            if ($pwdfromdb==$encrypwd) {
                                $newencryp = md5($newpass);
                                $query = mysqli_query($conexion, "UPDATE usuario SET pass='$newencryp' WHERE user = '$user'");
                                if ($query) {
                                    session_destroy();
                                    header("location: ../cms-admin.php");
                                }
                            }
                        }
                    } 
                    ?>
                        <br>
                </div>    
        </div>
	</div>
</div>

<script>
    $(document).ready(function(){
        $("#oldPwd").keyup(function(){
            let text = document.getElementById('oldPwd').value;
            $("#check").load('check.php',{
                text: text
            });
        });
    });

    $("#us").prop('disabled',true);
    $("#oldPwd").prop('disabled',true);
    $("#new").prop('disabled',true);
    $("#rol").prop('disabled',true);
    $("#button").prop('disabled',true);
    function ShowForm(){
        let text = "";
        if ($("#myButton").text()==="Habilitar edición") {
            $("#us").prop('disabled',true);
            $("#oldPwd").prop('disabled',false);
            $("#new").prop('disabled',false);
            $("#rol").prop('disabled',true);
            $("#button").prop('disabled',false);
            text = "Desabilitar formulario";
        }else{
            $("#us").prop('disabled',true);
            $("#oldPwd").prop('disabled',true);
            $("#new").prop('disabled',true);
            $("#rol").prop('disabled',true);
            $("#button").prop('disabled',true);
            text = "Habilitar edición";
        }
        $("#myButton").html(text);
    }
</script>
<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
