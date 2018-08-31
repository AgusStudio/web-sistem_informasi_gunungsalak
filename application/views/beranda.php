<?php $this->load->view('header');?>
<body>
    <?php $this->load->view('top_menu');?>
    <?php $this->load->view('carousel');?>
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
    <div class="container marketing">
      <!-- Three columns of text below the carousel -->
      <?php $this->load->view('berita_artikel');?>
      <!-- Carousel
    ================================================== -->
      <?php $this->load->view('carousel_promo');?>
      <h1><center>Peta MT Gunung Salak</center></h1><br>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d507192.2994287085!2d106.45356762878018!3d-6.716057495144639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cdfcdfbede69%3A0xa301d1cba53c79fa!2sMt+Salak!5e0!3m2!1sen!2sid!4v1498034373605" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <hr class="featurette-divider">
    <!-- /END THE FEATURETTES -->
    <!-- FOOTER -->
<?php $this->load->view('footer');?>
<?php $this->load->view('endhtml');?>

    
