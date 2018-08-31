<?php $this->load->view('header');?>
<body>
<div role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body text-center"">
            <h2><?php echo $word;?></h2>
            <a href="<?php echo site_url($action);?>"><button class="btn btn-large btn-primary" type="button">Ok</button></a><br>
        </div>             
    </div>
</div>
</div>
<?php $this->load->view('endhtml');?>