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
                  <h4 class="modal-title text-center">Konfirmasi Pembayaran</h4>
                </div>
                <?php echo form_open_multipart('welcome/'.$target);?>
                <div class="modal-body">
                    <div class="control-group">
                     <div class="controls">
                        <div class="col-sm-9">
                          <input name="id_reg" type="text" class="form-control" placeholder="Masukkan Kode Konfirmasi Pembayaran Anda" required/>
                        </div>
                        <div class="col-sm-3">
                          <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                        </div>
                      </div>
                    </div>
                    <div class="control-group" style="margin-top: 30px">
                    </div>
                </div>  
                <?php echo form_close();?>          
              </div>
            </div>
        </div>
      </div>
      <hr class="featurette-divider">
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>