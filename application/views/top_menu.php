<div class="navbar-wrapper">
  <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">Adventurer GS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?php echo $beranda;?>" ><a href="<?php echo base_url();?>">Beranda</a></li>
            <li class="<?php echo $tentang;?>" ><a href="<?php echo base_url('welcome/tentang');?>">Tentang</a></li>
            <li class="<?php echo $informasi;?>" ><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Informasi <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('welcome/informasi/berita_dan_artikel');?>">Berita & Artikel</a></li>
                <li><a href="<?php echo base_url('welcome/informasi/jalur_pendakian');?>">Jalur Pendakian</a></li>
              </ul>
            </li>
            <li class="<?php echo $galeri;?>" ><a href="<?php echo base_url('welcome/galeri');?>">Galeri</a></li>
            <li class="<?php echo $kontak;?>" ><a href="<?php echo base_url('welcome/kontak');?>">Kontak</a></li>
            <li class="<?php echo $pemesanan;?>" class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemesanan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a data-toggle="modal" data-target="#Reservasi">Pendakian</a></li>
                <li><a href="<?php echo base_url('welcome/sewaalat');?>">Sewa Outdoor Equipment</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="col-md-12">
  <div id="Reservasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center" id="myModalLabel">Info & Jadwal Reservasi</h4>
        </div>
        <div class="modal-body">
          <form name="formReservasi" class="form-horizontal" action="<?php echo site_url('welcome/pendakian');?>" method="POST">
            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal</label>
              <div class="col-sm-6">
                <input name="tgl" type="text" id="datepicker" class="form-control" placeholder="Pilih Tanggal Reservasi">
              </div>
              <div class="col-sm-3">
                <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>