<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <!-- Start content -->
    <div class="container marketing" style="margin-top: 90px">
      <div class="row">
        <div class="col-md-12">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center">Informasi Reservasi Kuota Pendakian Gunung Salak<br/>Tarif Per Orang Rp.5000,00*</h4>
                </div>
                <div class="modal-body table-responsive" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table table-small-font table-bordered table-striped" >
                    <thead>
                      <tr>
                        <th rowspan="2" class="text-center">Tanggal</th>
                        <th  colspan="<?php echo $jml_pintu;?>" class="text-center">Pintu Masuk</th>  
                      </tr>
                      <tr>
                        <?php foreach ($pintu as $pintu): ?>
                          <th data-priority="3"><?php echo $pintu->nama_pintu;?></th>
                        <?php endforeach;?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if($c_kuota==0){ ?>
                      <tr><td colspan="5"> Jadwal tidak tersedia </td></tr>
                    <?php }else{  foreach ($kuota as $kuota): ?>
                      <tr>
                        <td style="cursor:pointer"><?php echo $this->Model_halimun->konversi_hari($kuota->tgl_kuota,date('d-m-Y', strtotime($kuota->tgl_kuota))); ?></td>
                        <?php $tj = 'pintu_masuk'; $fj = 'pintu_masuk.id_pintu=isi_kuota.pintu_masuk'; $isi_kuota = $this->Model_halimun->data_join($tj,$fj,'isi_kuota.id_kuota',$kuota->id_kuota,'isi_kuota')->result();
                        foreach ($isi_kuota as $isi): ?>
                          <td class="text-center" style="cursor:pointer" <?php if($isi->status_isi==1 || $isi->volume_kuota==0 || $kuota->tgl_kuota< date('Y-m-d')){ ?> title="Daftar pendakian melalui jalur <?php echo $isi->nama_pintu;?>, Ditutup"<?php }else{ ?> title="Daftar pendakian melalui jalur <?php echo $isi->nama_pintu;?>, tanggal: <?php echo date('d F Y',strtotime($kuota->tgl_kuota));?>" data-toggle="modal" data-target="#regModal" onclick="javascript:
                          formReg.tgl_reg.value= '<?php echo date('m/d/Y',strtotime($kuota->tgl_kuota));?>';
                          formReg.tgl_reg2.value= '<?php echo $kuota->tgl_kuota;?>';
                          formReg.id_isi.value= '<?php echo $isi->id_isi;?>';
                          formReg.volume_kuota.value= '<?php echo $isi->volume_kuota;?>';
                          formReg.tgl_reg.disabled = 'disabled';
                          formReg.masuk.value= formReg.masuk2.value= '<?php echo $isi->nama_pintu;?>';
                          formReg.masuk.disabled = 'disabled';
                          formReg.tarif.value= '<?php echo $harga->tarif; ?>';" <?php }?> >
                        <?php if($isi->status_isi==1 || $isi->volume_kuota==0 || $kuota->tgl_kuota< date('Y-m-d')){ echo "Tutup";}else{ echo $isi->volume_kuota;} ?></td>
                        <?php endforeach; ?>      
                      </tr>  
                    <?php endforeach; } ?>         
                    </tbody>
                  </table>
                </div>              
              </div>
            </div>
        </div>
        <div class="col-md-12">
          <div id="regModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="'disabled'">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center" id="myModalLabel">Form Pendaftaran Pendakian Gunung Salak</h4>
                </div>
                <div class="modal-body">
                  <form name="formReg" class="form-horizontal" action="<?php echo site_url('welcome/peserta');?>" method="POST">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanggal</label>
                      <div class="col-sm-9">
                        <input name="tgl_reg" type="text" id="datepicker" class="form-control" placeholder="Tanggal">
                        <input name="tgl_reg2" type="text" hidden="hidden">
                        <input name="tarif" type="text" hidden="hidden">
                        <input name="id_isi" type="text" hidden="hidden">
                        <input name="volume_kuota" type="text" hidden="hidden">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Masuk</label>
                      <div class="col-sm-9">
                        <input name="masuk" type="text" class="form-control" placeholder="Tanggal">
                        <input name="masuk2" type="text" hidden="hidden">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Keluar</label>
                      <div class="col-sm-9">
                        <select name="keluar" class="form-control" required >
                          <option value="">Pilih Jalur Keluar</option>
                          <option value="Pasir Rengit">Pasir Rengit</option>
                          <option value="Cimelati">Cimelati</option>
                          <option value="Cidahu">Cidahu</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Organisasi</label>
                      <div class="col-sm-9">
                        <input name="nama_reg" type="text" class="form-control" placeholder="Nama Organisasi/Penanggung Jawab" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Telepon</label>
                      <div class="col-sm-9">
                        <input name="tlp_reg" type="text" class="form-control" placeholder="Telepon" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Email</label>
                      <div class="col-sm-9">
                        <input name="email_reg" type="email" class="form-control" placeholder="Email" required />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea name="alamat_reg" type="textarea" class="form-control" placeholder="Alamat" required ></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jumlah Peserta</label>
                      <div class="col-sm-9">
                        <select name="jml" class="form-control" required>
                          <option value=""> Pilih Jumlah Peserta </option>
                          <?php for ($i=1; $i<=50; $i++) { ?>
                          <option value="<?php echo $i;?>"> <?php echo $i;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group m-b-0">
                      <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
        </div>
      </div>
      <hr class="featurette-divider">
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>