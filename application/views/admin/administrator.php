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
								<li class="active">Daftar Administrator</li>
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
                                            <th data-priority="1">NIK</th>
                                            <th data-priority="1">Nama</th>
                                            <th data-priority="3">Jabatan</th>
                                            <th data-priority="1">Foto</th>
                                            <th data-priority="3">Username</th>
                                            <th data-priority="3">Hak Akses</th>
                                            <th class="text-center" data-priority="3"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> class="btn btn-primary waves-effect waves-light" title="Tambah Admin" data-toggle="modal" data-target="#addModal">Tambah</button></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($adm as $adm): ?>
                                            <tr class="active">
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $adm->nik;?></td>
                                                <td><?php echo $adm->nama;?></td>
                                                <td><?php echo $adm->jabatan; ?></td>
                                                <td><a href="<?php echo base_url('assets/img/user/'.$adm->foto);?>"><img src="<?php echo base_url('assets/img/user/'.$adm->foto);?>" width="50px" alt="Image" class="img-thumbnail"/></a></td>
                                                <td><?php echo $adm->username;?></td>
                                                <td><?php echo $adm->hak_akses;?></td>
                                                <td class="text-center"><span class="col-md-6"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> title="Edit Admin" class="btn small-btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal" onclick="javascript:
                                                document.getElementById('nik').value = document.getElementById('nik2').value= '<?php echo $adm->nik;?>';
                                                document.getElementById('nama').value= '<?php echo $adm->nama;?>';
                                                document.getElementById('jabatan').value= '<?php echo $adm->jabatan;?>';
                                                document.getElementById('username').value= '<?php echo $adm->username;?>';
                                                document.getElementById('hak_akses').value= '<?php echo $adm->hak_akses;?>';
                                                document.getElementById('foto').src= '<?php echo base_url('assets/img/user/'.$adm->foto);?>';"><i class="fa fa-pencil"></i></button></span><span class="col-md-6"><a href="<?php echo site_url('admin/del_admin/'.$adm->nik);?>"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> title="Hapus Admin" class="btn small-btn btn-warning waves-effect waves-light" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i></button></a></span></td>
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
                                            <h4 class="modal-title text-center" id="myModalLabel">Management Administrator</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('admin/edit_admin');?>
                                                <div class="form-group">
                                                    <input name="nik2" id="nik2" type="text" placeholder="NIK" class="form-control" disabled />
                                                    <input name="nik" id="nik" type="text" hidden="hidden"/>
                                                </div> 
                                                <div class="form-group">
                                                    <input name="nama" id="nama" type="text" placeholder="Nama" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="jabatan" id="jabatan" type="text" placeholder="Jabatan" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="username" id="username" type="text" placeholder="Username" class="form-control" disabled="" />
                                                </div> 
                                                <div class="form-group">
                                                    <select name="hak_akses" id="hak_akses" class="form-control" required>
                                                        <option value="">Pilih Hak Akses</option>
                                                        <option value="Super Admin">Super Admin</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Kepala Desa">Kepala Desa</option>  
                                                    </select>
                                                </div>  
                                                <div class="form-group text-center">
                                                    <img name="image" width="200px" class="img-thumbnail" id="foto" alt="Image"/>
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
                                            <h4 class="modal-title text-center" id="myModalLabel">Management Administrator</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('admin/add_admin');?>
                                                <div class="form-group">
                                                    <input name="nik" type="text" placeholder="NIK" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="nama" type="text" placeholder="Nama" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="jabatan" type="text" placeholder="Jabatan" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="username" type="text" placeholder="Username" class="form-control" required />
                                                </div> 
                                                <div class="form-group">
                                                    <input name="pass" type="password" placeholder="Password" class="form-control" required />
                                                </div><p id="err_pass"></p>
                                                <div class="form-group">
                                                    <input name="co_pass" type="password" placeholder="Konfirmasi Password" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <select name="hak_akses" required class="form-control">
                                                        <option value="">Pilih Hak Akses</option>
                                                        <option value="Super Admin">Super Admin</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Kepala Desa">Kepala Desa</option>  
                                                    </select>
                                                </div>  
                                                <div class="form-group text-center">
                                                    <img name="image" class="img-thumbnail" id="preview" alt="Image"/>
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