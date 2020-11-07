<?php include_once 'functions.php';
                      $quer = mysqli_query($conexion,"SELECT * FROM programas");
                      $program=10;
                      $paginas = mysqli_num_rows($quer);
                      $total = $paginas/$program;
                      $total = ceil($total);
                    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina']<=1 ? 'hidden':''?>">
                <a class="page-link" href="lista_programas.php?pagina=<?php echo $_GET['pagina']-1 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
            <?php for ($i=0; $i<$total; $i++): ?>
                <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active':''?>"><a class="page-link" href="lista_programas.php?pagina=<?php echo $i+1;?>"><?php echo $i+1;?></a>
                </li>
            <?php endfor?>
            <li class="page-item <?php echo $_GET['pagina']>=$total ? 'hidden':''?>"><a class="page-link" href="lista_programas.php?pagina=<?php echo $_GET['pagina']+1 ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
            </li>

            <form class="form-inline my-2 my-lg-5" method="post" style="padding-left: 20rem; padding-right:10px;">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar contenido" id="searc" name="searc" aria-label="Search">
            </form>
        </ul>
    </nav>
    <?php
        if (!$_GET) {
            header("location: lista_programas.php?pagina=1");
        }
        $iniciar = (($_GET['pagina'])-1)*$program;
        $sql_posts = mysqli_query($conexion,"SELECT * FROM programas ORDER BY idprograma DESC LIMIT $iniciar,$program");
    ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="tab">
                <thead>
                    <th>ID</th>
                    <th>Programa</th>
                    <th>Actividad</th>
                    <th>Contenido</th>
                    <th colspan="3" class="text-center">Función</th>
                </thead>
                <tbody>
                    <?php
                    foreach($sql_posts as $fila):
                        $post_id=$fila['idprograma'];
                        $post_title=$fila['titulo'];
                        $category=$fila['subtitulo'];
                        $type=substr($fila['contenido'], 0, 100).  "...";

                        echo "<tr>";
                        echo "<td>{$post_id}</td>";
                        if (empty($post_title)) {
                            echo "<td class='alert alert-warning'>Sin Título</td>";
                        }else{
                            echo "<td>{$post_title}</td>";
                        }
                        echo "<td>{$category}</td>";
                        echo "<td>{$type}</td>";
                        echo "<td><a href='lista_programas.php?source=edi&edit_program=$post_id'><input type='submit' class='btn btn-success' style='margin: auto;' value='Editar'></a></td>";
                        echo "<td><a href='lista_programas.php?delete_program=$post_id'><input type='submit' class='btn btn-danger' style='margin:auto;' value='Eliminar'></a></td>";
                        echo "</tr>";
                    endforeach
                    ?>
                </tbody>
            </table>
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