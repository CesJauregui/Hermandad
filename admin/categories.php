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
                            Categorías
                        </h1>
					<div class="col-sm-6">
						<form action="includes/functions.php" method="post">
							<div class="form-group">
								<input type="text" name="cat_title" placeholder="Título de la categoría" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" name="cat_add" value="Agregar Categoría" class="btn btn-primary">
							</div>
						</form>

						</div>
                        <div class="col-sm-6">
                                <table class=" table table-bordered table-striped table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th colspan="2">Acción</th>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'includes/functions.php'; show_category();
                                    ?>
                                </tbody>
                                </table>
                        </div>
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

</body>

</html>
