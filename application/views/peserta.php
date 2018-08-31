<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <!-- Start content -->
    <div class="container marketing" style="margin-top: 90px">
      <div class="row">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content col-md-12">
            <div class="modal-header">
                <h4 class="modal-title text-center">Form Data Peserta Pendaki Gunung Salak</h4>
            </div>
            <div class="modal-body">
              <form name="pesertaForm" action="<?php echo site_url('welcome/proses_daftar');?>" method="POST">
                <input name="tgl_reg" value="<?php echo $tgl_reg;?>" hidden="hidden" type="text"/> 
                <input name="nama_reg" value="<?php echo $nama_reg;?>" hidden="hidden" type="text"/>
                <input name="masuk" value="<?php echo $masuk;?>" hidden="hidden" type="text"/>
                <input name="tlp_reg" value="<?php echo $tlp_reg;?>" hidden="hidden" type="text"/>
                <input name="tarif" value="<?php echo $tarif;?>" hidden="hidden" type="text"/>
                <input name="email_reg" value="<?php echo $email_reg;?>" hidden="hidden" type="text"/>
                <input name="alamat_reg" value="<?php echo $alamat_reg;?>" hidden="hidden" type="text"/>
                <input name="jml" value="<?php echo $jml;?>" hidden="hidden" type="text"/>
                <input name="keluar" value="<?php echo $keluar;?>" hidden="hidden" type="text"/>
                <input name="id_isi" value="<?php echo $id_isi;?>" hidden="hidden" type="text"/>
                <input name="volume_kuota" value="<?php echo $volume_kuota;?>" hidden="hidden" type="text"/>
                <input name="id_reg" value="<?php echo $autoinc->Auto_increment;?>" hidden="hidden" type="text"/>
                  <?php for($x=1; $x <= $jml; $x++){ ?>
                <div class="panel panel-info">
                  <div class="panel-heading"><?php echo 'Data Peserta Ke-'.$x;?></div>
                  <div class="panel-body">
                    <div class="form-group">
                        <input name="<?php echo 'nama_peserta'.$x;?>" type="text" placeholder="Nama Peserta" class="form-control" required/>    
                    </div>
                    <div class="form-group">          
                        <select name="<?php echo 'kartu_identitas'.$x;?>" class="form-control" required>
                          <option value="">Pilih Jenis Kartu Identitas</option>
                          <option value="SIM">SIM</option>
                          <option value="KTP">KTP</option>
                          <option value="Pasport">Pasport</option>
                          <option value="Kartu Pelajar">Kartu Pelajar</option>
                        </select>
                    </div>
                    <div class="form-group">          
                        <input name="<?php echo 'no_identitas'.$x;?>" type="text" placeholder="No Identitas" class="form-control" required/>  
                    </div>
                    <div class="form-group"> 
                      <input name="<?php echo 'ttl_peserta'.$x;?>" type="text" placeholder="Tempat, Tanggal lahir" class="form-control" required/>
                    </div>
                    <div class="form-group"> 
                        <select name="<?php echo 'jk_peserta'.$x;?>" class="form-control" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <input name="<?php echo 'pekerjaan_peserta'.$x;?>" type="text" placeholder="Pekerjaan" class="form-control" required/>
                    </div>
                    <div class="form-group"> 
                      <input name="<?php echo 'tlp_peserta'.$x;?>" type="text" placeholder="No Telepon" class="form-control" required/>
                    </div>
                    <div class="form-group"> 
                      <input name="<?php echo 'tlp_rumah'.$x;?>" type="text" placeholder="No Telepon Rumah" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <textarea name="<?php echo 'alamat_peserta'.$x;?>" rows="3" placeholder="Alamat" id="textarea" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                      <span class="col-md-6"><input name="<?php echo 'kota'.$x;?>" type="text" placeholder="Kota" class="form-control" required/></span>
                      <span class="col-md-6"><input name="<?php echo 'provinsi'.$x;?>" type="text" placeholder="Provinsi" class="form-control" required/></span>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <div class="form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Pilih Metode Pembayaran</h4>
                    </div>
                    <div class="panel-body">
                      <DIV class="col-md-6">
                        <b><?php echo "Total tagihan Anda untuk ".$jml." orang peserta Rp.".number_format($jml*$harga->tarif,2,',','.'); ?></b><hr/>
                      <input type="radio" name="pay" value="ATM BCA" required> <img width="100" height="50" src="<?php echo base_url('assets/img/payment/bca.jpg');?>"><br/>    
                      <input type="radio" name="pay" value="ATM MANDIRI" required> <img width="100" height="50" src="<?php echo base_url('assets/img/payment/mandiri.jpg');?>"><br/>
                      <input type="radio" name="pay" value="ATM BNI" required> <img width="100" height="50" src="<?php echo base_url('assets/img/payment/bni.png');?>"><br/> 
                      <input type="radio" name="pay" value="DOKU WALLET" required> <img width="100" height="50" src="<?php echo base_url('assets/img/payment/doku.png');?>"><br/>   
                      <input type="radio" name="pay" value="PAYPAL" required> <img width="100" height="50" src="<?php echo base_url('assets/img/payment/paypal.jpg');?>"><br/> 
                      </DIV>
                      <div class="col-md-6">
                        <img width="200" height="150" src="<?php echo base_url('assets/img/payment/compile.png');?>"><br/>
                        <b>Note: <br/>Pastikan Anda menerima email konfirmasi kode pembayaran</b>
                      </div>                      
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Pernyataan</h4>
                    </div>
                    <div class="panel-body" style="overflow: scroll;height: 100px; max-height: 200px;">
                      <p>
                      Dengan ini saya menyetujui
                      atas segala persyaratan dan ketentuan<br>
                      wisata alam Adventurer Gunung Salak bahwa:<br>
                      1. Saya bersedia membayar semua
                      biaya pendaftaran sesuai tarif yang berlaku<br>
                      pada invoice yang dikirim lewat email.<br>
                      2. Saya bersedia mengikuti peraturan yang ada
                      dan apabila saya melanggar<br>
                      saya berseedia menerima sangsi dari pengelola
                      wisata alam Adventurer Gunung Salak.<br>
                      </p>                            
                    </div>
                    <div class="panel-footer">
                      <input name= "agree" type="checkbox" required/> I accept Terms and Conditions
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
      <hr class="featurette-divider">
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>