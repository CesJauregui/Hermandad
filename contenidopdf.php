<?php include_once 'admin/includes/db.php';?>
<?php 
    $id = $_GET['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM programas WHERE id_title_programa = '$id' ORDER BY idprograma DESC");
    $row  = mysqli_fetch_assoc($sql);
    ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$row['titulo'];?></title>
</head>
<body>
	<style>
		.ti{
			text-align: center;
			font-size: 20px;
			color: green;
			padding-top: 10px;
		}
		.foot{
			text-align: center;
			color: grey;
			bottom: auto;
			font-size: 15px;
		}
	</style>	
	<?php 
	echo "<strong class='ti'><h3>Semana Santa - ".$row['titulo']."</h3></strong>";
    $id = $_GET['id'];
    $sql = mysqli_query($conexion, "SELECT * FROM programas WHERE id_title_programa = '$id' ORDER BY idprograma DESC");
    while($row = mysqli_fetch_assoc($sql)){
        echo "<strong>".$row['subtitulo']."</strong><br>";
        echo "".$row['contenido']."<br>";
    }
    echo "<em class='foot'><h6>Hermandad Santos Varones Cargadores del Santo Sepulcro - San José de Canta<h6></em>";
    ?>
</body>
</html>