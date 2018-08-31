<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <?php $this->load->view('carousel');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <!-- Start content -->
    <div class="container marketing">
      <!-- SECTION FILTER
      ================================================== -->  
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12"><h2 class="text-center"><b>GALERI</b></h2></div>
          <div class="col-lg-12 col-md-12 col-sm-12 ">
              <div class="portfolioFilter">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#" data-filter="*" class="current tab-pane">All </a></li>
                    <li><a href="#" data-filter=".fauna" class="tab-pane">Fauna</a></li>
                    <li><a href="#" data-filter=".flora" class="tab-pane">Flora</a></li>
                    <li><a href="#" data-filter=".panorama" class="tab-pane">Panorama</a></li>  
                    <li><a href="#" data-filter=".budaya" class="tab-pane">Budaya</a></li>         
                  </ul>
              </div><br>
          </div>
      </div>
      <div class="row port">
          <div class="portfolioContainer">
            <?php foreach ($galery as $galery) : ?>
              <div class="col-sm-6 col-lg-3 col-md-4 <?php echo $galery->kat_galeri;?>">
                  <div class="gal-detail thumb">
                      <a href="<?php echo base_url('assets/img/gallery/'.$galery->foto_galeri);?>" class="image-popup" title="<?php echo $galery->nama_galeri;?>">
                          <img src="<?php echo base_url('assets/img/gallery/'.$galery->foto_galeri);?>" class="img-thumbnail" alt="Image">
                      </a>
                      <h4><?php echo $galery->nama_galeri;?></h4>
                  </div>
              </div>
            <?php endforeach;?>
          </div>
      </div> <!-- End row -->
      <hr class="featurette-divider">
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>