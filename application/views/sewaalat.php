<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
<div class="wrapper" style="margin: 100px 0 0 0">
  <?php $this->load->view('sidebar_alat');?>
  <div class="container marketing">
    <div class="row">
      <div class="col-lg-12">
        <div class="panel-body">
          <?php if($data->num_rows() > 0)
          { foreach($data->result() as $key=>$row){ ?>
              <div class="col-sm-6 col-lg-3 col-md-4">
                  <div class="gal-detail thumb">
                      <a href="<?php echo site_url('welcome/detail_outdoor/'.$row->filter.'/'.$row->id_alat.'/'.$row->nama_alat);?>">
                          <img src="<?php echo base_url('assets/img/outdoor_equipment/'.$row->gambar);?>" class="img-thumbnail" alt="work-thumbnail">
                      </a>
                      <h4 class="text-center"><p class="small">Rp. <?php echo number_format($row->harga_sewa,0,',','.');?> / Day</p><?php echo $row->nama_alat;?></h4>
                  </div><br>
              </div>
            <?php } ?>
        </div>
      </div>
      <div class="col-lg-12 text-center"><?php echo $paging; }?></div>
    </div>
    <hr class="featurette-divider">
    <!-- FOOTER -->
    <?php $this->load->view('footer');?>
  </div>
</div>
<?php $this->load->view('endhtml');?>    