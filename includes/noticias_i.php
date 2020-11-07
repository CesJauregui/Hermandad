<?php 
$sql = mysqli_query($conexion,"SELECT * FROM posts WHERE post_status='publicado'AND type_post='noticia' ORDER BY post_id DESC");
while ($row = mysqli_fetch_assoc($sql)){
?>
<div class="col-md-6">
    <a href="single?post=<?=$row['post_id'];?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
      <div class="card mb-3" style="max-width: 100%;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="admin/images/<?=$row['post_image']; ?>" class="card-img" height="200px" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title"><?=$row['post_title'];?></h4>
              <h5 ><p class="card-text"><?=substr($row['post_content'], 0, 200);?></p></h5><br>
              <p class="card-text"><small><?=$row['post_date'];?></small></p>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
<?php }?>

