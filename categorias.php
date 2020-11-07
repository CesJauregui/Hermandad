<?php include 'includes/header.php'; ?>
<div class="wrap">
<?php include 'includes/navigation.php'; ?>
<?php include 'includes/banner.php'; ?>
  <section class="site-section py-sm">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4 class="mb-4">Publicaciones relacionadas a <?php
          $p_i= $_GET['cat_id'];
           $query = mysqli_query($conexion,"SELECT * FROM posts where post_category_id = '$p_i'");
           $row = mysqli_fetch_assoc($query);  
           echo "<strong>$row[post_category]</strong>";?></h4>
        </div>
      </div>
      <div class="row blog-entries">
        <div class="col-md-12 col-lg-9 main-content">
          <div class="row">
              <?php 
              if (isset($_GET['cat_id'])) {
                $p_id = $_GET['cat_id'];

                $query = "SELECT * FROM posts WHERE post_category_id = $p_id AND post_status = 'publicado' ORDER BY post_category_id DESC";
                $result = mysqli_query($conexion,$query);
              }else{
                header("location: index.php");
              }
                if (mysqli_num_rows($result) === 0) {
                  echo "<div class='alert alert-danger' role='alert'>
                          No hay publicaciones para esta categoría
                        </div>";
                }else{
            ?>
            <?php 
              while($row = mysqli_fetch_assoc($result)){
                if($row['post_image']=='../images/'){
                  ?>
                <div class="col-md-6">
                  <a href="single?post=<?=$row['post_id']?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <div class="card mb-3" style="max-width: 100%;">
                      <div class="row no-gutters">
                        <div class="col-md-8">
                          <div class="card-body">
                            <h4 class="card-title"><?=$row['post_title']; ?></h4>
                            <h5 ><p class="card-text"><?=substr($row['post_content'], 0, 200);?></p></h5><br>
                            <p class="card-text"><?=$row['post_date']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <?php }else{ ?>
              <div class="col-md-6">
                  <a href="single?post=<?=$row['post_id']?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <div class="card mb-3" style="max-width: 100%;">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <img src="admin/images/<?=$row['post_image']; ?>" class="card-img" height="100%" alt="...">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h4 class="card-title"><?=$row['post_title']; ?></h4>
                            <h5 ><p class="card-text"><?=substr($row['post_content'], 0, 200);?></p></h5><br>
                            <p class="card-text"><?=$row['post_date']; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            <?php  }
                } 
              }
            ?>
          </div>
        </div>
            <div class="col-md-12 col-lg-3 sidebar">
              <?php include 'includes/sidebar.php'; ?>
              <?php /*include 'includes/category.php';*/ ?>
            </div>
      </div>
    </div>
  </section>
  <?php include 'includes/footer.php';?>
</div>
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>