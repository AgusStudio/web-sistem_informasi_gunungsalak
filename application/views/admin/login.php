<?php $this->load->view('header');?>
<body>
<div class="wrapper" style="margin-top: 40px">
    <div class="container">
        <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading text-center"> 
                    <img class="img-circle" width="100" height="100" src="<?php echo base_url('assets/img/logo gunung salak.png');?>"><h4 class="m-t-10 text-white"><strong> Adventurer Gunung Salak</strong></h4>
                </div> 
                <div class="panel-body">
                <form class="form-horizontal m-t-20" action="<?php echo $action;?>" method="post">        
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input name="username" class="form-control input-lg " type="text" placeholder="Username" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="password" class="form-control input-lg" type="password" required="" placeholder="Password" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary pull-left input-lg">
                                <input id="checkbox-signup" type="checkbox"> Remember me
                            </div>           
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button name="submit" value="1" class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <p class="text-danger text-center"><?php echo $err;?></p>
                </form> 
                </div>                                 
            </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>
<?php $this->load->view('endhtml');?>