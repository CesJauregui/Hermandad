<?php include 'includes/header.php';
      include 'includes/functions.php';
    //Eliminar post
    if (isset($_GET['delete_program']) && $_GET['delete_program'] != '') {
        $id_d = $_GET['delete_program'];
        if (delete('programas','idprograma',$id_d)) {
            redirect('lista_programas.php');
        }else{
            die('Fallido');
        }
    }
?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include 'includes/navigation.php'; ?>


        <div id="page-wrapper">
 
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Lista de programas
                        </h1>
                       <?php 
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                            switch ($source) {
                                case 'edi': include "includes/editar_programa.php";
                            break;
                        }
                        }else{
                            include "includes/view_programas.php";
                        }
                        ?>
					
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
