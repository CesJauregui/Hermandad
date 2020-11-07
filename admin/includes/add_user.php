
<style>
    .form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

<?php include "includes/header.php";?>
<form action="" method="post" role="form" class="form">
<h2>Agregar</h2>
  <div class="form-group">
    <label>Usuario</label>
    <input type="text" class="form-control" name="users" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="pwd">
  </div>
  <div class="form-group text-center">
    <label>Rol</label>
    <select class="form-control" name="rol" > 
        <option value='editor'>editor</option>
        <option value='admin'>admin</option>
    </select> 
  </div><br>
  <button type="submit" name="crear_user" class="btn btn-primary">Crear</button><br>

  <?php
  //Crear nuevo usuario 
  if (isset($_POST['crear_user'])) {
    $user=$_POST['users'];
    $pwd=$_POST['pwd'];
    $rol=$_POST['rol'];
    $img = "img_users/foto".rand(1,3).".jpg";
    $msg = "";
    if(empty($user)){
        $msg = "<b>El usuario es requerido</b>";
        echo "<div class='alert alert-danger'>$msg</div>";
    }elseif (empty($pwd)) {
        $msg = "<b>La contraseña es requerida</b>";
        echo "<div class='alert alert-danger'>$msg</div>";
    }elseif (empty($rol)) {
        $msg = "<b>El rol es requerido</b>";
        echo "<div class='alert alert-danger'>$msg</div>";
    }else{
        $hashedpwd= md5($pwd);
        $query = "INSERT INTO usuario VALUES('','$user','$hashedpwd','$img','si','$rol')";
        $result=mysqli_query($conexion,$query);
            if ($result) {
                $msg = "<b>Usuario agregado</b>";
                echo "<div class='alert alert-success'>$msg</div>";
                header('location: ../admin/users.php?source');
            }
    }
 }
?>
</form>
