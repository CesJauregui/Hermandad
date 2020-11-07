<?php 
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $edit_i = $_GET['id'];
        $query = mysqli_query($conexion,"SELECT * FROM integrantes WHERE idintegrante = '$edit_i'");
            if(mysqli_num_rows($query) > 0){
                $data = mysqli_fetch_array($query);
            }else{
                die("No se puede grabar a la base de datos");
            }
    }else{
        die("Fallido");
    }
?>
<div class="container">
    <div class="row">
        <h2>Editar Miembro</h2>
        <form action="includes/functions.php" method="post" enctype="multipart/form-data">
            <div class="col-md-4 text-center">
                <img src="images-integr/<?=$data['foto']?>" width="200px" class="img-fluid rounded mx-auto d-block text-center" alt="Sin foto"><br>
                <input type="text" name="edit_id_m" value="<?=$data['idintegrante']?>" style="display:none;" >
                <div class="form-group">
                    <label for="">Actualizar foto</label>
                    <input type="file" name="foto_e" class="form-control" oninvalid="setCustomValidity('Es necesario una imagen')" onchange="try{setCustomValidity('')}catch(e){}">
                    <input name="imag" value="<?=$data['foto']?>" style="display:none;" >
                    <input type="text" name="editId" value="<?=$edit_id?>" style="display:none;" >  
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_e" id="nombre_e" placeholder="Ingrese el nombre" class="form-control" value="<?= $data['nombres']; ?>" required oninvalid="setCustomValidity('Debe ingresar el nombre')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellido_e" id="apellido_e" placeholder="Ingrese los apellidos" class="form-control" value="<?= $data['apellidos'] ?>" required oninvalid="setCustomValidity('Debe ingresar los apellidos')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group">
                    <label for="">Tiempo en la Hermandad</label>
                    <input type="text" name="tiempo_e" id="tiempo_e" placeholder="Ingrese el tiempo" class="form-control" value="<?= $data['tiempo'] ?>" required oninvalid="setCustomValidity('Debe ingresar el tiempo')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group">
                    <label for="">Correo</label>
                    <input type="email" name="correo_e" id="correo_e" placeholder="Ingrese el correo" class="form-control" value="<?= $data['correo'] ?>">
                </div>
                <?php 
                if($data['estado']=='activo'){
                ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estad" id="exampleRadios1" value="activo" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Activo
                    </label><br>
                    <input class="form-check-input" type="radio" name="estad" id="exampleRadios1" value="retirado">
                    <label class="form-check-label" for="exampleRadios1">
                        Retirado
                    </label>
                </div>
                 <?php }else {?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="estad" id="exampleRadios2" value="activo">
                    <label class="form-check-label" for="exampleRadios2">
                        Activo
                    </label><br>
                    <input class="form-check-input" type="radio" name="estad" id="exampleRadios2" value="retirado" checked>
                    <label class="form-check-label" for="exampleRadios2">
                        Retirado
                    </label>
                </div>
                <?php }?><br>
                    <div class="form-group">
                        <input type="submit" name="editInt"  value="Guardar Cambios" class="btn btn-primary">
                        <a href="integrantes.php"><input type="button" name="Cancel" value="Volver" class="btn btn-warning"></a>
                    </div>
            </div>
        </form> 
    </div>
</div>