
<div id="banner" class="carousel slide carousel-fade" data-ride="carousel">
   <!--1260x750-->
    <div class="carousel-inner banner bg-overlay">
	 <?php 
        $sql = mysqli_query($conexion,"SELECT * FROM banner LIMIT 6");
        $setActive = 0;
        $slideHtml = '';
        while($row = mysqli_fetch_assoc($sql)){
            $activeClass = "";
                if(!$setActive){
                  $setActive = 1;
                  $activeClass = 'active';
                }
        $slideHtml.= "<div class='carousel-item " . $activeClass."' data-interval='1000'>";
        $slideHtml.= "<img src='admin/img-banner/".$row['imagen']."' class='w-100' alt='...'>";
        $slideHtml.= "<div class='carousel-caption banner-text'>
                        <h2><span>Hermandad Santos Varones Cargadores del Santo Sepulcro San José de Canta</span></h2>
                      </div>";
        $slideHtml.= "</div>";
        }   
        echo $slideHtml;
     ?>          
        </div>
        <a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#banner" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
      </div>
