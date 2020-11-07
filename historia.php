<?php include 'includes/header.php'; ?>
    <div class="wrap">
<?php include 'includes/navigation.php'; ?>
<?php include 'includes/banner.php'; ?>
      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4 titl text-center">Reseña Histórica </h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-9 main-content">
              <div class="card card-body-single" >
                <div class="card-body card-body-single">
                  <div class="list-group" id="list-tab" role="tablist">
                    <div class="row">
                      <div class="col-md-12">
                        <?php
                          $sql = mysqli_query($conexion, "SELECT * FROM historia");
                          $row = mysqli_fetch_assoc($sql); 
                          echo $row['descripcion'];
                        ?>
                      </div>
                    </div><br>
                  </div>
                </div>
              </div>
            </div>
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
