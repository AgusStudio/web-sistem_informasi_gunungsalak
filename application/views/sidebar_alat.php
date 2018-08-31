<div class="slimscrollleft" navbar-default" role="navigation">
  <div class="container">
    <div class="pull-right" style="margin-top: 5px">
      <a href="<?php echo site_url('welcome/cart');?>"><span class="btn small-btn btn-primary"><i class="fa fa-cart-plus icon-white"></i> [ <?php echo $this->cart->total_items();?> ] Rent</span> </a> 
    </div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
        <label class="label label-info"><i class="fa fa-bars"></i></label>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('welcome/sewaalat');?>">All </a>
    </div>
    <div id="navbar2" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <?php foreach ($sidemenu as $sidemenu) : ?>
          <li><a href="<?php echo site_url('welcome/kategori/'.$sidemenu->filter);?>"><?php echo $sidemenu->nama_kategori;?></a></li>
        <?php endforeach;?>
      </ul>
    </div>
  </div>
</div>