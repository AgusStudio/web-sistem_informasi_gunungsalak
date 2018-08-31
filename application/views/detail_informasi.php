<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <?php $this->load->view('carousel');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <div class="row"><!--informasi & artikel-->
        <div class="col-md-12">
            <form name="searchForm" class="navbar-form navbar-right" action="<?php echo site_url('welcome/proses_search');?>" onsubmit="return validateSearch()" method="POST">
                <p id="error"></p>
                <div class="form-group">
                  <input name="word" type="text" placeholder="Search" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form>
        </div>
        <div class="col-md-12">
          <div class="col-md-7"><h2 class="pull-left">Informasi</h2><hr class="featurette-divider"></div><div class="col-md-4 pull-right"><h2 class="pull-left">Agenda</h2><hr class="featurette-divider"></div>
        </div>
        <div class="col-md-12">
          <div class="col-md-7"><!--new informasi-->
            <div class="row featurette">
              <div class="col-md-12">  
                <div class="box-header with-border">
                  <h2 class="lead"><a href="<?php echo base_url('welcome/detail_informasi/'.$info->id_info.'/'.$info->kategori.'/'.$info->judul_info); ?>"><?php echo $info->judul_info;?></a></h2>
                  <div class="user-block">
                    <div class="description pull-left"><b>Shared publicly :</b> <?php echo date('d-m-Y H:i', strtotime($info->tgl_post));?></div>
                  </div>
                </div><br>
                <div class="box-body">
                  <div class="col-md-3"><a href="<?php echo base_url('welcome/detail_informasi/'.$info->id_info.'/'.$info->kategori.'/'.$info->judul_info); ?>"><a href="<?php echo base_url('assets/img/info/'.$info->gambar_info);?>"><img class="featurette-image img-responsive center-block" data-src="holder.js/200x200/auto" src="<?php echo base_url('assets/img/info/'.$info->gambar_info);?>" alt="informasi Image"></a>
                  </div>
                  <p style="text-align: justify; text-indent: 0.5in;"><?php echo $info->isi_info;?></p>
                </div>
              </div>
            </div>
            <hr>
          </div>
          <!--/new informasi-->
          <div class="col-md-4 pull-right"><!--new artikel-->
            <div class="row featurette">
              <div class="col-md-12 pull-left"> 
              <?php foreach ($agenda as $agenda): ?>
                <h2 class="lead"><a href="<?php echo base_url('welcome/detail_informasi/'.$agenda->id_info.'/'.$agenda->kategori.'/'.$agenda->judul_info);?>"><?php echo $agenda->judul_info;?></a></h2>
                <div><span><i class="fa fa-calendar"></i></span> <?php echo $agenda->tgl_agenda;?></div><hr>
              <?php endforeach;?>
              </div>
            </div> 
          </div>
        </div>
      </div>
    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>

    
