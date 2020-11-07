<?php include 'includes/header.php'; ?>
<?php include 'includes/functions.php'?>
<?php 
	if (isset($_GET['delete_user']) && $_GET['delete_user'] != '') {
        $id_d = $_GET['delete_user'];
        if (delete('usuario','idusuario',$id_d)) {
            redirect('users.php?source');
        }else{
			die('Fallido');
		}
	}
?>
<div id="wrapper">
	<?php include 'includes/navigation.php'; ?>
	<div id="page-wrapper">

		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="row">

					<h1 class="page-header">
					Módulo de Usuarios
					</h1>
	</div>

				</div>
			<?php 
				if(isset($_GET['source'])){
					$source = $_GET['source'];
				
				switch ($source) {
					case 'add_user':
						include "includes/add_user.php";
					break;
					default:
						include "includes/view_user.php";
						break;
				}
			}
			?>
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

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>

</html>
