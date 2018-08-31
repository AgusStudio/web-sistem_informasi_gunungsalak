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
								<li class="active">Pintu Masuk</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
                    <div class="row"> 
                        <div class="panel panel-default m-t-20">
                            <div class="panel-body">
                                <div class="panel-body table-responsive" data-pattern="priority-columns">
                                    <table id="datatable" class="table table-small-font table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th data-priority="1">Pintu Masuk</th>
                                            <th data-priority="3">Status</th>
                                            <th class="text-center" data-priority="3"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> class="btn btn-primary waves-effect waves-light" title="Tambah Admin" data-toggle="modal" data-target="#addModal">Tambah</button></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($pintu as $pintu): ?>
                                            <tr class="active">
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $pintu->nama_pintu;?></td>
                                                <td><?php if($pintu->status_pintu==1){ echo "Buka";}else{ echo "Tutup";} ?></td>
                                                <td class="text-center"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> title="Edit Admin" class="btn small-btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal" onclick="javascript:
                                                document.getElementById('id').value= '<?php echo $pintu->id_pintu;?>';
                                                document.getElementById('nama').value= '<?php echo $pintu->nama_pintu;?>';
                                                document.getElementById('status').value= '<?php echo $pintu->status_pintu;?>';"><i class="fa fa-pencil"></i> Edit</button></td>
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
                                            <h4 class="modal-title text-center" id="myModalLabel">Konfigurasi Pintu Masuk</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('admin/edit_pintu');?>
                                                <div class="form-group">
                                                    <input name="id" id="id" type="text" hidden="hidden"/>
                                                </div> 
                                                <div class="form-group">
                                                    <input name="nama" id="nama" type="text" placeholder="Nama Pintu Masuk" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <select name="status" id="status" class="form-control" required>
                                                        <option value="">Pilih Status Pintu Masuk</option>
                                                        <option value="1">Buka</option>
                                                        <option value="0">Tutup</option> 
                                                    </select>
                                                </div>  
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="btn" class="btn btn-large btn-primary pull-right" type="submit">Simpan</button>
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
                                            <h4 class="modal-title text-center" id="myModalLabel">Konfigurasi Pintu Masuk</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('admin/add_pintu');?> 
                                                <div class="form-group">
                                                    <input name="nama" type="text" placeholder="Nama Pintu Masuk" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <select name="status" class="form-control" required>
                                                        <option value="">Pilih Status Pintu Masuk</option>
                                                        <option value="1">Buka</option>
                                                        <option value="0">Tutup</option> 
                                                    </select>
                                                </div>  
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="btn" class="btn btn-large btn-primary pull-right" type="submit">Simpan</button>
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