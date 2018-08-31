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
								<li class="active">Daftar Banner</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
                    <div class="row">
                        <div class="panel panel-default m-t-20">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Main Banner</h3> 
                            </div>
                            <div class="panel-body">
                            <?php $this->load->view('carousel');?>
                            </div>
                        </div>
                        <div class="panel panel-default m-t-20">
                            <div class="panel-heading"> 
                                <h3 class="panel-title">Promo Banner</h3> 
                            </div>
                            <div class="panel-body">
                                <?php $this->load->view('carousel_promo');?>
                            </div>
                        </div>
                        <div class="panel panel-default m-t-20">
                            <div class="panel-body">
                                <div class="panel-body table-responsive" data-pattern="priority-columns">
                                    <table id="datatable" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th data-priority="1">Nama</th>
                                            <th data-priority="3">Text Contain</th>
                                            <th data-priority="1">Gambar</th>
                                            <th data-priority="3">Text Button</th>
                                            <th data-priority="3">Status Banner</th>
                                            <th data-priority="3">Kategori</th>
                                            <th class="text-center" data-priority="3"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> class="btn btn-primary waves-effect waves-light" title="Tambah Banner" data-toggle="modal" data-target="#addModal">Tambah</button></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($banner as $banner): ?>
                                            <tr class="active">
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $banner->judul;?></td>
                                                <td><?php echo $banner->isi;?></td>
                                                <td><img src="<?php echo base_url('assets/img/'.$banner->gambar);?>" class="img-thumbnail" alt="Image"/></td>
                                                <td><?php echo $banner->text_button;?></td>
                                                <td data-priority="6"><?php echo $banner->status_banner;?>
                                                <td><?php if($banner->kat_banner==1){ echo "Main Banner";}else{ echo "Promo Banner";}?></td>
                                                <td class="text-center"><span class="col-md-6"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> title="Edit Banner" class="btn small-btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal" onclick="javascript:
                                                document.getElementById('preview2').src= '<?php echo base_url('assets/img/'.$banner->gambar);?>';
                                                document.getElementById('id_banner').value = '<?php echo $banner->id_banner;?>';
                                                document.getElementById('nama').value= '<?php echo $banner->judul;?>';
                                                document.getElementById('txt_contain').value= '<?php echo $banner->isi;?>';
                                                document.getElementById('txt_btn').value= '<?php echo $banner->text_button;?>';
                                                document.getElementById('kat_banner').value= '<?php echo $banner->kat_banner;?>';"><i class="fa fa-pencil"></i></button></span><span class="col-md-6"><a href="<?php echo site_url('admin/del_banner/'.$banner->id_banner);?>"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> title="Hapus Banner" class="btn small-btn btn-warning waves-effect waves-light" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i></button></a></span></td>
                                            </tr>
                                        <?php endforeach;?>         
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- panel body -->
                        </div> <!-- panel -->
                        <div class="col-md-12">
                            <!-- sample modal content -->  
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Management Banner</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('admin/edit_banner');?>
                                                <div class="form-group text-center">
                                                    <img name="image" class="img-thumbnail" id="preview2" alt="Image"/>
                                                </div>
                                                    <input name="id_banner" id="id_banner" type="text" hidden="hidden"/>
                                                <div class="form-group">
                                                    <input name="nama" id="nama" type="text" placeholder="Nama" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="txt_contain" id="txt_contain" type="text" placeholder="Text Pada Contain Banner" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="txt_btn" id="txt_btn" type="text" placeholder="Text pada Button" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <select name="kat" id="kat_banner" class="form-control" required>
                                                        <option value="">Pilih Kategori Banner </option>
                                                        <option value="1">Main Banner</option>
                                                        <option value="2">Promo Banner</option>
                                                    </select>
                                                </div>
                                                <div class="form-group"> 
                                                    <input name="userfile" type="file" placeholder="Browse Image" onchange="tampilkanPreview(this,'preview2')" />
                                                </div>
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
                                                </div>
                                            <?php echo form_close();?>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                        <div class="col-md-12">
                            <!-- sample modal content -->  
                            <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Management Banner</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('admin/add_banner');?>
                                                <div class="form-group text-center">
                                                    <img name="image" class="img-thumbnail" id="preview" alt="Image"/>
                                                </div>
                                                <div class="form-group">
                                                    <input name="add_nama" type="text" placeholder="Nama" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="add_txt_contain" type="text" placeholder="Text Pada Contain Banner" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="add_txt_btn" type="text" placeholder="Text pada Button" class="form-control" required />
                                                </div>  
                                                <div class="form-group">
                                                    <select name="add_kat" class="form-control" required>
                                                        <option value="">Pilih Kategori Banner </option>
                                                        <option value="1">Main Banner</option>
                                                        <option value="2">Promo Banner</option>
                                                    </select>
                                                </div>
                                                <div class="form-group"> 
                                                    <input name="userfile" type="file" placeholder="Browse Image" onchange="tampilkanPreview(this,'preview')" />
                                                </div>
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
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