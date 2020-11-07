<?php include 'includes/header.php'; ?>


<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">

					<h1 class="page-header">
					Galería de fotos
					</h1>
	        </div>
            <form class="form-inline" action="includes/functions.php" enctype="multipart/form-data" method="post">
              <div class="form-group mx-sm-3 mb-2">
                <input type="file" class="form-control" name="img_gal" id="img_gal" oninvalid="setCustomValidity('Es necesario una imagen')" onchange="try{setCustomValidity('')}catch(e){}">
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <select name="titulo_pro_img" class="form-control" required oninvalid="setCustomValidity('Debe ingresar un programa')" onchange="try{setCustomValidity('')}catch(e){}">
                    <option selected>Programa...</option>
                        <?php 
                            $sql = mysqli_query($conexion,"SELECT * FROM titulo_navbar ORDER BY id_navbar DESC");
                            while($row = mysqli_fetch_array($sql)){
                                $title_prog=$row['titulo'];
                                    echo "<option value='$title_prog'>$title_prog</option>";
                            }
                        ?>
                </select>
              </div>
              <input type="submit" class="btn btn-primary" name="subir_imagen" value="Subir Imagen">
            </form>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="tz-gallery">
                        <h4>Fotos de Semana Santa</h4>
                    <?php
                        $sql = mysqli_query($conexion,"SELECT * FROM galeria ORDER BY idimagen DESC");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $img = $row['imagen'];?>
                                <div class="col-md-3">
                                    <form action="includes/functions.php" method="post">
                                    <input type="hidden" name="id_img_gal" value="<?=$row['idimagen']?>">
                                    <button type="submit" name="delet_img" class="btn btn-danger"><span class="fa fa-trash-o"></span></button>
                                    </form>
                                    <a class="lightbox" href="images-program/<?=$img;?>">
                                        <img src="images-program/<?=$img;?>" height="200px" alt="Sistema Web de Inventario Simple " >
                                    </a>
                                </div>
                        <?php } ?>
                           </div><br>
                    </div>       
                </div>
            </div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery -->

<script src="bootstrap/js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
    $("#img_gal").toggle(true).prop('required', true);
</script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>

</html>
