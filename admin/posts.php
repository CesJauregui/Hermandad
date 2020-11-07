<?php include 'includes/header.php'; 
 	  include 'includes/functions.php';

	//Eliminar post
    if (isset($_GET['delete_post']) && $_GET['delete_post'] != '') {
        $id_d = $_GET['delete_post'];
        if (delete('posts','post_id',$id_d)) {
            redirect('posts.php');
        }else{
			die('Fallido');
		}
    }
	//Publicar el post borrador
	if (isset($_GET['publish_post']) && $_GET['publish_post'] != "") {
		$id_p = $_GET['publish_post'];
		if (updateStatus($id_p)) {
			redirect('posts.php');
		}else{
			die('Fallido');
		}
	}
	//Dar de baja al post
	if (isset($_GET['nopublish_post']) && $_GET['nopublish_post'] != "") {
		$id_p = $_GET['nopublish_post'];
		if (updateStatus($id_p)) {
			redirect('posts.php');
		}else{
			die('Fallido');
		}
	}
?>
<div id="wrapper">

	<!-- Navigation -->
	<?php include 'includes/navigation.php'; ?>


	<div id="page-wrapper">

		<div class="container">

			<!-- Page Heading -->
			<div class="row">

					<h1 class="page-header">
					Módulo de Publicaciones
					</h1>

			</div>

		</div>
			<?php
				if(isset($_GET['source'])){
					$source = $_GET['source'];
					switch ($source) {
						case 'add_new':
							include "includes/add_post.php";
							break;
						case 'edit':
							include "includes/edit_post.php";
							break;
						default:
							include "includes/view_post.php";
							break;
					}
				}else{
					include "includes/view_post.php";
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
