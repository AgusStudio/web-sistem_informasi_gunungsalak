<div id="myCarousel2" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php for($i=0; $i<=$count_bp-1; $i++){ if($i==0){ $status = 'active';} ?>
    <li data-target="#myCarousel2" data-slide-to="<?php echo $i;?>" class="<?php echo $status;?>"></li>
  <?php } ?>
  </ol>
  <div class="carousel-inner" role="listbox">
  <?php foreach ($banner_promo as $banner_promo): ?>
    <div class="item <?php echo $banner_promo->status_banner;?>">
      <img src="<?php echo base_url('assets/img/'.$banner_promo->gambar);?>" alt="Slide Image">
      <div class="container">
        <div class="carousel-caption">
          <h1><?php echo $banner_promo->judul;?></h1>
          <p><?php echo $banner_promo->isi;?></p>
          <p><a class="btn btn-lg btn-primary" target="_blank" href="<?php echo $banner_promo->link;?>" role="button"><?php echo $banner_promo->text_button;?></a></p>
        </div>
      </div>
    </div>
  <?php endforeach;?>
  </div>
  <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</div>