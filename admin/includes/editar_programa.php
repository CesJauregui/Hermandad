
<?php 
    if(isset($_GET['edit_program']) && $_GET['edit_program'] != ""){
        $edit_i = $_GET['edit_program'];
        $query = mysqli_query($conexion,"SELECT * FROM programas WHERE idprograma = '$edit_i'");
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
            <div class="col-sm-12" style="border: 2px solid #adb5bd;border-radius: 10px;">
                <form action="includes/functions.php" method="post">
              <div class="form-group">
                <h5><button type="submit" class="btn btn-success" name="prog_agregar_i"> Guardar Cambios</button><br><br>
                <a href="lista_programas.php"><button type="button" class="btn btn-warning" name="prog_volver_i"> Volver</button></a></h5>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                        <input type="hidden" name="id_prog_e" value="<?=$data['idprograma']?>">
                        <label for="">Programa</label>
                        <select class="form-control" name="program_titulo_i"> 
                            <option value="<?=$data['titulo']?>"><?=$data['titulo']?></option>
                            <?php 
                                $sql= "SELECT * FROM titulo_programas";
                                $res= mysqli_query($conexion,$sql);
                                while($row = mysqli_fetch_array($res)){
                                    $prog_title=$row['titulo'];
                                    echo "<option value='$prog_title'>$prog_title</option>";
                                }
                            ?>
                        </select> 
                    </div>
                <div class="form-group col-md-6">
                  <label>Actividad</label>
                  <input type="text" class="form-control" name="program_actividad_i" value="<?=$data['subtitulo']?>" required oninvalid="setCustomValidity('Debe ingresar una actividad')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group col-md-12">
                  <label>Contenido</label>
                        <label>Contenido</label>
                        <textarea  class="form-control" name="content_prog"  id="editor1"><?=$data['contenido']?></textarea>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
    <script>

        CKEDITOR.replace('editor1');

        $("#image").toggle(true).prop('required', true);
    </script>