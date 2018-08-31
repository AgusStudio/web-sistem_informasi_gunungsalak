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
								<li class="active">Informasi</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Daftar Informasi</h3> 
                                </div> 
                                <div class="panel-body table-rep-plugin"> 
                                    <div class="panel-body table-responsive" data-pattern="priority-columns">
                                        <table id="datatable" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th data-priority="1">Judul</th>
                                                <th data-priority="3">Isi</th>
                                                <th data-priority="1">Gambar</th>
                                                <th data-priority="3">Tgl Posting</th>
                                                <th class="text-center" data-priority="4"><button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addModal">
                                                Tambah</button></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach ($informasi as $informasi): ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $informasi->judul_info;?></td>
                                                    <td data-priority="3"><?php echo $this->Model_halimun->limit_words($informasi->isi_info, 10);?>...</td>
                                                    <td><a href="<?php if($informasi->gambar_info==""){ echo "#";}else{ echo base_url('assets/img/info/'.$informasi->gambar_info);}?>"><img class="img-thumbnail col-md-6" alt="Image" src="<?php echo base_url('assets/img/info/'.$informasi->gambar_info);?>"/></a></td>
                                                    <td class="text-center"><?php if($informasi->status_info == 1){ echo $this->Model_halimun->konversi_hari($informasi->tgl_post,date('d-m-Y H:i', strtotime($informasi->tgl_post))); }else{ ?> <a href="<?php echo site_url('admin/publ_informasi/'.$informasi->id_info);?>"><button title="Publish informasi" class="btn small-btn btn-warning waves-effect waves-light" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-send"></i></button></a><?php } ?></td>
                                                    <td class="text-center" data-priority="4"><span class="col-md-6"><a href="<?php echo site_url('admin/editinformasi/'.$informasi->id_info.'/'.$informasi->judul_info);?>"><button title="Edit informasi" class="btn small-btn btn-success waves-effect waves-light">
                                                    <i class="fa fa-pencil"></i></button></a></span><span class="col-md-6"><a href="<?php echo site_url('admin/del_informasi/'.$informasi->id_info);?>"><button title="Hapus informasi" class="btn small-btn btn-warning waves-effect waves-light" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i></button></a></span></td>
                                                </tr>
                                            <?php endforeach;?>         
                                            </tbody>
                                        </table>
                                    </div>  
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- sample modal content -->  
                            <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Form informasi</h4>
                                        </div>
                                        <div class="modal-body">
                                           <?php echo form_open_multipart('admin/add_informasi');?>
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="add_btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
                                                </div>
                                                <div class="form-group">
                                                    <input name="add_judul" type="text" placeholder="Judul informasi" class="form-control" required />
                                                    <input name="autoinc" value="<?php echo $autoinc->Auto_increment;?>" hidden="hidden" type="text"/>
                                                </div>     
                                                <div class="form-group text-center">
                                                    <img name="add_image" class="img-thumbnail" id="preview2" src="" alt="Image"/>
                                                </div>
                                                <div class='form-group'>
                                                    <textarea name='add_isi' class='wysihtml5 form-control' placeholder="Isi informasi" style='height: 200px'></textarea>
                                                </div>
                                                <div class="form-group"> 
                                                    <input name="userfile" type="file" placeholder="Browse Image" onchange="tampilkanPreview(this,'preview2')">
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