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
								<li class="active">Dashboard</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
					<div class="row">
                        <div class="col-md-12"><h4 class="pull-left page-title">Hello <?php echo $nama;?>, Selamat datang di Adventurer Gunung Salak.</h4></div>  
                    </div>
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Daftar Tarif Wisata Adventurer Gn. Salak</h3> 
                                </div> 
                                <div class="panel-body table-rep-plugin"> 
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Kode Tarif</th>
                                                    <th data-priority="1">Jenis Wisata</th>
                                                    <th data-priority="3">Jenis Kegiatan</th>
                                                    <th data-priority="1">Satuan</th>
                                                    <th data-priority="3">Tarif</th>
                                                    <th class="text-center" data-priority="4"><button <?php if($hak == "Kepala Desa"){ echo "disabled='disabled'";} ?> class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal" onclick="javascript:
                                                    formTarif.kode_show.value= '';
                                                    formTarif.kd_tarif.value= '';
                                                    formTarif.kd_tarif.disabled= false;
                                                    formTarif.jenis_wisata.value= '';
                                                    formTarif.jenis_kegiatan.value= '';
                                                    formTarif.satuan.value= '';
                                                    formTarif.tarif.value= '';
                                                    formTarif.btn.value= '0';
                                                    ">Tambah</button></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($tarif as $tarif): ?>
                                                <tr>
                                                    <th><?php echo $tarif->kode_tarif;?></th>
                                                    <td><?php echo $tarif->jenis_wisata;?></td>
                                                    <td><?php echo $tarif->jenis_kegiatan;?></td>
                                                    <td><?php echo $tarif->satuan;?></td>
                                                    <td><?php echo number_format($tarif->tarif,0,',','.');?></td>
                                                    <td class="text-center"><button <?php if($hak == "Kepala Desa"){ echo "disabled='disabled'";} ?> class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#myModal" onclick="javascript:
                                                    formTarif.kode_show.value= '<?php echo $tarif->kode_tarif;?>';
							                        formTarif.kd_tarif.value= '<?php echo $tarif->kode_tarif;?>';
                                                    formTarif.kd_tarif.disabled = 'disabled';
							                     	formTarif.jenis_wisata.value= '<?php echo $tarif->jenis_wisata;?>';
							                        formTarif.jenis_kegiatan.value= '<?php echo $tarif->jenis_kegiatan;?>';
							                        formTarif.satuan.value= '<?php echo $tarif->satuan;?>';
							                        formTarif.tarif.value= '<?php echo $tarif->tarif;?>';
							                        formTarif.btn.value= '1';
							                        "><span class="fa fa-pencil"></span> Edit</button></td>
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
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Form Tarif Wisata</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form name="formTarif" action="<?php echo site_url('admin/proses_tarif');?>" method="POST">
								            <fieldset>
                                            <input name="kode_show" type="text" hidden="hidden"/>
								              <div class="form-group">
								                  <input name="kd_tarif" type="text" placeholder="Kode Tarif" class="form-control" required />
								              </div>
								              <div class="form-group">          
								                  <input name="jenis_wisata" type="text" placeholder="jenis_wisata" class="form-control" required/>   
								              </div>
								              <div class="form-group"> 
								                  <input name="jenis_kegiatan" type="text" placeholder="jenis_kegiatan" class="form-control" required/>
								              </div>
								              <div class="form-group"> 
								                  <input name="satuan" type="text" placeholder="Satuan" class="form-control" required/>
								              </div>
								              <div class="form-group">
								                  <input name="tarif" type="number" placeholder="Tarif" class="form-control" required/>
								              </div>
								                  <button name="btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
								            </fieldset>
								            </form>
                                        </div>
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