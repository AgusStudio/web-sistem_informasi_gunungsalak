<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <?php $this->load->view('carousel');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
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
        <div class="col-md-8"><h2 class="pull-left">Berita</h2></div><div class="col-md-4"><h2 class="pull-left">Berita Lain</h2></div>
        <hr class="featurette-divider">
        <div class="col-md-8"><!--new berita-->
          <div class="row featurette">
            <div class="col-md-12">  
              <div class="box-header with-border">
                <h2 class="lead"><a href="<?php echo base_url('welcome/berita/'.$berita->id_berita.'/'.$berita->judul_berita); ?>"><?php echo $berita->judul_berita;?></a></h2>
                <div class="user-block"><img class="img-circle" width="30" height="30" src="<?php echo base_url('assets/img/'.$berita->foto);?>" alt="User Image"><span class="username"> <a href="#"><?php echo $berita->nama;?></span>
                  <span class="description pull-right"><b>Shared publicly :</b> <?php echo date('d-m-Y H:i', strtotime($berita->tgl_berita));?></span>
                </div>
              </div><br>
              <div class="box-body">
                <div class="col-md-12"><a href="<?php echo base_url('welcome/berita/'.$berita->id_berita.'/'.$berita->judul_berita); ?>"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="<?php echo base_url('assets/img/'.$berita->gambar_berita);?>" alt="Berita Image"></a>
                </div>
                <div class="col-md-12">
                <br>
                <p style="text-align: justify; text-indent: 0.5in;"><?php echo $berita->isi_berita;?></p>
                </div>
              </div>
            </div>
          </div>
        </div><!--/new berita-->
        <div class="col-md-4"><!--new artikel-->
        <?php foreach ($berita_lain as $berita_lain) : ?>
          <div class="row featurette">
            <div class="col-md-12">  
              <div class="col-md-4 pull-left"><a href="<?php echo base_url('welcome/berita/'.$berita_lain->id_berita.'/'.$berita_lain->judul_berita);?>">
              <img class="featurette-image img-responsive center-block" data-src="holder.js/300x300/auto" src="<?php echo base_url('assets/img/'.$berita_lain->gambar_berita);?>" alt="Last Berita Image"></a>
              </div>
              <h2 class="lead"><a href="<?php echo base_url('welcome/berita/'.$berita_lain->id_berita.'/'.$berita_lain->judul_berita);?>"><?php echo $berita_lain->judul_berita;?></a></h2>
            </div>
          </div>
          <hr>
        <?php endforeach;?>
        </div><!--/new berita-->
      </div><!--end New Berita & artikel-->
    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>

    
