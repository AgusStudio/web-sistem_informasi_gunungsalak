<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <?php $this->load->view('carousel');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <!-- Start content -->
    <div class="container marketing">
    <!-- Start content -->
      <div class="row">
        <div class="col-md-8 pull-left">
          <h2 class="lead">Kontak Kami</h2>
          <h3><b>Adventurer Gunung Salak</b></h3>
          <h4>
          <b><span class="fa fa-phone-square"></span> :</b> 0881-181-123<br><br>
          <b><span class="fa fa-envelope-square"></span> :</b> adventurer.gnsalak@gmail.com<br><br>
          <b>Office:</b> Jl. Raya Cipanas, Kec. Kabandungan,<br> Malasari, Nanggung, Sukabumi,<br> Jawa Barat 43368, Indonesia
          </h4>
        </div>
        <div class="col-md-4">
          <h2 class="lead">Komentar</h2>
          <?php echo form_open_multipart('welcome/komentar');?>
          <fieldset>
            <div class="form-group">
                <input name="nama" type="text" placeholder="name" class="form-control" required/>    
            </div>
            <div class="form-group">          
                <input name="email" type="email" placeholder="email" class="form-control" required/>    
            </div>
            <div class="form-group"> 
                <input name="subject" type="text" placeholder="subject" class="form-control" required/>
            </div>
            <div class="form-group">
                <textarea name="pesan" rows="3" placeholder="Isi Pesan" id="textarea" class="form-control" required></textarea>
            </div>
                <button class="btn btn-large btn-primary" type="submit">Send Messages</button>
          </fieldset>
          <?php echo form_close();?>
        </div>
      </div>
      <hr class="featurette-divider">
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>