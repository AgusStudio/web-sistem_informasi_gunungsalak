<?php $this->load->view('admin/header');?>
<body> 
    <!-- Begin page -->
    <div id="wrapper"> 
        <!-- Top Bar Start -->
        <?php $this->load->view('admin/top_menu');?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php $this->load->view('admin/sidebar');?>
        <!-- Left Sidebar End -->  
		<div class="content-page"><!-- Start content -->
            <div class="content">
                <div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ol class="breadcrumb pull-right">
								<li><a href="<?php echo base_url('admin');?>">Home</a></li>
								<li class="active">Kuota</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Kuota Pendakian Gn. Salak</h3> 
                                </div> 
                                <div class="panel-body table-rep-plugin"> 
                                    <div class="panel-body table-responsive" data-pattern="priority-columns">

                                        <table id="datatable" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th data-priority="1">Tanggal</th>
                                                    <?php foreach ($pintu as $pintu3): ?>
                                                    <th data-priority="3"><?php echo $pintu3->nama_pintu;?></th>
                                                    <?php endforeach;?>
                                                    <th class="text-center" data-priority="3"><button class="btn btn-primary waves-effect waves-light" title="Tambah Kuota" data-toggle="modal" data-target="#addModal">Tambah</button></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach ($kuota as $kuota): ?>
                                                <tr>
                                                    <th><?php echo $no++;?></th>
                                                    <td><?php echo $this->Model_halimun->konversi_hari($kuota->tgl_kuota,date('d-m-Y', strtotime($kuota->tgl_kuota))); ?></td>
                                                    <?php $tj = 'pintu_masuk'; $fj = 'pintu_masuk.id_pintu=isi_kuota.pintu_masuk'; $isi_kuota = $this->Model_halimun->data_join($tj,$fj,'isi_kuota.id_kuota',$kuota->id_kuota,'isi_kuota')->result();
                                                    foreach ($isi_kuota as $isi): ?>
                                                    <td><?php if($isi->status_isi==1){ echo "Tutup";}else{ echo $isi->volume_kuota;} ?></td>
                                                    <?php endforeach; ?>
                                                    <td class="actions">
                                                        <a href="<?php echo base_url('admin/editkuota/'.$kuota->id_kuota);?>" class="on-default edit-row m-r-5"><i class="fa fa-pencil"></i> Edit</a>
                                                        <a href="<?php echo base_url('admin/tutupkuota/'.$kuota->id_kuota);?>" class="on-default edit-row m-r-5" onclick="return confirm('Apakah Anda yakin ingin menutup kuota?')"><i class="fa fa-times"></i>Tutup</a>
                                                    </td>
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
                            <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <?php echo form_open_multipart('admin/edit_kuota');?>
                                         <table class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>                                                  
                                                    <th data-priority="1">Tanggal</th>
                                                    <?php foreach ($pintu as $pintu2): ?>
                                                    <th data-priority="3"><?php echo $pintu2->nama_pintu;?></th>
                                                    <?php endforeach;?>
                                                    <th class="text-center" data-priority="3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input name="tgl" type="text" value="<?php echo date('d-m-Y', strtotime($kuota_edit->tgl_kuota));?>" id="datepicker2" class="form-control" required/><input name="id_kuota" value="<?php echo $kuota_edit->id_kuota;?>" type="text" hidden='hidden'/></td>
                                                    <?php $tj = 'pintu_masuk'; $fj = 'pintu_masuk.id_pintu=isi_kuota.pintu_masuk'; $isi_kuota2 = $this->Model_halimun->data_join($tj,$fj,'isi_kuota.id_kuota',$kuota_edit->id_kuota,'isi_kuota')->result();
                                                    foreach ($isi_kuota2 as $isi2): ?>
                                                    <td><input name="<?php echo 'kuota'.$isi2->id_isi;?>" <?php if($isi2->volume_kuota==0){ echo "hidden='hidden';";}else{  echo "class='form-control'"; echo "required";} ?> type="number" value="<?php echo $isi2->volume_kuota; ?>"/> <input name="<?php echo 'id_pintu'.$isi2->id_isi;?>" type="number" hidden="hidden" value="<?php echo $isi2->id_pintu;?>" /><input name="id_isi[]" type="number" hidden="hidden" value="<?php echo $isi2->id_isi;?>" /></td>
                                                    <?php endforeach; ?>
                                                    <td class="Action"><button title="Save" class="btn small-btn btn-warning waves-effect waves-light"><i class="fa fa-save"></i></button></td>
                                                </tr>           
                                            </tbody>
                                        </table>
                                    <?php echo form_close();?>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                        <div class="col-md-12">
                            <!-- sample modal content -->  
                            <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <?php echo form_open_multipart('admin/add_kuota');?>
                                        <table class="table table-small-font table-bordered table-striped">
                                           <thead>
                                                <tr>                                                  
                                                    <th data-priority="1">Tanggal</th>
                                                    <?php foreach ($pintu as $pintu1): ?>
                                                    <th data-priority="3"><?php echo $pintu1->nama_pintu;?></th>
                                                    <?php endforeach;?>
                                                    <th class="text-center" data-priority="3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>  
                                                     <td><input name="tgl" type="text" id="datepicker" placeholder="Date" class="form-control" required/><input name="id_kuota" value="<?php echo $autoinc->Auto_increment;?>" type="text" hidden='hidden'/></td>
                                                    <?php foreach ($pintu as $pintu): ?>
                                                    <td><input <?php if($pintu->status_pintu==0){ echo "hidden='hidden'";}else{ echo "class='form-control'"; echo "required";} ?> name="<?php echo 'kuota'.$pintu->id_pintu;?>" type="number" /> <input name="id_pintu[]" type="number" hidden="hidden" value="<?php echo $pintu->id_pintu;?>" /></td>
                                                    <?php endforeach; ?>
                                                    <td class="Action"><button title="Save" class="btn small-btn btn-warning waves-effect waves-light"><i class="fa fa-save"></i></button></td>
                                                </tr>       
                                            </tbody>
                                        </table>
                                    <?php echo form_close();?>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>     
					</div>
				</div><!-- /container -->
			</div><!-- /contain -->
           
		</div><!-- End Right content here -->	
        <div style="margin-left:250px">
        <?php $this->load->view('footer');?>
        </div>
    </div><!-- END wrapper -->
<?php $this->load->view('admin/endhtml');?>