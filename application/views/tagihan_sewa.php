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
                    <h4>KODE SEWA : <strong><?php echo "ADV/RENT/".$invoice->id_sewa;?></strong></h4>
                </div>
            </div>
            <hr>
            <div class="m-h-50"></div>
            <hr>
              <div class="row">
                  <div class="col-md-12">
                      
                      <div class="pull-left m-t-30">
                          <address>
                            <strong><?php echo $invoice->nama_penyewa;?></strong><br>
                            <?php echo $invoice->alamat;?><br>
                            <?php echo $invoice->email;?><br>
                            <?php echo $invoice->kartu_identitas.': '.$invoice->no_identitas;?><br/>
                            <abbr title="Phone">P:</abbr> <?php echo $invoice->tlp;?>
                            </address>
                      </div>
                      <div class="pull-right m-t-30">
                          <p><strong>Tanggal Checkin : </strong> <?php echo $this->Model_halimun->konversi_hari($invoice->tgl_sewa,date('d-m-Y', strtotime($invoice->tgl_sewa))).' '.date('H:i', strtotime($invoice->jam_cekin));?> </p>
                          <p class="m-t-10"><strong>Tanggal Checkout : </strong> <span> <?php echo $this->Model_halimun->konversi_hari($invoice->tgl_akhir_sewa,date('d-m-Y', strtotime($invoice->tgl_akhir_sewa))).' '.date('H:i', strtotime($invoice->jam_cekout));?></span></p>
                      </div>
                  </div>
              </div>
              <div class="m-h-50"></div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table m-t-30">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Kode Unit</th>
                                  <th>Nama Unit</th>
                                  <th>Qty</th>
                                  <th>Price Rent</th>
                                  <th>Sub Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $no=1; foreach ($alat as $alat): ?>
                                  <tr>
                                      <td><?php echo $no++;?></td>
                                      <td><?php echo "ADV-".$alat->id_alat;?></td>
                                      <td><?php echo $alat->nama_alat;?></td>
                                      <td><?php echo $alat->qty;?></td>
                                      <td><?php echo "Rp.".number_format($alat->harga_unit_sewa,2,',','.');?></td>
                                      <td><?php echo "Rp.".number_format($alat->harga_unit_sewa*$alat->qty,2,',','.');?></td>
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
                      <h3 class="text-right"><b>Total : </b><?php echo " Rp.".number_format($invoice->total_bayar,2,',','.');?></h3>
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