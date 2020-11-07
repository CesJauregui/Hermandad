    <div class="container">
      <div class="row">
          <div class="col-sm-4" style="border: 2px solid #adb5bd;border-radius: 10px;">
             <form action="includes/functions.php" method="post" enctype="multipart/form-data" class="form">
                 <h2>Agregar Noticia</h2>
                     <div class="form-group">
                         <label for="">Título</label>
                         <input type="text" name="title" id="title" placeholder="Ingrese título" class="form-control" required oninvalid="setCustomValidity('Debe ingresar un título')" onchange="try{setCustomValidity('')}catch(e){}">
                     </div>
                     <div class="form-group">
                        <label for="">Categoría</label>
                        <select class="form-control" name="categorys" >
                            <option value="Sin categoria">Sin Categoría</option>
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
                         <select class="form-control" name="type_p"> 
                             <option value="noticia">Noticia</option>
                             <option value="actividad">Actividad</option>
                         </select> 
                     </div>  
                     <div class="form-group">
                         <label for="">Estado del Post</label>
                         <select class="form-control" name="status"> 
                             <option value="borrador">Borrador</option>
                             <option value="publicado">Publicar</option>
                         </select> 
                        </div>
                        <div class="form-group img-fluid">
                            <label for="">Imagen de portada <br><small>*puede volver a poner una imagen del contenido</small></label>
                            <input type="file" name="image" id="image" class="form-control" oninvalid="setCustomValidity('Es necesario una imagen')" onchange="try{setCustomValidity('')}catch(e){}">
                        </div>
                     </div><br>
                     <div class="col-sm-7">
                        <div class="form-group">
                        <label>Contenido</label>
                        <textarea  class="form-control" name="editor1" id="editor1"></textarea>
                     </div>
         </div>
             <div class="col-sm-12">
              <div class="form-group"><br>
                <input type="submit" name="publicar" id="publicar" value="Publicar" class="btn btn-primary">
              </div>
             </div>
            </form>
        </div>
    </div>
<script>
    CKEDITOR.replace('editor1');
    
    $("#image").toggle(true).prop('required', true);
</script>
