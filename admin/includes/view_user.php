<?php include_once 'functions.php';?>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Usuario</th>
            <th>Foto</th>
            <th>Activo</th>
            <th>Rol</th>
            <th colspan="3" class="text-center">Función</th>
        </thead>
        <tbody>
            <?php
                show_user();
            ?>
        </tbody>
    </table>
</div>