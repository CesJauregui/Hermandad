<?php $sql = mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2027%' GROUP BY titulo ORDER BY idprograma ASC");
    while($row = mysqli_fetch_assoc($sql)){
?> 
    <div class="col-md-12">
		<div class="accordion" id="accordionExample" >
            <div class="card">
	            <div class="card-header"  id="titu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="true" disabled>
                        <h5><strong><?=$row['titulo']?></strong></h5>
                        </button>
                    </h2>
                </div>
                <?php 
                    $sql2=mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2027%' ORDER BY idprograma DESC");
                      	while ($row2 = mysqli_fetch_assoc($sql2)) {
                ?>
                <div class="card-headerb"  id="headingOne<?=$row['idprograma']?>">
                    <h2 class="mx-3">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#domingo<?=$row2['idprograma']?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="titl-prog">&#8226; <?=$row2['subtitulo']; ?></h5>
                        </button>
                    </h2>
                </div>
                <div id="domingo<?=$row2['idprograma']?>" class="collapse" aria-labelledby="headingOne<?=$row['idprograma']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                          	<div class="row">
                              	<div class="col-md-12">
                                <?=$row2['contenido']?>
                              	</div>
                            </div><br>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
            <div class="card">
            </div>
        <a href="../festividad_pdf.php?id=<?=$row['id_title_programa']?>" class="titl titl-prog">Descargar Programa 2027 en PDF <span class="fa fa-download"></span></a><br>
    </div><br>
</div>
<br>
<?php } ?>

<?php $sql = mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2026%' GROUP BY titulo ORDER BY idprograma ASC");
    while($row = mysqli_fetch_assoc($sql)){
?> 
    <div class="col-md-12">
		<div class="accordion" id="accordionExample" >
            <div class="card">
	            <div class="card-header"  id="titu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="true" disabled>
                        <h5><strong><?=$row['titulo']?></strong></h5>
                        </button>
                    </h2>
                </div>
                <?php 
                    $sql2=mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2026%' ORDER BY idprograma DESC");
                      	while ($row2 = mysqli_fetch_assoc($sql2)) {
                ?>
                <div class="card-headerb"  id="headingOne<?=$row['idprograma']?>">
                    <h2 class="mx-3">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#domingo<?=$row2['idprograma']?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="titl-prog">&#8226; <?=$row2['subtitulo']; ?></h5>
                        </button>
                    </h2>
                </div>
                <div id="domingo<?=$row2['idprograma']?>" class="collapse" aria-labelledby="headingOne<?=$row['idprograma']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                          	<div class="row">
                              	<div class="col-md-12">
                                <?=$row2['contenido']?>
                              	</div>
                            </div><br>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <div class="card">
            </div>
            <a href="festividad_pdf.php" class="titl titl-prog">Descargar Programa 2026 en PDF <span class="fa fa-download"></span></a><br>
        </div><br>
    </div>
<br>
<?php } ?>

<?php $sql = mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2025%' GROUP BY titulo ORDER BY idprograma ASC");
    while($row = mysqli_fetch_assoc($sql)){
?> 
    <div class="col-md-12">
		<div class="accordion" id="accordionExample" >
            <div class="card">
	            <div class="card-header"  id="titu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="true" disabled>
                        <h5><strong><?=$row['titulo']?></strong></h5>
                        </button>
                    </h2>
                </div>
                <?php 
                    $sql2=mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2025%' ORDER BY idprograma DESC");
                      	while ($row2 = mysqli_fetch_assoc($sql2)) {
                ?>
                <div class="card-headerb"  id="headingOne<?=$row['idprograma']?>">
                    <h2 class="mx-3">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#domingo<?=$row2['idprograma']?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="titl-prog">&#8226; <?=$row2['subtitulo']; ?></h5>
                        </button>
                    </h2>
                </div>
                <div id="domingo<?=$row2['idprograma']?>" class="collapse" aria-labelledby="headingOne<?=$row['idprograma']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                          	<div class="row">
                              	<div class="col-md-12">
                                <?=$row2['contenido']?>
                              	</div>
                            </div><br>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <div class="card">
            </div>
            <a href="festividad_pdf.php" class="titl titl-prog">Descargar Programa 2025 en PDF <span class="fa fa-download"></span></a><br>
        </div><br>
    </div>
<br>
<?php } ?>

<?php $sql = mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2024%' GROUP BY titulo ORDER BY idprograma ASC");
    while($row = mysqli_fetch_assoc($sql)){
?> 
    <div class="col-md-12">
		<div class="accordion" id="accordionExample" >
            <div class="card">
	            <div class="card-header"  id="titu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="true" disabled>
                        <h5><strong><?=$row['titulo']?></strong></h5>
                        </button>
                    </h2>
                </div>
                <?php 
                    $sql2=mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2024%' ORDER BY idprograma DESC");
                      	while ($row2 = mysqli_fetch_assoc($sql2)) {
                ?>
                <div class="card-headerb"  id="headingOne<?=$row['idprograma']?>">
                    <h2 class="mx-3">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#domingo<?=$row2['idprograma']?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="titl-prog">&#8226; <?=$row2['subtitulo']; ?></h5>
                        </button>
                    </h2>
                </div>
                <div id="domingo<?=$row2['idprograma']?>" class="collapse" aria-labelledby="headingOne<?=$row['idprograma']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                          	<div class="row">
                              	<div class="col-md-12">
                                <?=$row2['contenido']?>
                              	</div>
                            </div><br>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <div class="card">
            </div>
            <a href="festividad_pdf.php" class="titl titl-prog">Descargar Programa 2024 en PDF <span class="fa fa-download"></span></a><br>
        </div><br>
    </div>
<br>
<?php } ?>

<?php $sql = mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2023%' GROUP BY titulo ORDER BY idprograma ASC");
    while($row = mysqli_fetch_assoc($sql)){
?> 
    <div class="col-md-12">
		<div class="accordion" id="accordionExample" >
            <div class="card">
	            <div class="card-header"  id="titu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="true" disabled>
                        <h5><strong><?=$row['titulo']?></strong></h5>
                        </button>
                    </h2>
                </div>
                <?php 
                    $sql2=mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2023%' ORDER BY idprograma DESC");
                      	while ($row2 = mysqli_fetch_assoc($sql2)) {
                ?>
                <div class="card-headerb"  id="headingOne<?=$row['idprograma']?>">
                    <h2 class="mx-3">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#domingo<?=$row2['idprograma']?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="titl-prog">&#8226; <?=$row2['subtitulo']; ?></h5>
                        </button>
                    </h2>
                </div>
                <div id="domingo<?=$row2['idprograma']?>" class="collapse" aria-labelledby="headingOne<?=$row['idprograma']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                          	<div class="row">
                              	<div class="col-md-12">
                                <?=$row2['contenido']?>
                              	</div>
                            </div><br>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <div class="card">
            </div>
            <a href="festividad_pdf.php" class="titl titl-prog">Descargar Programa 2023 en PDF <span class="fa fa-download"></span></a><br>
        </div><br>
    </div>
<br>
<?php } ?>

<?php $sql = mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2022%' GROUP BY titulo ORDER BY idprograma ASC");
    while($row = mysqli_fetch_assoc($sql)){
?> 
    <div class="col-md-12">
		<div class="accordion" id="accordionExample" >
            <div class="card">
	            <div class="card-header"  id="titu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="true" disabled>
                        <h5><strong><?=$row['titulo']?></strong></h5>
                        </button>
                    </h2>
                </div>
                <?php 
                    $sql2=mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2022%' ORDER BY idprograma DESC");
                      	while ($row2 = mysqli_fetch_assoc($sql2)) {
                ?>
                <div class="card-headerb"  id="headingOne<?=$row['idprograma']?>">
                    <h2 class="mx-3">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#domingo<?=$row2['idprograma']?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="titl-prog">&#8226; <?=$row2['subtitulo']; ?></h5>
                        </button>
                    </h2>
                </div>
                <div id="domingo<?=$row2['idprograma']?>" class="collapse" aria-labelledby="headingOne<?=$row['idprograma']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                          	<div class="row">
                              	<div class="col-md-12">
                                <?=$row2['contenido']?>
                              	</div>
                            </div><br>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <div class="card">
            </div>
            <a href="festividad_pdf.php?id=<?=$row['id_title_programa']?>" class="titl titl-prog">Descargar Programa 2022 en PDF <span class="fa fa-download"></span></a>
        </div><br>
    </div>
<br>
<?php } ?>

<?php $sql = mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2021%' GROUP BY titulo ORDER BY idprograma ASC");
    while($row = mysqli_fetch_assoc($sql)){
?> 
    <div class="col-md-12">
		<div class="accordion" id="accordionExample" >
            <div class="card">
	            <div class="card-header"  id="titu">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" aria-expanded="true" disabled>
                        <h5><strong><?=$row['titulo']?></strong></h5>
                        </button>
                    </h2>
                </div>
                <?php
                    $sql2=mysqli_query($conexion,"SELECT * FROM programas WHERE titulo LIKE '%2021%' ORDER BY idprograma DESC");
                      	while ($row2 = mysqli_fetch_assoc($sql2)) {
                ?>
                <div class="card-headerb"  id="headingOne<?=$row['idprograma']?>">
                    <h2 class="mx-3">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#domingo<?=$row2['idprograma']?>" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="titl-prog">&#8226; <?=$row2['subtitulo']; ?></h5>
                        </button>
                    </h2>
                </div>
                <div id="domingo<?=$row2['idprograma']?>" class="collapse" aria-labelledby="headingOne<?=$row['idprograma']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="list-group" id="list-tab" role="tablist">
                          	<div class="row">
                              	<div class="col-md-12">
                                <?=$row2['contenido']?>
                              	</div>
                            </div><br>
                        </div>
                    </div>
                </div>
				<?php } ?>
            </div>
            <div class="card">
            </div>
            <a href="festividad_pdf.php?id=<?=$row['id_title_programa']?>" class="titl titl-prog">Descargar Programa 2021 en PDF <span class="fa fa-download"></span></a>
        </div>
    </div>
<br>
<?php } ?>



                             