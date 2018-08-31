<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
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
        <div class="col-md-6"><h2 class="pull-left">Berita</h2></div><div class="col-md-6"><h2 class="pull-right">Artikel</h2></div>
        <hr class="featurette-divider">
        <div class="col-md-6 pull-left"><!--last berita-->
        <?php echo $berita_kosong; foreach ($berita as $berita) : ?>
          <div class="row featurette">
            <div class="col-md-12">  
              <div class="col-md-4 pull-left">
              <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="<?php echo base_url('assets/img/'.$berita->gambar_berita);?>" alt="Last Berita Image">
              </div>
              <h2 class="lead"><?php echo $berita->judul_berita;?></h2>
            </div>
          </div>
          <hr>
        <?php endforeach;?>
        </div><!--/last berita-->
        <div class="col-md-6 pull-right"><!--last artikel-->
        <?php echo $artikel_kosong; foreach ($artikel as $artikel) : ?>
          <div class="row featurette">
            <div class="col-md-12"> 
              <div class="col-md-4 pull-right">
              <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="<?php echo base_url('assets/img/'.$artikel->gambar_artikel1);?>"  alt="Generic placeholder image">
              </div>
              <h2 class="lead"><?php echo $artikel->judul_artikel;?></h2>
            </div>
          </div>
          <hr>
        <?php endforeach;?>
        </div><!--/last berita-->
      </div><!--end last berita & artikel-->
    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>