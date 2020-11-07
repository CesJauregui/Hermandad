 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <spam class="navbar-brand"><i class="fa fa-user"></i> <?php echo $user; ?></spam>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                  <li><a href="../index.php">Ir al Sitio Web</a></li>
                <li>
                <li>
                    <a href="index.php?logout"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                </li>
            </ul>
             <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard "></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-send"></i> Publicaciones <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post" class="collapse">
                            <li>
                                <a href="posts.php"> Ver Publicaciones</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_new"> Agregar Publicación</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="programas.php"><i class="fa fa-fw fa-book"></i> Programas y Festividades</a>
                    </li>
                    <li>
                        <a href="integrantes.php"><i class="fa fa-fw fa-users"></i> Integrantes</a>
                    </li>
                    <li>
                        <a href="galery.php"><i class="fa fa-fw fa-photo"></i> Galería</a>
                    </li>
                    <li>
                        <a href="categories.php"><i class="fa fa-fw fa-suitcase"></i> Categorías</a>
                    </li>
                    <li>
                        <a href="adicionales.php"><i class="fa fa-fw fa-plus"></i> Gestiones adicionales</a>
                    </li>
                        <?php
                        if ($rol=='admin') {
                        ?>     
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="users" class="collapse">
                                <li>
                                    <a href='users.php?source'> Ver usuarios</a>
                                </li>
                                <li>
                                    <a href='users.php?source=add_user'> Agregar usuario</a>
                                </li>
                            </ul>
                        <?php   
                            }
                        ?>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
                    </li>         
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

