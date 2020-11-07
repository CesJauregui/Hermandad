<?php include 'includes/header.php';?>
<?php include "includes/functions.php";?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include 'includes/navigation.php'; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
				      	</div>


                        <h1 class="page-header">
                            Bienvenido al panel de administración
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                        <div>Publicaciones <br>
                        <p style="font-size:40px; font-weight:700"><?php echo getNumPost();?></p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                        <div>Programas <br>
                        <p style="font-size:40px; font-weight:700"><?php echo getNumProg();?></p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="lista_programas.php">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <?php
        if ($rol=='admin') {
    ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <div> Usuarios<br>
                        <p style="font-size:40px; font-weight:700"><?php echo getNumUser();?></p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="users.php?source">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <?php
        }
    ?>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <div>Categorías<br>
                            <p style="font-size:40px; font-weight:700"><?php echo getNumCat();?></p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-skyblue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                      <div>Integrantes<br>
                        <p style="font-size:40px; font-weight:700;"><?php echo getNumInteg();?></p>
                      </div>
                    </div>
                </div>
            </div>
            <a href="integrantes.php">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-image fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                      <div>Galería<br>
                        <p style="font-size:40px; font-weight:700;"><?php echo getNumGal();?></p>
                      </div>
                    </div>
                </div>
            </div>
            <a href="galery.php">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalles</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<hr style="border: 1px solid grey;">
<div class="row">
    <div class="col-md-6">
        <strong>Últimas imágenes del banner</strong>
            <a type="button" class="btn btn-info" href="adicionales.php">Agregar Imágen</a>
        <div class="tz-gallery">
            <?php
                $sql = mysqli_query($conexion,"SELECT * FROM banner ORDER BY idbanner DESC LIMIT 6");
                    while ($row = mysqli_fetch_assoc($sql)) {
                    $img = $row['imagen'];?>
                    <div class="col-md-4">
                        <form action="includes/functions.php" method="post">
                            <input type="hidden" name="id_img_banner" value="<?=$row['idbanner']?>">
                            <button type="submit" name="delet_img_banner" class="btn btn-danger"><span class="fa fa-trash-o"></span>
                            </button>
                        </form>
                        <a class="lightbox" href="img-banner/<?=$img;?>">
                            <img src="images-program/<?=$img;?>" width="500px" height="100px" alt="Imagen banner" >
                        </a>
                    </div>
            <?php } ?>
        </div><br>
    </div>
    <div class="col-md-6 text-center">
        <strong>Última imagen subida desde la galería</strong><br>
        <?php 
            $sql = mysqli_query($conexion,"SELECT * FROM galeria ORDER BY idimagen DESC");
            $row = mysqli_fetch_assoc($sql);
            echo "<img src=admin/".$row['imagen']. " class='img-fluid' style='border-radius:5%;margin-bottom: 10px;' height='300px'>";
         ?>
    </div>
</div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
    $("#img_gal").toggle(true).prop('required', true);
</script>
</body>

</html>
