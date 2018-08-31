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
								<li class="active">Daftar Komentar</li>
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
                                            <th data-priority="1">From</th>
                                            <th data-priority="3">Nama</th>
                                            <th data-priority="1">Subject</th>
                                            <th data-priority="3">Pesan</th>
                                            <th data-priority="3">Tanggal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($komen as $komen): $id = $komen->id_komen; ?>
                                            <tr class="active">
                                                <td class="mail-select" style="cursor: pointer" onclick="<?php $data = array('status_baca'=>'1'); $this->Model_halimun->update_data('komentar','id_komen',$id,$data);?>">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox3" type="checkbox" <?php if($komen->status_baca == 1){ echo "checked disabled";}?>>
                                                        <label for="checkbox3">     
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="mail-rateing">
                                                    <a href="#" title="Klik untuk baca pesan" data-toggle="modal" data-target="#readModal" onclick="javascript:
                                                    document.getElementById('subject').innerHTML= '<?php echo $komen->subject;?>';
                                                    document.getElementById('nama').innerHTML= '<?php echo $komen->nama;?>';
                                                    document.getElementById('email').innerHTML= '<?php echo $komen->email;?>';
                                                    document.getElementById('pesan').innerHTML= '<?php echo $komen->pesan;?>';"><i class="fa fa-envelope m-r-15"></i><?php echo $komen->email;?></a>
                                                </td>
                                                <td>
                                                    <?php echo $komen->nama; ?>
                                                </td>
                                                <td>
                                                    <i class="fa fa-circle text-purple m-r-15"></i> <?php echo $komen->subject; ?>
                                                </td>
                                                <td>
                                                    <i class="fa fa-paperclip m-r-15"></i> <?php echo $this->Model_halimun->limit_words($komen->pesan, 10);?>...
                                                </td>
                                                <td class="text-right">
                                                    <?php echo $this->Model_halimun->konversi_hari($komen->tgl_post,date('d/m/Y H:i', strtotime($komen->tgl_post)));?>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>         
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- panel body -->
                        </div> <!-- panel -->
                        <div class="col-md-12">
                            <!-- sample modal content -->  
                            <div id="readModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Pesan</h4>
                                        </div>
                                        <div class="modal-body">
                                           <div class="panel panel-default m-t-20">
                                                <div class="panel-heading"> 
                                                    <h3 class="panel-title" id="subject"></h3> 
                                                </div>
                                                <div class="panel-body">
                                                    <div class="media m-b-30 ">
                                                        <div class="media-body">
                                                            <span class="media-meta pull-right" id="tgl_post"></span>
                                                            <h4 class="text-primary m-0" id="nama"></h4>
                                                            <small class="text-muted" id="email"></small>
                                                        </div>
                                                    </div> <!-- media -->
                                                    <p id="pesan"></p>
                                                </div> <!-- panel-body -->
                                            </div>
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