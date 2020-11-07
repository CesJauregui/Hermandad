
<?php 
    //Editar post
    if (isset($_GET['edit_post']) && $_GET['edit_post'] != "") {
        $edit_id = $_GET['edit_post'];
        $query = mysqli_query($conexion, "SELECT * FROM posts WHERE post_id = '$edit_id'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $titulo = $data['post_title'];
            $categoria = $data['post_category'];
            $type = $data['type_post'];
            $estado = $data['post_status'];
            $image = $data['post_image'];
            $contenido = $data['post_content'];
        }else{
            die("No se puede grabar a la base de datos");
        }
    }else{
        die("Fallido");
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4" style="border: 2px solid #adb5bd;border-radius: 10px;">
                <form action="includes/functions.php" method="post" enctype="multipart/form-data" class="form">
                <h2>Editar Post</h2>
                    <div class="form-group">
                        <label for="">Título</label>
                        <input type="text" name="title" id="title" placeholder="Ingrese título" class="form-control" value="<?php echo $titulo; ?>" required oninvalid="setCustomValidity('Debe ingresar un título')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>
                    <div class="form-group">
                        <label for="">Categoría</label>
                        <select class="form-control" name="category"> 
                            <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                            <option value="Sin categoria">Sin categoría</option>
                            <?php 
                                $sql= "SELECT * FROM categorias";
                                $res= mysqli_query($conexion,$sql);
                                while($row = mysqli_fetch_array($res)){
                                    $cat_title=$row['tit_categoria'];
                                    echo "<option value='$cat_title'>$cat_title</option>";
                                }
                            ?>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="">Tipo de Publicación</label>
                         <select class="form-control" name="type_p_e"> 
                             <?php 
                                if ($type == "noticia") {
                                    echo "<option value='noticia'>Noticia</option>
                                    <option value='actividad'>Actividad</option>";
                                }else{
                                    echo "<option value='actividad'>Actividad</option>
                                    <option value='noticia'>Noticia</option>";
                                }
                            ?>
                         </select> 
                    </div>  
                    <div class="form-group">
                        <label for="">Estado del Post</label>
                        <select class="form-control" name="status"> 
                            <?php 
                                if ($estado == "borrador") {
                                    echo "<option value='borrador'>Borrador</option>
                                    <option value='publicado'>Publicado</option>";
                                }else{
                                    echo "<option value='publicado'>Publicado</option>
                                    <option value='borrador'>Borrador</option>";
                                }
                            ?>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="">Imagen de portada <br><small>*puede volver a poner una imagen del contenido</small></label>
                            <input type="file" name="post_images" class="form-control" oninvalid="setCustomValidity('Es necesario una imagen')" onchange="try{setCustomValidity('')}catch(e){}">
                            <input name="image" value="<?php echo $image; ?>" style="display:none;" >
                            <input type="text" name="editID" value="<?php echo $edit_id; ?>" style="display:none;" >
                    </div>
                </div>
                <div class="col-xs-8">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <h4><label class="text-center">Vista de la imagen de portada</label></h4>
                            
                                <img  src="images/<?php echo $image; ?>" width="250px" height="300px" style="border-radius:10px;" class="img-fluid rounded mx-auto d-block">
                            </div>
                        <div class="col-md-6 form-group" style="border: 2px solid #adb5bd;border-radius: 10px;">
                            <h4><label class="text-center">Indicaciones:</label></h4><br>
                                <small>* Para modificar un video, vaya a la parte del contenido y presione en <strong>"Fuente HTML" o "Source"</strong>, luego ubíquese en la etiqueta <strong>"div"</strong> que se encuentra al inicio de un párrafo y elimine todo lo que contiene.<br><br>
                                * Para volver al contenido normal presione nuevamente en "Fuente HTML" o "Source". <br><br></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-12">
                    <div class="form-group">
                        <label>Contenido</label>
                        <textarea  class="form-control" name="content"  id="editor2"><?php echo $contenido; ?></textarea>
                    </div>
                    <div class="form-group col-sm-2">
                        <input type="submit" name="modify"  value="Guardar Cambios" class="btn btn-primary">
                    </div>
                    <div class="form-group col-sm-2">
                        <a href="posts.php"><input type="button" name="Cancel" value="Volver" class="btn btn-warning"></a>
                    </div>
                </div>
                </form>
        </div>
      </div>
    </div>
    <script>
        CKEDITOR.replace('editor2');

        $("#image").toggle(true).prop('required', true);
    </script>
                    
