<div class="col-lg-12 col-md-12 col-sm-12 ">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="<?php echo site_url('welcome/sewaalat');?>">All </a></li>
        <?php foreach ($sidemenu as $sidemenu) : ?>
        <li><a href="<?php echo site_url('welcome/kategori/'.$sidemenu->filter);?>"><?php echo $sidemenu->nama_kategori;?></a></li>
        <?php endforeach;?>       
      </ul>
</div>
