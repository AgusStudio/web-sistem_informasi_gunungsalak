<div class="row"><!--berita & artikel-->
  <div class="col-md-12">
      <form name="searchForm" class="navbar-form navbar-right" action="<?php echo site_url('welcome/proses_search');?>" onsubmit="return validateSearch()" method="POST">
          <p id="error"></p>
          <div class="form-group">
            <input name="word" type="text" placeholder="Search" class="form-control">
          </div>
          <button type="submit" class="btn btn-success">Search</button>
      </form>
  </div>
  <div class="col-md-7"><h2 class="pull-left">Berita</h2></div><div class="col-md-5"><h2 class="pull-left">Artikel</h2></div>
  <hr class="featurette-divider">
  <div class="col-md-7"><!--new berita-->
  <?php foreach ($berita_baru as $berita_baru) : ?>
    <div class="row featurette">
      <div class="col-md-12">  
        <div class="box-header with-border">
          <h2 class="lead"><a href="<?php echo base_url('welcome/berita/'.$berita_baru->id_berita.'/'.$berita_baru->judul_berita); ?>"><?php echo $berita_baru->judul_berita;?></a></h2>
          <div class="user-block"><img class="img-circle" width="30" height="30" src="<?php echo base_url('assets/img/logo_halimun.png');?>" alt="User Image"><span class="username"> <a href="#"><?php echo $berita_baru->nama;?></a></span>
            <span class="description pull-right"><b>Shared publicly :</b> <?php echo date('d-m-Y H:i', strtotime($berita_baru->tgl_berita));?></span>
          </div>
        </div><br>
        <div class="box-body">
          <div class="col-md-7"><a href="<?php echo base_url('welcome/berita/'.$berita_baru->id_berita.'/'.$berita_baru->judul_berita); ?>"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="<?php echo base_url('assets/img/'.$berita_baru->gambar_berita);?>" alt="Berita Image"></a>
          </div>
          <p style="text-align: justify; text-indent: 0.5in;"><?php echo $this->Model_halimun->limit_words($berita_baru->isi_berita, 30);?>...<a href="<?php echo base_url('welcome/berita/'.$berita_baru->id_berita.'/'.$berita_baru->judul_berita);?>"> Read More</a></p>
        </div>
      </div>
    </div>
    <hr>
  <?php endforeach;?>
  </div><!--/new berita-->
  <div class="col-md-5"><!--new artikel-->
  <?php foreach ($artikel_baru as $artikel_baru) : ?>
    <div class="row featurette">
      <div class="col-md-12"> 
        <div class="box-header with-border">
          <h2 class="lead"><a href="<?php echo base_url('welcome/artikel/'.$artikel_baru->id_artikel.'/'.$artikel_baru->judul_artikel);?>"><?php echo $artikel_baru->judul_artikel;?></a></h2>
          <div class="user-block">
            <img class="img-circle" width="30" height="30" src="<?php echo base_url('assets/img/logo_halimun.png');?>" alt="User Image">
            <span class="username"> <a href="#"> <?php echo $artikel_baru->nama;?></a></span>
            <span class="description pull-right"><b>Shared publicly :</b> <?php echo date('d-m-Y H:i', strtotime($artikel_baru->tgl_artikel));?></span>
          </div>
        </div><br>
        <div class="box-body">
          <div class="col-md-8"><a href="<?php echo base_url('welcome/artikel/'.$artikel_baru->id_artikel.'/'.$artikel_baru->judul_artikel);?>"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="<?php echo base_url('assets/img/'.$artikel_baru->gambar_artikel1);?>" alt="Artikel Image"></a>
          </div>
          <p style="text-align: justify; text-indent: 0.5in;"><?php echo $this->Model_halimun->limit_words($artikel_baru->isi_artikel, 30);?>...<a href="<?php echo base_url('welcome/artikel/'.$artikel_baru->id_artikel.'/'.$artikel_baru->judul_artikel);?>"> Read More</a></p>
        </div>
      </div>
    </div>
    <hr >
  <?php endforeach;?>
  </div><!--/new berita-->
</div><!--end New Berita & artikel-->
<div class="row"><!--last berita & artikel-->
  <div class="col-md-6"><h2 class="pull-left">Berita Lainnya</h2></div><div class="col-md-6"><h2 class="pull-right">Artikel Lainnya</h2></div>
  <hr class="featurette-divider">
  <div class="col-md-6 pull-left"><!--last berita-->
  <?php foreach ($berita_lama as $berita_lama) : ?>
    <div class="row featurette">
      <div class="col-md-12">  
        <div class="col-md-4 pull-left"><a href="<?php echo base_url('welcome/berita/'.$berita_lama->id_berita.'/'.$berita_lama->judul_berita);?>">
        <img class="featurette-image img-responsive center-block" data-src="holder.js/300x300/auto" src="<?php echo base_url('assets/img/'.$berita_lama->gambar_berita);?>" alt="Last Berita Image"></a>
        </div>
        <h2 class="lead"><a href="<?php echo base_url('welcome/berita/'.$berita_lama->id_berita.'/'.$berita_lama->judul_berita);?>"><?php echo $berita_lama->judul_berita;?></a></h2>
      </div>
    </div>
    <hr>
  <?php endforeach;?>
  </div><!--/last berita-->
  <div class="col-md-6 pull-right"><!--last artikel-->
  <?php foreach ($artikel_lama as $artikel_lama) : ?>
    <div class="row featurette">
      <div class="col-md-12"> 
        <div class="col-md-4 pull-right"><a href="<?php echo base_url('welcome/artikel/'.$artikel_lama->id_artikel.'/'.$artikel_lama->judul_artikel);?>">
        <img class="featurette-image img-responsive center-block" data-src="holder.js/300x300/auto" src="<?php echo base_url('assets/img/'.$artikel_lama->gambar_artikel1);?>"  alt="Generic placeholder image"></a>
        </div>
        <h2 class="lead"><a href="<?php echo base_url('welcome/artikel/'.$artikel_lama->id_artikel.'/'.$artikel_lama->judul_artikel);?>"><?php echo $artikel_lama->judul_artikel;?></a></h2>
      </div>
    </div>
    <hr>
  <?php endforeach;?>
  </div><!--/last berita-->
</div><!--end last berita & artikel-->