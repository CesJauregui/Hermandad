<?php 
  $sql = mysqli_query($conexion,"SELECT * FROM titulo_navbar ORDER BY id_navbar DESC");
  $tab_menu = '';
  $tab_content = '';
  $count = 0;
  while ($row = mysqli_fetch_array($sql)){
    if ($count==0) {
      $tab_menu.= '
        <li class="nav-item"><a href="#programa'.$row["id_navbar"].'" class="nav-link active" role="presentation" data-toggle="tab">'.$row["titulo"].'</a></li>
      ';
      $tab_content.='
        <div id="programa'.$row["id_navbar"].'" class="tab-pane fade show active">
      ';
    }else{
      $tab_menu.='
        <li class="nav-item"><a href="#programa'.$row["id_navbar"].'" class="nav-link" role="presentation" data-toggle="tab">'.$row["titulo"].'</a></li>
      ';
      $tab_content.='
        <div id="programa'.$row["id_navbar"].'" class="tab-pane fade">
      ';
    }
    $tab_content.='<div class="tz-gallery"><div class="row">';
    $img_query = mysqli_query($conexion,"SELECT * FROM galeria WHERE idprogram = '".$row["id_navbar"]."'");
    while($sub_row = mysqli_fetch_array($img_query)){
      $tab_content.='
          <div class="col-md-3" style="margin:34px 0;">
            <a class="lightbox" href="admin/images-program/'.$sub_row["imagen"].'">
            <img src="admin/images-program/'.$sub_row["imagen"].'" height="200px">
            </a>
          </div>   
      ';
    }
    $tab_content.='</div></div><div style="clear:both"></div></div>';
    $count++;
  }
?>

  <ul class="nav nav-tabs">
    <?php echo $tab_menu; ?>
  </ul>

  <div class="tab-content">
    <?php echo $tab_content; ?>
  </div>
 <script>
    baguetteBox.run('.tz-gallery');
    $("#img_gal").toggle(true).prop('required', true);
</script>
