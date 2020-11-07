<?php include 'includes/header.php'; ?>


<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">
                <h1 class="page-header">
				  Gestiones adicionales
				</h1>
	        </div>
            <form action="includes/functions.php" enctype="multipart/form-data" method="post" class="alert alert-success">
              <div class="form-group">
                <h4 class="text-center"><strong>Banner</strong></h4>
                <label for="exampleInputEmail1" >Seleccione una foto para agregar al banner<br><br><small class="alert alert-warning">*En el banner pueden ir 3 imágenes.</small></label>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">imagen</label>
                <input type="file" class="form-control" name="img_b" id="img_b" oninvalid="setCustomValidity('Es necesario una imagen')" onchange="try{setCustomValidity('')}catch(e){}">
              </div>
              <button type="submit" name="add_banner" class="btn btn-primary">Agregar</button>
            </form>
            <form action="includes/functions.php" method="post" class="alert alert-warning">
              <div class="form-group">
                <h4 class="text-center"><strong>Reseña Histórica</strong></h4>
                <label for="exampleInputEmail1" >Edite el contenido y fotos para mostrar en la Web</label>
              </div>
              <div class="form-group">
              <?php 
              $query = mysqli_query($conexion,"SELECT * FROM historia LIMIT 1");
              $row = mysqli_fetch_assoc($query);
              ?>
               <textarea class="form-control" name="contenido" id="editor3"><?=$row['descripcion']?></textarea>
              </div>
              <button type="submit" name="add_historia" class="btn btn-primary">Agregar</button>
            </form>
        </div>
    </div>
			<!-- /.row -->
</div>
		<!-- /.container-fluid -->


<!-- jQuery -->
<script src="bootstrap/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
    CKEDITOR.replace('editor3');
    
    $("#img_b").toggle(true).prop('required', true);
</script>

</body>

</html>