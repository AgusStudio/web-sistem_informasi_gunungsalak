<?php $this->load->view('admin/header');?>
<body> 
    <!-- Begin page -->
    <div id="wrapper"> 
        <?php $this->load->view('admin/top_menu');?>
        <?php $this->load->view('admin/sidebar');?>
        <!-- Left Sidebar End -->  
		<div class="content-page"><!-- Start content -->
            <div class="content">
                <div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="<?php echo base_url('admin');?>">Home</a></li>
								<li class="active">Galeri</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12"><h2 class="text-center"><b>GALERI</b></h2></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <div class="portfolioFilter">
                              <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#" data-filter="*" class="current tab-pane">All </a></li>
                                <li><a href="#" data-filter=".fauna" class="tab-pane">Fauna</a></li>
                                <li><a href="#" data-filter=".flora" class="tab-pane">Flora</a></li>
                                <li><a href="#" data-filter=".panorama" class="tab-pane">Panorama</a></li>
                                <li><a href="#" data-filter=".budaya" class="tab-pane">Budaya</a></li> 
                              </ul>
                            </div><br>
                        </div>
                    </div>
                    <div class="row port">
                        <div class="portfolioContainer">
                            <?php foreach ($galery as $galery) : ?>
                            <div class="col-sm-6 col-lg-3 col-md-4 <?php echo $galery->kat_galeri;?>">
                                <div class="gal-detail thumb">
                                    <span><button title="Edit Galeri" type="button" class="close" data-toggle="modal" data-target="#myModal" onclick="javascript:
                        document.getElementById('preview').src= '<?php echo base_url('assets/img/gallery/'.$galery->foto_galeri);?>';
                        document.getElementById('nama_galeri').value= '<?php echo $galery->nama_galeri;?>';
                        document.getElementById('kat_galeri').value= '<?php echo $galery->kat_galeri;?>';
                        document.getElementById('id_galeri').value= '<?php echo $galery->id_galeri;?>';
                        " > <i class="fa fa-pencil"></i></button></span><span><button title="Tambah Galeri" type="button" class="close" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></button></span>
                                    <a href="<?php echo base_url('assets/img/gallery/'.$galery->foto_galeri);?>" class="image-popup" title="Screenshot-1">
                                        <img src="<?php echo base_url('assets/img/gallery/'.$galery->foto_galeri);?>" class="img-thumbnail" alt="work-thumbnail">
                                    </a>
                                    <h4><?php echo $galery->nama_galeri;?></h4>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div> <!-- End row -->
                    <div clas="row">
                        <div class="col-md-12">
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Galeri Manage</h4>
                                        </div>
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('admin/edit_galeri');?>
                                                <div class="form-group text-center">
                                                    <img name="image" class="img-thumbnail" id="preview" alt="Image"/>
                                                </div>
                                                <div class="form-group">
                                                    <input name="nama" id="nama_galeri" type="text" placeholder="Nama Galeri" class="form-control" required />
                                                    <input name="id_galeri" id="id_galeri" hidden="hidden" type="text"/>
                                                </div>  
                                                 <div class="form-group">
                                                    <select name="kategori" required id="kat_galeri" class="form-control">
                                                        <option value="">Pilih Kategori Galeri</option>
                                                        <option value="flora">Flora</option>
                                                        <option value="fauna">Fauna</option>
                                                        <option value="panorama">Panorama</option>
                                                        <option value="budaya">Budaya</option>
                                                    </select>
                                                </div>  
                                                <div class="form-group"> 
                                                    <input name="userfile" type="file" placeholder="Browse Image" onchange="tampilkanPreview(this,'preview')">
                                                </div>
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="add_btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
                                                </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                        <div class="col-md-12">
                            <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Galeri Manage</h4>
                                        </div>
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('admin/add_galeri');?>
                                                <div class="form-group text-center">
                                                    <img name="image" class="img-thumbnail" id="preview2" alt="Image"/>
                                                </div>
                                                <div class="form-group">
                                                    <input name="nama" type="text" placeholder="Nama Galeri" class="form-control" required />
                                                     <input name="autoinc" value="<?php echo $autoinc->Auto_increment;?>" hidden="hidden" type="text"/>
                                                </div>  
                                                <div class="form-group">
                                                    <select name="kategori" required class="form-control">
                                                        <option value="">Pilih Kategori Galeri</option>
                                                        <option value="flora">Flora</option>
                                                        <option value="fauna">Fauna</option>
                                                        <option value="panorama">Panorama</option>
                                                        <option value="budaya">Budaya</option>
                                                    </select>
                                                </div>  
                                                <div class="form-group"> 
                                                    <input name="userfile" type="file" placeholder="Browse Image" onchange="tampilkanPreview(this,'preview2')">
                                                </div>
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="add_btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
                                                </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
				</div><!-- /container -->
			</div><!-- /contain -->
		</div><!-- End Right content here -->
		<?php $this->load->view('footer');?>
    </div><!-- END wrapper -->
<?php $this->load->view('admin/endhtml');?>