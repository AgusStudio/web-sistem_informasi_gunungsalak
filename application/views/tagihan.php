<?php $this->load->view('header');?>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <!-- <div class="panel-heading">
              <h4>Invoice</h4>
          </div> -->
          <div class="panel-body">
            <div class="clearfix">
                <div class="pull-left">
                    <h4 class="text-left"><img width="50px" src="<?php echo base_url('assets/img/logo_halimun.png');?>" alt="Adventurer Gn. Salak" class="thumb-md"></h4><strong>Adventurer Gunung Salak</strong>          
                </div>
                <div class="pull-right">
                    <h4>KODE REG : <strong><?php echo "ADV/REG/".$invoice->id_reg;?></strong></h4>
                </div>
            </div>
            <hr>
            <div class="m-h-50"></div>
            <hr>
              <div class="row">
                  <div class="col-md-12">
                      
                      <div class="pull-left m-t-30">
                          <address>
                            <strong><?php echo $invoice->nama_reg;?></strong><br>
                            <?php echo $invoice->alamat_reg;?><br>
                            <?php echo $invoice->email_reg;?><br>
                            <abbr title="Phone">P:</abbr> <?php echo $invoice->tlp_reg;?>
                            </address>
                      </div>
                      <div class="pull-right m-t-30">
                          <p><strong>Tanggal Masuk: </strong> <?php echo $this->Model_halimun->konversi_hari($invoice->tgl_invoice,date('d-m-Y', strtotime($invoice->tgl_masuk)));?></p>
                          <p class="m-t-10"><strong>Pintu Masuk: </strong> <span> <?php echo $invoice->pintu_masuk;?></span></p>
                          <p class="m-t-10"><strong>Pintu Keluar: </strong> <span> <?php echo $invoice->pintu_keluar;?></span></p>
                      </div>
                  </div>
              </div>
              <div class="m-h-50"></div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table m-t-30">
                              <thead>
                                  <tr><th>#</th>
                                  <th>Nama</th>
                                  <th>Kartu Identitas</th>
                                  <th>No Identitas</th>
                                  <th>Jumlah Orang</th>
                                  <th>Unit Cost</th>
                              </tr></thead>
                              <tbody>
                                <?php $no=1; foreach ($peserta as $peserta): ?>
                                  <tr>
                                      <td><?php echo $no++;?></td>
                                      <td><?php echo $peserta->nama_peserta;?></td>
                                      <td><?php echo $peserta->kartu_identitas;?></td>
                                      <td><?php echo $peserta->no_identitas;?></td>
                                      <td><?php echo $invoice->jml_peserta;?></td>
                                      <td><?php echo "Rp.".number_format($invoice->tarif_per_orang,2,',','.');?></td>
                                  </tr>
                                <?php endforeach;?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="row" style="border-radius: 0px;">
                  <div class="col-md-3 col-md-offset-9">
                      <hr>
                      <h3 class="text-right"><b>Total : </b><?php echo " Rp.".number_format($invoice->tarif_per_orang*$invoice->jml_peserta,2,',','.');?></h3>
                  </div>
              </div>                                              
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<?php $this->load->view('endhtml');?>