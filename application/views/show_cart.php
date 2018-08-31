<?php $this->load->view('header');?>
<body>
  <?php $this->load->view('top_menu');?>
  <div class="wrapper" style="margin: 100px 0 0 0">
    <?php $this->load->view('sidebar_alat');?>
    <div class="container marketing">
      <div class="row">
        <div class="col-lg-12">
          <div class="panel-body">
            <h3>  RENT CART [ <small><?php echo $this->cart->total_items();?> Item(s) </small>]<a href="<?php echo site_url('welcome/destroy_cart');?>" class="btn btn-large pull-right"><i class=""></i> Kosongkan Keranjang </a></h3> 
            <hr class="soft"/>
            <table class="table">
              <thead class="table-bordered">
                <tr>
                  <th class="table-bordered">Nama</th>
                  <th class="table-bordered">Quantity</th>
                  <th class="table-bordered">Price</th>
                  <th class="table-bordered">Total</th>
                </tr>
              </thead>
              <tbody class="table-bordered">
              <?php foreach ($this->cart->contents() as $produk): ?>
                <tr>
                  <td class="table-bordered"><?php echo $produk['name'];?></td>
                  <td class="table-bordered"><?php echo $produk['qty'];?></td>
                  <td class="table-bordered"><?php echo number_format($produk['price'],0,',','.');?></td>
                  <td class="table-bordered"><?php echo number_format($produk['subtotal'],0,',','.');?></td>
                </tr>
              <?php endforeach;?>
              </tbody>
              <tfoot>
                <tr>
                  <td></td><td></td>
                  <td class="table-bordered" style="text-align:right;">Total Price: </td>
                  <td class="table-bordered" style="display:block"> <?php echo number_format($this->cart->total(),0,',','.');?></td>
                </tr>
              </tfoot>
            </table>  
            <a href="<?php echo base_url('welcome/sewaalat');?>" class="btn btn-info"> Continue Rent </a>
            <a href="#" <?php if($this->cart->total_items()==0){ echo "disabled='disabled'"; }else{ echo "data-toggle='modal' data-target='#demo2'"; } ?> class="btn btn-success pull-right">Next</a>
          </div>
        </div>
        <div class="col-md-12">
          <div id="demo2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Form Sewa Outdoor Equipment</h4>
                </div>
                <div class="modal-body">
                  <form name="sewaForm" action="<?php echo site_url('welcome/proses_sewa');?>" method="POST">
                    <?php $x=1; foreach ($this->cart->contents() as $produk): ?>
                    <input name="<?php echo 'id_alat'.$x++;?>" hidden='hidden' type="text"  value="<?php echo $produk['id'];?>"/>
                    <?php endforeach;?>
                    <?php $z=1; foreach ($this->cart->contents() as $produk): ?>
                    <input name="<?php echo 'harga_sewa'.$z++;?>" hidden='hidden' type="text"  value="<?php echo $produk['price'];?>"/>
                    <?php endforeach;?>
                    <?php $y=1; foreach ($this->cart->contents() as $produk): ?>
                    <input name="<?php echo 'qty_sewa'.$y++;?>" hidden='hidden' type="text"  value="<?php echo $produk['qty'];?>"/>
                    <?php endforeach;?>
                    <input name="total" hidden='hidden' type="text"  value="<?php echo $this->cart->total();?>"/>
                    <div class="form-group">
                      <input required  name="nama" type="text" placeholder="Nama Penanggung Jawab" class="form-control"/>
                      <input name="id_sewa" type="text" hidden='hidden' value="<?php echo $autoinc->Auto_increment;?>" /> 
                      <input name="jml_cart" type="text" hidden='hidden' value="<?php echo $this->cart->total_items();?>" /> 
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
                            <h4 class="panel-title">Pilih Metode Pembayaran</h4>
                        </div>
                        <div class="panel-body">
                          <DIV class="col-md-6">
                            <b><?php echo "Total tagihan Anda Rp.".number_format($this->cart->total(),0,',','.'); ?></b><hr/>
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
                    <div class="form-group input-group">
                      <button class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
                    </div>
                  </form>
                </div>              
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