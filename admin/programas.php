<?php include 'includes/header.php';?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include 'includes/navigation.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Programas y Festividades
                        </h1>
          					<div class="col-sm-12">
                      <div class="col-sm-6">
          						  <form class="form-inline" action="includes/functions.php" method="post">
                          <div class="form-group mb-2">
                            <label>Nuevo Programa</label>
                          </div><br>
                          <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" name="titu" placeholder="Ejm: Programa 2021" required oninvalid="setCustomValidity('Debe ingresar un título de programa')" onchange="try{setCustomValidity('')}catch(e){}">
                          </div>
                          <button type="submit" class="btn btn-primary mb-2" name="add_titu">Agregar</button>
                        </form><br>
                        <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover">
                                <caption>Lista de programas</caption>
                                <thead>
                                  <tr>
                                    <th style="width: 10%;">id</th>
                                    <th style="width: 70%;">Programas</th>
                                    <th style="width: 20%;" colspan="2">Funciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $sql = mysqli_query($conexion, "SELECT * FROM titulo_programas ORDER BY idtitulo_progr DESC");
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                      ?>
                                  <tr>
                                    <input type="hidden" name="id_progr" value="<?=$row['idtitulo_progr']?>">
                                    <td><?=$row['idtitulo_progr']?></td>
                                    <td><?=$row['titulo']?></td>
                                     <td><a href="programas.php?borrar_progr=<?=$row['idtitulo_progr']?>"><input type="submit" class="btn btn-danger " value="Borrar"></a></td>
                                  </tr>
                                   <?php } ?>
                                </tbody>
                              </table>
                         </div> 
                        <br>
                      </div>
                      <div class="col-sm-6">
                        <form class="form-inline" action="includes/functions.php" method="post">
                          <div class="form-group mb-2">
                            <label>Título Navegación</label>
                          </div><br>
                          <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" name="titu_nav" placeholder="Ejm: Semana Santa 2021" required oninvalid="setCustomValidity('Debe ingresar un título para la navegación')" onchange="try{setCustomValidity('')}catch(e){}">
                          </div>
                          <button type="submit" class="btn btn-primary mb-2" name="add_titu_nav">Agregar</button>
                        </form>
                        <br>
                        <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover">
                                <caption>Lista de títulos de navegación</caption>
                                <thead>
                                  <tr>
                                    <th style="width: 10%;">id</th>
                                    <th style="width: 70%;">Títulos navegación</th>
                                    <th style="width: 20%;" colspan="2">Funciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $sql = mysqli_query($conexion, "SELECT * FROM titulo_navbar ORDER BY id_navbar DESC");
                                    while ($row = mysqli_fetch_assoc($sql)) {
                                      ?>
                                  <tr>
                                    <td ><?=$row['id_navbar']?></td>
                                    <td><?=$row['titulo']?></td>
                                     <td><a href="programas.php?borrar_nav=<?=$row['id_navbar']?>"><input type="submit" class="btn btn-danger" value="Borrar"></a></td>
                                  </tr>
                                   <?php } ?>
                                </tbody>
                              </table>
                        </div>
                      </div>
						        </div>
                        <div class="form-group col-md-2">
                          <?php include 'includes/functions.php';?>
                          <strong><caption>PROGRAMAS</caption></strong>
                            <a href="lista_programas.php" ><input type="submit" class="btn btn-warning mb-2" name="view_programa" value="Ver programas"></a>
                        </div>
                        <form action="includes/functions.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label for="inputEmail4">Actividad</label>
                                  <input type="text" class="form-control" name="subtitulo" required oninvalid="setCustomValidity('Debe ingresar una actividad')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Ejm: Sábado de Gloria">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="inputState">Programa</label>
                                  <select name="titulo_pro" class="form-control" required oninvalid="setCustomValidity('Debe ingresar un s')" onchange="try{setCustomValidity('')}catch(e){}">
                                    <option selected>Seleccione...</option>
                                    <?php 
                                         $sql = mysqli_query($conexion,"SELECT * FROM titulo_programas ORDER BY idtitulo_progr DESC");
                                         while($row = mysqli_fetch_array($sql)){
                                              $title_prog=$row['titulo'];
                                             echo "<option value='$title_prog'>$title_prog</option>";
                                        }
                                    ?>
                                  </select>
                                </div> 
                                <div class="col-md-12">
                                   <div class="form-group">
                                   <label>Contenido</label>
                                   <textarea  class="form-control" name="edito" id="edito" required oninvalid="setCustomValidity('Debe ingresar el contenido')" onchange="try{setCustomValidity('')}catch(e){}" placeholder="Escriba el contenido"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" name="add_programa">Agregar</button>
                            </div>
                        </form>

                <!-- /.row -->
            </div>
        </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    CKEDITOR.replace('edito');
    
    $("#image").toggle(true).prop('required', true);
</script>
</body>

</html>
