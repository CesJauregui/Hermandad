
<?php include_once 'functions.php';
  $quer = mysqli_query($conexion,"SELECT * FROM posts");
  $posts=10;
  $paginas = mysqli_num_rows($quer);
  $total = $paginas/$posts;
  $total = ceil($total);
?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php echo $_GET['pagina']<=1 ? 'hidden':''?>">
                <a class="page-link" href="posts.php?pagina=<?php echo $_GET['pagina']-1 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
            <?php for ($i=0; $i<$total; $i++): ?>
                <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active':''?>"><a class="page-link" href="posts.php?pagina=<?php echo $i+1;?>"><?php echo $i+1;?></a>
                </li>
            <?php endfor?>
            <li class="page-item <?php echo $_GET['pagina']>=$total ? 'hidden':''?>"><a class="page-link" href="posts.php?pagina=<?php echo $_GET['pagina']+1 ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
            </li>

            <form class="form-inline my-2 my-lg-5" method="post" style="padding-left: 20rem; padding-right:10px;">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar contenido" id="searc" name="searc" aria-label="Search">
            </form>
        </ul>
    </nav>
    <?php
        if (!$_GET) {
            header("location: posts.php?pagina=1");
        }
        $iniciar = (($_GET['pagina'])-1)*$posts;
        $sql_posts = mysqli_query($conexion,"SELECT * FROM posts ORDER BY post_id DESC LIMIT $iniciar,$posts");
    ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="tab">
                <thead>
                    <th>Post_ID</th>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Tipo Post</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                    <th>Portada</th>
                    <th>Contenido</th>
                    <th colspan="3" class="text-center">Función</th>
                </thead>
                <tbody>
                    <?php
                    foreach($sql_posts as $fila):
                        $post_id=$fila['post_id'];
                        $post_title=$fila['post_title'];
                        $category=$fila['post_category'];
                        $type=$fila['type_post'];
                        $category_id=$fila['post_category_id'];
                        $status=$fila['post_status'];
                        $post_image=$fila['post_image'];
                        $content=substr($fila['post_content'], 0, 75);
                        $date=$fila['post_date'];

                        echo "<tr>";
                        echo "<td>{$post_id}</td>";
                        if (empty($post_title)) {
                            echo "<td class='alert alert-warning'>Sin Título</td>";
                        }else{
                            echo "<td>{$post_title}</td>";
                        }
                        echo "<td>{$category}</td>";
                        echo "<td>{$type}</td>";
                        //Mostrar botones segun el estado
                        if ($status=='borrador') {
                            echo "<td class='text-center'>{$status}". "<br>";
                            echo "<a href='posts.php?publish_post=$post_id'><input type='submit' class='btn btn-primary' value='Publicar'></a></td>";
                        }else{
                            echo "<td class='text-center'>{$status}" ."<br>";
                            echo "<a href='posts.php?nopublish_post=$post_id'><input type='submit' class='btn btn-warning' value='Dar de baja'></a></td>";
                        }
                        echo "<td>{$date}</td>";
                        if ($post_image=='../images/') {
                            echo "<td class='alert alert-warning'>Sin Imagen</td>";
                        }else{
                        echo "<td><img src='images/{$post_image}' class='rounded mx-auto d-block' width='50px'></td>";
                        }
                        if (empty($content)) {
                            echo "<td class='alert alert-warning'>Sin Contenido</td>";
                        }else{
                            echo "<td>{$content}</td>";
                        }
                        echo "<td><a href='posts.php?source=edit&edit_post=$post_id'><input type='submit' class='btn btn-success' style='margin: auto;' value='Editar'></a></td>";
                        echo "<td><a href='posts.php?delete_post=$post_id'><input type='submit' class='btn btn-danger' style='margin:auto;' value='Eliminar'></a></td>";
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
