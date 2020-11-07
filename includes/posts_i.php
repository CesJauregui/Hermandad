<div class="row">
  <div class="content-wrapper">
  <?php 
    $sql = mysqli_query($conexion,"SELECT* FROM posts where post_status='publicado' ORDER BY post_id DESC");
      while($row = mysqli_fetch_assoc($sql)){
        $id= $row['post_id'];
        $titulo=$row['post_title'];
        $content = $row['post_content'] ;
        $img = $row['post_image'];
        $date = $row['post_date'];
  ?>
    <div class="news-card">
      <a href="single.php?post=<?php echo $id;?>" class="news-card-card-link"></a>
        <img src="admin/images/<?php echo $img; ?>" alt="" class="news-card-image">
          <div class="news-card-text-wrapper">
            <h2 class="news-card-title"><?php echo $titulo;?></h2>
              <div class="news-card-post-date"><?php echo $date; ?></div>
                <div class="news-card-details-wrapper">
                  <a href="single.php?post=<?php echo $id;?>" class="news-card-read-more">Leer <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
              </div>
          </div>
    <?php }?>
  </div>
</div>
