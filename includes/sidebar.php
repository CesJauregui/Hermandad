<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="Jg22i9Nl"></script>
  <div class="card bg-light post-entry-sidebar mb-3" style="max-width: 100%;">
    <div class="card-header titl"><h5><spam class="fa fa-search"></spam> Buscar</h5></div>
      <div class="card-body text-primary">
        <p class="card-text">
          <div class="search-top">
            <form action="search.php" class="search-top-form" method="post">
              <input type="text" id="s" name="search" placeholder="Buscar Contenido">
            </form>
          </div>
        </p>
      </div>
  </div>
  <div class="card bg-light mb-3" style="max-width: 100%;">
    <div class="card-header titl"><h5><spam class="fa fa-thumbs-up"></spam> Síguenos</h5></spam></div>
        <div class="fb-page" data-href="https://www.facebook.com/SantosVaronesSJ/" data-tabs="timeline" data-width="520" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/SantosVaronesSJ/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SantosVaronesSJ/">Hermandad Santos Varones - Cargadores Del Santo Sepulcro - San José Canta</a></blockquote></div>
  </div>
  <div class="accordion" id="accordionExamplee">
  <div class="card">
    <div class="card-header titl" id="catheadingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#categoria" aria-expanded="true" aria-controls="categoria">
          <h5 class=""><spam class="fa fa-list-ul"></spam> Categorías</h5>
        </button>
      </h2>
    </div>
    <div id="categoria" class="collapse" aria-labelledby="catheadingOne" data-parent="#accordionExamplee">
      <div class="card-body">
        <ul class="categories">
          <?php 
          $sql = mysqli_query($conexion, "SELECT * FROM categorias ORDER BY idcategoria DESC LIMIT 6");
          while ($row = mysqli_fetch_assoc($sql)) {
            $id = $row['idcategoria'];
            $query = mysqli_query($conexion,"SELECT * FROM posts WHERE post_category_id=$id");
            $row2 = mysqli_fetch_assoc($query);
            $span = mysqli_num_rows($query);
            if ($span!=0) {
          ?>
          <li><a href='categorias.php?cat_id=<?=$row['idcategoria']?>'><?=$row['tit_categoria']?><span>(<?=$span?>)</span></a></li>
          <?php 
          } }
          ?>
        </ul>
      </div>
    </div>
    <div class="card">
    </div>
  </div>