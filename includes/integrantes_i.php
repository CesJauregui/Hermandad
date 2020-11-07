
<div class="row">
    <?php 
        $sql = mysqli_query($conexion, "SELECT * FROM integrantes  WHERE estado='activo' ORDER BY idintegrante DESC");
        while($row = mysqli_fetch_assoc($sql)){
    ?>
    <div class="col-md-6">
        <div class="card card-int mb-3" style="max-width: 100%;">
            <div class="media">
                <img src="admin/images-integr/<?=$row['foto']; ?>" class="align-self-center mr-3 text-center" alt="Sin foto">
                <div class="card-body">
                    <h5 class="card-title card-body-inte">Nombres: <br><small class="text-muted card-body-inte"><?=$row['nombres']; ?></small></h5>
                    <h5 class="card-title card-body-inte">Apellidos: <br><small class="text-muted card-body-inte"><?=$row['apellidos']; ?></small></h5>
                    <h5 class="card-title card-body-inte">Tiempo en la hermandad: <br><small class="text-muted card-body-inte"><?=$row['tiempo']; ?></small></h5>
                    <?php 
                    if(empty($row['correo'])){
                    ?>
                    <h5 class="card-title card-body-inte">Correo eléctronico: <br><small class="text-muted card-body-inte">Sin correo</small></h5>
                    <?php }else{
                    ?>
                    <h5 class="card-title card-body-inte">Correo eléctronico: <br><small class="text-muted card-body-inte"><?=$row['correo']; ?></small></h5>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="col-md-8">
        <h4 class="mb-4 titl text-center">Hermanos que siempre serán recordados (Q.E.P.D)</h4>
    </div>

    <?php 
    $query = mysqli_query($conexion, "SELECT * FROM integrantes WHERE estado='retirado' ORDER BY idintegrante DESC");
    while($row = mysqli_fetch_assoc($query)){
    ?>
    <div class="col-md-6">
        <div class="card card-int mb-3" style="max-width: 100%;">
            <div class="media">
                <img src="admin/images-integr/<?=$row['foto']; ?>" class="align-self-center mr-3 text-center" alt="Sin foto">
                <div class="card-body">
                    <h5 class="card-title card-body-inte">Nombres: <br><small class="text-muted card-body-inte"><?=$row['nombres']; ?></small></h5>
                    <h5 class="card-title card-body-inte">Apellidos: <br><small class="text-muted card-body-inte"><?=$row['apellidos']; ?></small></h5>
                    <h5 class="card-title card-body-inte">Tiempo en la hermandad: <br><small class="text-muted card-body-inte"><?=$row['tiempo']; ?></small></h5>
                    <?php 
                    if(empty($row['correo'])){
                    ?>
                    <h5 class="card-title card-body-inte">Correo eléctronico: <br><small class="text-muted card-body-inte">Sin correo</small></h5>
                    <?php }else{
                    ?>
                    <h5 class="card-title card-body-inte">Correo eléctronico: <br><small class="text-muted card-body-inte"><?=$row['correo']; ?></small></h5>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
