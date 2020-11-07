<div class="container-fluid">
    <div class="row">
        <?php include 'add_miembro.php';?>
        <div class="form-group col-md-12 text-center">
            <label><h4><strong>Lista de hermanos</strong></h4></label>
        </div>
        <div class="col-md-12">
            <?php include_once 'functions.php';
              $quer = mysqli_query($conexion,"SELECT * FROM integrantes");
              $integ=10;
              $paginas = mysqli_num_rows($quer);
              $total = $paginas/$integ;
              $total = ceil($total);
            ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'hidden':''?>">
                        <a class="page-link" href="integrantes.php?pagina=<?php echo $_GET['pagina']-1 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                    </li>
                    <?php for ($i=0; $i<$total; $i++): ?>
                        <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active':''?>"><a class="page-link" href="integrantes.php?pagina=<?php echo $i+1;?>"><?php echo $i+1;?></a>
                        </li>
                    <?php endfor?>
                    <li class="page-item <?php echo $_GET['pagina']>=$total ? 'hidden':''?>"><a class="page-link" href="integrantes.php?pagina=<?php echo $_GET['pagina']+1 ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                    </li>

                    <form class="form-inline my-2 my-lg-5" method="post" style="padding-left: 20rem; padding-right:10px;">
                        <input class="form-control mr-sm-2" type="text" placeholder="Buscar contenido" id="searc" name="searc" aria-label="Search">
                    </form>
                </ul>
            </nav>
            <?php
                if (!$_GET) {
                    header("location: integrantes.php?pagina=1");
                }
                $iniciar = (($_GET['pagina'])-1)*$integ;
                $sql_integ = mysqli_query($conexion,"SELECT * FROM integrantes ORDER BY idintegrante DESC LIMIT $iniciar,$integ");
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="tab">
                    <thead>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Tiempo</th>
                      <th>Correo</th>
                      <th>Foto</th>
                      <th>Estado</th>
                      <th colspan="3" class="text-center">Función</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach($sql_integ as $fila):
                            $id=$fila['idintegrante'];
                            $nombre=$fila['nombres'];
                            $apellido=$fila['apellidos'];
                            $tiempo=$fila['tiempo'];
                            $correo=$fila['correo'];
                            $foto=$fila['foto'];
                            $estado=$fila['estado'];
                            echo "<tr>";
                            echo "<td>{$nombre}</td>";
                            echo "<td>{$apellido}</td>";
                            echo "<td>{$tiempo}</td>";
                            if (empty($correo)) {
                                echo "<td class='alert alert-warning'>Sin Correo</td>";
                            }else{
                                echo "<td>{$correo}</td>";
                            }
                            //Mostrar botones segun el estado
                            if ($foto=='') {
                                echo "<td class='alert alert-warning'>Sin Foto</td>";
                            }else{
                            echo "<td><img src='images-integr/{$foto}' class='rounded mx-auto d-block' width='50px'></td>";
                            }
                            echo "<td class='text-center'>{$estado}</td>";
                            echo "<td><a href='integrantes.php?source=editar&id=$id'><input type='submit' class='btn btn-primary' value='Editar'></a></td>";
                            echo "</tr>";
                        endforeach
                        ?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
<script>
    $(document).ready(function(){
     $("#searc").keyup(function(){
    _this = this;
    $.each($("#tab tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
         $(this).hide();
        else
         $(this).show();
      });
     });
    });
</script>
