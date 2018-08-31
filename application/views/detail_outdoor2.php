<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <!-- Start content -->
    <div class="container" style="margin: 100px 0 0 0">
      <div class="row">
        <div class="col-lg-2">
          <div class="row">
              <?php $this->load->view('sidebar');?>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="col-sm-3 text-center">
            <img id="zoom_01" src="<?php echo base_url('assets/img/outdoor_equipment/'.$outdoor->gambar);?>" data-zoom-image="<?php echo base_url('assets/img/outdoor_equipment/'.$outdoor->gambar_besar);?>"/>
            <h3><p class="small">Rp. <?php echo number_format($outdoor->harga_sewa,0,',','.');?> / Day</p><?php echo $outdoor->nama_alat;?></h3>
          </div>
          <div class="col-sm-5">
            <h3>Deskripsi</h3>
            <p><?php echo $outdoor->deskripsi;?></p>
            <hr>
            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo2">Sewa</button>
            <div id="demo2" class="collapse">
                <div class="modal-dialog">
                  <!-- Modal content-->
                    <div class="modal-content col-md-7">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Form Sewa Outdoor Equipment</h4>
                        </div>
                        <div class="modal-body">
                          <form name="sewaForm" action="<?php echo site_url('welcome/proses_sewa');?>" method="POST">
                            <input name="id_alat" type="text" hidden="hidden" value="<?php echo $outdoor->id_alat;?>"/>
                            <input name="harga_sewa" type="text" hidden="hidden" value="<?php echo $outdoor->harga_sewa;?>"/>
                            <input name="filter" type="text" hidden="hidden" value="<?php echo $filter;?>"/>
                            <input name="nama_alat" type="text" hidden="hidden" value="<?php echo $outdoor->nama_alat;?>"/>
                            <div class="form-group">
                              <input required  name="nama" type="text" placeholder="Nama Penanggung Jawab" class="form-control"/>  
                            </div>
                            <div class="form-group">          
                              <select name="kartu_identitas" class="form-control" required>
                                <option value="">Pilih Jenis Kartu Identitas</option>
                                <option value="SIM">SIM</option>
                                <option value="KTP">KTP</option>
                                <option value="Pasport">Pasport</option>
                                <option value="Kartu Pelajar">Kartu Pelajar</option>
                              </select>
                            </div>
                            <div class="form-group">          
                              <input required  name="no_identitas" type="text" placeholder="No Identitas" class="form-control"/>    
                            </div>
                            <div class="form-group"> 
                              <input required  name="no_tlp" type="text" placeholder="NO Telepon" class="form-control"/>
                            </div>
                            <div class="form-group"> 
                              <input required  name="email" type="text" placeholder="Alamat Email" class="form-control"/>
                            </div>
                            <div class="form-group">
                              <textarea name="alamat" rows="3" placeholder="Alamat" id="textarea" class="form-control" required></textarea>
                            </div>
                            <div class="form-group"> 
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input required  placeholder="Tanggal CheckIn" name="cekin_sewa" type="text" class="form-control pull-right" id="datepicker">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">  
                                  <div class="bootstrap-timepicker"><input required name= "jam_cekin" id="timepicker" type="text" class="form-control"/></div>
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                              </div> 
                            </div> 
                            <div class="form-group">             
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input required placeholder="Tanggal CheckOut" name="cekout_sewa" type="text" class="form-control pull-right" id="datepicker2">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">  
                                  <div class="bootstrap-timepicker"><input required  name= "jam_cekout"  id="timepicker2" type="text" class="form-control"/></div>
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                              </div> 
                            </div>
                            <div class="form-group">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Pernyataan</h4>
                                </div>
                                <div class="panel-body" style="overflow: scroll;height: 100px; max-height: 200px;">
                                  <p>
                                  Dengan ini saya menyetujui<br>
                                  atas segala persyaratan dan ketentuan<br>
                                  penyewaan perangkat outdoor pada<br>
                                  Adventurer Gunung Salak bahwa:<br>
                                  1. Saya bersedia membayar semua<br>
                                  biaya sewa sesuai dengan invoice<br>
                                  yang dikirim lewat email.<br>
                                  2. Bila terjadi kehilangan atau<br>
                                  kerusakan pada perangkat outdoor<br>
                                  yang saya sewa, saya bersedia<br>
                                  mengganti rugi sesuai dengan<br>
                                  ketentuan yang sudah ada yaitu<br>
                                  membayar 5 x lipat dari harga sewa<br>
                                  3. Bila saya terlambat mengembalikan<br>
                                  perangkat outdoor sesuai pada jadwal<br>
                                  sewa, maka saya bersedia membayar<br>
                                  denda sebesar Rp.10.000 / jam.
                                  </p>                            
                                </div>
                                <div class="panel-footer">
                                <input required  name= "agree" type="checkbox"> I accept Terms and Conditions
                                </div>
                              </div>
                            </div>
                            <div class="form-group input-group pull-right">
                              <button class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
                            </div>
                          </form>
                        </div>              
                    </div>

                </div>
            </div>
          </div>
          <div class="col-sm-4">
            <h3>Informasi Reservasi Sewa</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Penyewa</th>
                  <th>Ceckin</th>
                  <th>Ceckout</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data_sewa as $data_sewa): ?>
                <tr>
                  <td><?php echo $data_sewa->nama_penyewa;?></td>
                  <td><?php echo $data_sewa->tgl_sewa;?></td>
                  <td><?php echo $data_sewa->tgl_akhir_sewa;?></td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-12 pull-right"></div>
      </div>
      <hr class="featurette-divider">
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>