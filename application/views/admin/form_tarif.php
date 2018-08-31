<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center">Pemesanan Gunung Salak</h4>
          </div>
          <div class="modal-body">
            <form name="daftarForm" action="<?php echo site_url('welcome');?>" method="POST">
            <fieldset>
              <div class="form-group">
                  <input name="nama" type="text" placeholder="Nama Penanggung Jawab" class="form-control" required />    
              </div>
              <div class="form-group">          
                  <input name="ktp" type="text" placeholder="No KTP" class="form-control" required/>   
              </div>
              <div class="form-group"> 
                  <input name="no_tlp" type="text" placeholder="NO Telepon" class="form-control" required/>
              </div>
              <div class="form-group"> 
                  <input name="email" type="email" placeholder="Alamat Email" class="form-control" required/>
              </div>
              <div class="form-group">
                  <textarea name="alamat" rows="3" placeholder="Alamat" id="textarea" class="form-control" required></textarea>
              </div>
              <div class="form-group"> 
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input placeholder="Tanggal CheckIn" name="cekin_daftar" type="text" class="form-control pull-right" id="datepicker" required>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">  
                    <div class="bootstrap-timepicker"><input name= "jam_cekin" id="timepicker" type="text" class="form-control" required/></div>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div> 
              </div>
              <div class="form-group">
                  <select name="jml" placeholder="Jumlah Peserta" class="form-control" required >
                  <option value=""> Pilih Jumlah Peserta </option>
                  </select>
                  <p id="err_jml"></p>
              </div>
                  <button class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
            </fieldset>
            </form>
          </div>              
      </div>
  </div>
</div>