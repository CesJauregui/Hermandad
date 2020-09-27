<?php include 'includes/header.php'; ?>
<div class="wrap">
<?php include 'includes/navigation.php'; ?>
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
        <div class="col-md-12 col-lg-8 main-content">
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
                $post_id=$row['post_id'];
                $post_title=$row['post_title'];
                $category=$row['post_category'];
                $category_id=$row['post_category_id'];
                $status=$row['post_status'];
                $post_image=$row['post_image'];
                $content=$row['post_content'];
                $date=$row['post_date'];
                $view=$row['post_views'];
                if($post_image=='../images/'){
                  ?>
                <div class="col-md-6">
                <a href="single.php?post=<?php echo $post_id?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                  <div class="blog-content-body">
                    <div class="post-meta">
                      <span class="author mr-2"><?php echo $category; ?></span>&bullet;
                      <span class="mr-2"><?php echo $date; ?></span>
                    </div>
                    <h2><?php echo $post_title; ?></h2>
                  </div>
                </a>
              </div>
                <?php }else{ ?>
              <div class="col-md-6">
                <a href="single.php?post=<?php echo $post_id?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                  <img src="admin/images/<?php echo $post_image; ?>" alt="Image placeholder" width="400px" height="250px" >
                  <div class="blog-content-body">
                    <div class="post-meta">
                      <span class="author mr-2"><?php echo $category; ?></span>&bullet;
                      <span class="mr-2"><?php echo $date; ?></span>
                    </div>
                    <h2><?php echo $post_title; ?></h2>
                  </div>
                </a>
              </div>
            <?php  }
                } 
              }
            ?>
          </div>
        </div>
            <div class="col-md-12 col-lg-4 sidebar">
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