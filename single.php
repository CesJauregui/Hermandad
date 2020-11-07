<?php include 'includes/header.php'; ?>
  <div class="wrap">
<?php include 'includes/navigation.php'; ?>
<?php include 'includes/banner.php'; ?>
    <section class="site-section py-lg">
      <div class="container">
        <div class="row blog-entries element-animate">
          <div class="col-md-12 col-lg-9 main-content">
            <div class="col-md-12 col-lg-9 main-content">
              <?php
              $id_post = $_GET['post'];
              $sql = mysqli_query($conexion,"SELECT * FROM posts WHERE post_id = '$id_post'");
              $row= mysqli_fetch_assoc($sql);
              ?>
              <div class="post-meta">
                &bullet; <span class="mr-2"><?= $row['post_date'];?></span> 
              </div>
              <h1 class="mb-4"><?= $row['post_title'];?></h1>
              <a class="category mb-5" href="#"><?= $row['post_category'];?></a> 
              <div class="card card-body-single" >
                <div class="card-body card-body-single">
                  <div class="list-group" id="list-tab" role="tablist">
                    <div class="row">
                      <div class="col-md-12">
                        <?=$row['post_content'];?>
                      </div>
                    </div><br>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END main-content -->
          <div class="col-md-12 col-lg-3 sidebar">
              <div class="sidebar-item">
                <div class="make-me-sticky">
                  <?php include 'includes/sidebar.php'; ?>
                </div>
              </div>
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