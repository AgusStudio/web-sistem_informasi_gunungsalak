<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <?php $this->load->view('carousel');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row"><!--artikel & artikel-->
        <div class="col-md-12">
            <form name="searchForm" class="navbar-form navbar-right" action="<?php echo site_url('welcome/proses_search');?>" onsubmit="return validateSearch()" method="POST">
                <p id="error"></p>
                <div class="form-group">
                  <input name="word" type="text" placeholder="Search" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
        <div class="col-md-8"><h2 class="pull-left">Artikel</h2></div><div class="col-md-4"><h2 class="pull-right">Artikel Lain</h2></div>
        <hr class="featurette-divider">
        <div class="col-md-8"><!--new artikel-->
          <div class="row featurette">
            <div class="col-md-12">  
              <div class="box-header with-border">
                <h2 class="lead"><a href="<?php echo base_url('welcome/artikel/'.$artikel->id_artikel.'/'.$artikel->judul_artikel); ?>"><?php echo $artikel->judul_artikel;?></a></h2>
                <div class="user-block"><img class="img-circle" width="30" height="30" src="<?php echo base_url('assets/img/logo_halimun.png');?>" alt="User Image"><span class="username"> <a href="#"><?php echo $artikel->nama;?></span>
                  <span class="description pull-right"><b>Shared publicly</b> - 7:30 PM Today</span>
                </div>
              </div><br>
              <div class="box-body">
                <div class="col-md-12"><a href="<?php echo base_url('welcome/artikel/'.$artikel->id_artikel.'/'.$artikel->judul_artikel); ?>"><img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="<?php echo base_url('assets/img/'.$artikel->gambar_artikel1);?>" alt="artikel Image"></a>
                </div>
                <div class="col-md-12">
                <br>
                <p style="text-align: justify; text-indent: 0.5in;"><?php echo $artikel->isi_artikel;?></p>
                </div>
              </div>
            </div>
          </div>
        </div><!--/new artikel-->
        <div class="col-md-4"><!--new artikel-->
        <?php foreach ($artikel_lain as $artikel_lain) : ?>
          <div class="row featurette">
            <div class="col-md-12">  
              <div class="col-md-4 pull-left"><a href="<?php echo base_url('welcome/artikel/'.$artikel_lain->id_artikel.'/'.$artikel_lain->judul_artikel);?>">
              <img class="featurette-image img-responsive center-block" data-src="holder.js/300x300/auto" src="<?php echo base_url('assets/img/'.$artikel_lain->gambar_artikel1);?>" alt="Last artikel Image"></a>
              </div>
              <h2 class="lead"><a href="<?php echo base_url('welcome/artikel/'.$artikel_lain->id_artikel.'/'.$artikel_lain->judul_artikel);?>"><?php echo $artikel_lain->judul_artikel;?></a></h2>
            </div>
          </div>
          <hr>
        <?php endforeach;?>
        </div><!--/new artikel-->
      </div><!--end New artikel & artikel-->
    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>