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
								<li class="active">Pemesanan Pendakian</li>
							</ol>
						</div>
					</div>
					<!-- Start Widget -->
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Daftar Pemesanan Pendakian Gn. Salak</h3> 
                                </div> 
                                <div class="panel-body table-rep-plugin"> 
                                    <div class="panel-body table-responsive" data-pattern="priority-columns">
                                        <table id="datatable" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th data-priority="1">Node Reg</th>
                                                <th data-priority="3">Nama</th>
                                                <th data-priority="3">Tlp</th>
                                                <th data-priority="1">Masuk</th>
                                                <th data-priority="3">Keluar</th>
                                                <th data-priority="3">Tgl Masuk</th>
                                                <th data-priority="3">Tgl Order</th>
                                                <th data-priority="6">Alamat</th>
                                                <th data-priority="6">Email</th>
                                                <th data-priority="6">Metode Pembayaran</th>
                                                <th data-priority="6">Tgl Konfirmasi</th>
                                                <th data-priority="6">Jml Pendaki</th>
                                                <th data-priority="6">Tarif</th>
                                                <th data-priority="6">Total Tagihan</th>
                                                <th class="text-center" data-priority="3">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach ($pemesanan as $pemesanan): ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td data-priority="1" style="cursor: pointer;"><a target="_blank" title="Klik untuk cetak tagihan" href="<?php echo site_url('welcome/tagihan/'.$pemesanan->id_reg);?>"><?php echo "ADV/REG/".$pemesanan->id_reg;?></a></td>
                                                    <td data-priority="1"><?php echo $pemesanan->nama_reg;?></td>
                                                    <td data-priority="3"><?php echo $pemesanan->tlp_reg;?></td>
                                                    <td data-priority="1"><?php echo $pemesanan->pintu_masuk;?></td>
                                                    <td data-priority="3"><?php echo $pemesanan->pintu_keluar;?></td>
                                                    <td class="text-center" data-priority="3"><?php echo $this->Model_halimun->konversi_hari($pemesanan->tgl_masuk,date('d-m-Y', strtotime($pemesanan->tgl_masuk)));?></td>
                                                    <td class="text-center" data-priority="3"><?php echo $this->Model_halimun->konversi_hari($pemesanan->tgl_masuk,date('d-m-Y H:i', strtotime($pemesanan->tgl_order)));?></td>
                                                    <td data-priority="6"><?php echo $pemesanan->alamat_reg;?></td>
                                                    <td data-priority="6"><?php echo $pemesanan->email_reg;?></td>
                                                    <td data-priority="6"><?php echo $pemesanan->metode_pembayaran;?></td>
                                                    <td class="text-center" data-priority="6"><?php if($pemesanan->tgl_invoice=='0000-00-00 00:00:00'){ echo "";}else{ echo date('d-m-Y H:i',strtotime($pemesanan->tgl_invoice));}?></td>
                                                    <td data-priority="6"><?php echo $pemesanan->jml_peserta;?></td>
                                                    <td data-priority="6"><?php echo "Rp.".number_format($pemesanan->tarif_per_orang,0,',','.');?></td>
                                                    <td data-priority="6"><?php echo "Rp.".number_format($pemesanan->jml_peserta*$pemesanan->tarif_per_orang,0,',','.');?></td>
                                                    <td><?php if($pemesanan->status_invoice == 1){ ?> <a href="<?php echo base_url('admin/aprv_pemesanan/'.$pemesanan->id_reg);?>" title="Klik untuk approve konfirmasi" onclick="return confirm('Apakah Anda yakin approve konfirmasi pembayaran ini?')"><label class="label label-info">Confirmed</label> <?php }else if($pemesanan->status_invoice == 3){ ?> <label class="label label-pink">Lunas</label> <?php }else if(date('Y-m-d H:i:s')>=date('Y-m-d H:i:s', strtotime('+24 Hours', strtotime($pemesanan->tgl_order)))){ ?> <a href="<?php echo base_url('admin/del_pemesanan/'.$pemesanan->id_reg.'/'.$pemesanan->jml_peserta.'/'.$pemesanan->id_isi);?>" title="Klik untuk menghapus data" onclick="return confirm('Apakah Anda yakin akan menghapus pemesanan ini?')"><label class="label label-danger">Confirm Expired</label></a><?php }else{ ?><label class="label label-warning">Not Confirmed</label><?php } ?></td>
                                                </tr>
                                            <?php endforeach;?>         
                                            </tbody>
                                        </table>
                                    </div>  
                                </div> 
                            </div>
                        </div>
					</div>
				</div><!-- /container -->
			</div><!-- /contain -->
		</div><!-- End Right content here -->
		<?php $this->load->view('footer');?>
    </div><!-- END wrapper -->
<?php $this->load->view('admin/endhtml');?>