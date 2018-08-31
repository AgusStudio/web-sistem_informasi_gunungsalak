<?php $this->load->view('header');?>
<body>
  <?php $this->load->view('top_menu');?>
  <div class="wrapper" style="margin: 100px 0 0 0">
    <?php $this->load->view('sidebar_alat');?>
    <div class="container marketing">
      <div class="row">
        <div class="col-lg-12">
         <div class="panel-body">
          <div class="col-sm-3 text-center">
            <img id="zoom_01" src="<?php echo base_url('assets/img/outdoor_equipment/'.$outdoor->gambar);?>" data-zoom-image="<?php echo base_url('assets/img/outdoor_equipment/'.$outdoor->gambar_besar);?>"/>
            <h3><p class="small">Rp. <?php echo number_format($outdoor->harga_sewa,0,',','.');?> / Day</p><?php echo $outdoor->nama_alat;?></h3>
          </div>
          <div class="col-sm-5">
            <h3>Deskripsi</h3>
            <p><?php echo $outdoor->deskripsi;?></p>
            <hr>
           <form action="<?php echo site_url('welcome/add_to_cartdetail/'.$a.'/'.$b.'/'.$c);?>" class="form-horizontal qtyFrm">
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn btn-large btn-primary"> Add to cart <i class=" icon-shopping-cart"></i></button>
              </div>
            </div>
          </form>
          </div>
          <div class="col-sm-4">
            <h3>Informasi Reservasi Sewa</h3>
            <div>
              <form name="sewaForm" action="<?php echo site_url('welcome/detail_outdoor/'.$a.'/'.$b.'/'.$c);?>" method="POST">
                <div class="form-group"> 
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input required  placeholder="Tanggal CheckIn" name="cekin_sewa" type="text" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
                <div class="form-group input-group pull-right">
                  <button name="btnCek" value="1" class="btn btn-large btn-primary pull-right" type="submit">Cek Reservasi</button>
                </div>
              </form>
              </div>
              <div class="col-md-12"><label class="label label-info"><?php echo $kosong;?></label></div>
              <div> 
                <table class="table table-striped">
                  <tbody>                 
                  <?php foreach ($hasil as $hasil): ?>
                    <tr>
                      <td><?php if($hasil->nama_penyewa!=""){ echo "<label class='label label-info'>Rented</label>"; } ;?></td>
                      <td><?php echo date('d/m/Y',strtotime($hasil->tgl_sewa)).' '.date('H:i',strtotime($hasil->jam_cekin));?></td>
                      <td><?php echo date('d/m/Y',strtotime($hasil->tgl_akhir_sewa)).' '.date('H:i',strtotime($hasil->jam_cekout));?></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
        </div>
      </div>
      <hr class="featurette-divider">
    <!-- FOOTER -->
    <?php $this->load->view('footer');?>
    </div>
</div>
<?php $this->load->view('endhtml');?>