<header role="banner"> 
<nav class="navbar mynav navbar-expand-lg navbar-dark  fixed-top">
        <a class="navbar-brand" href="./"> <img class="img-fluid" width="60px" src="images/logoreal.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="noticias"><strong>Noticias</strong></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="historia"><strong>Historia</strong></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="integrantes"><strong>Integrantes</strong></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="galeria"><strong>Galería</strong></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="actividades"><strong>Actividades</strong></a>
            </li>
            <?php 
              $sql = mysqli_query($conexion, "SELECT * FROM titulo_navbar ORDER BY id_navbar ASC");
              $row = mysqli_fetch_assoc($sql);
             ?>
            <li class="nav-item">
                <a class="nav-link" href="festividad"><strong><?=$row['titulo']?></strong></a>
            </li>
          </ul>
        </div>
      </nav>
</header>

