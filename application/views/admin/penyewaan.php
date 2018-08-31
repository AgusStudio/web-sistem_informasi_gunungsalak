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
                                <li class="active">Penyewaan Outdoor Equipment</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Daftar Penyewaan Outdoor Equipment Adventurer Gn. Salak</h3> 
                                </div> 
                                <div class="panel-body table-rep-plugin"> 
                                    <div class="panel-body table-responsive" data-pattern="priority-columns">
                                        <table id="datatable" class="table table-small-font table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th data-priority="1">Kode Sewa</th>
                                                <th data-priority="3">Nama</th>
                                                <th data-priority="3">Kartu Identitas</th>
                                                <th data-priority="1">No Identitas</th>
                                                <th data-priority="3">Tlp</th>
                                                <th data-priority="1">Alamat</th>
                                                <th data-priority="3">Email</th>
                                                <th data-priority="3">Checkin</th>
                                                <th data-priority="1">Checkout</th>
                                                <th data-priority="3">Metode Pembayaran</th>
                                                <th data-priority="6">Tgl Konfirmasi</th>
                                                <th data-priority="6">Total Tagihan</th>
                                                <th class="text-center" data-priority="3">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach ($penyewaan as $penyewaan): ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td data-priority="1" style="cursor: pointer;"><a target="_blank" title="Klik untuk cetak tagihan" href="<?php echo site_url('welcome/tagihan_sewa/'.$penyewaan->id_sewa);?>"><?php echo "ADV/RENT/".$penyewaan->id_sewa;?></a></td>
                                                    <td data-priority="1"><?php echo $penyewaan->nama_penyewa;?></td>
                                                    <td data-priority="3"><?php echo $penyewaan->kartu_identitas;?></td>
                                                    <td data-priority="1"><?php echo $penyewaan->no_identitas;?></td>
                                                    <td data-priority="3"><?php echo $penyewaan->tlp;?></td>
                                                    <td class="text-center" data-priority="3"><?php echo $penyewaan->alamat ?></td>
                                                    <td data-priority="6"><?php echo $penyewaan->email;?></td>
                                                    <td data-priority="6"><?php echo date('d/m/Y',strtotime($penyewaan->tgl_sewa)).' '.date('H:i',strtotime($penyewaan->jam_cekin));?></td>
                                                    <td data-priority="6"><?php echo date('d/m/Y',strtotime($penyewaan->tgl_akhir_sewa)).' '.date('H:i',strtotime($penyewaan->jam_cekout));?></td>
                                                    <td data-priority="6"><?php echo $penyewaan->metode_pembayaran;?></td>
                                                    <td class="text-center" data-priority="6"><?php if($penyewaan->tgl_inv_alat=='0000-00-00 00:00:00'){ echo '';}else{ echo date('d-m-Y H:i',strtotime($penyewaan->tgl_inv_alat));}?></td>
                                                    <td data-priority="6"><?php echo "Rp.".number_format($penyewaan->total_bayar,0,',','.');?></td>
                                                    <td><?php if($penyewaan->status_inv_alat == 1){ ?> <a href="<?php echo base_url('admin/aprv_penyewaan/'.$penyewaan->id_sewa);?>" title="Klik untuk approve konfirmasi" onclick="return confirm('Apakah Anda yakin approve konfirmasi pembayaran ini?')"><label class="label label-info">Confirmed</label> <?php }else if($penyewaan->status_inv_alat == 3){ ?> <label class="label label-pink">Lunas</label> <?php }else if(date('Y-m-d H:i:s')>=date('Y-m-d H:i:s', strtotime('+24 Hours', strtotime($penyewaan->tgl_order)))){ ?> <a href="<?php echo base_url('admin/del_penyewaan/'.$penyewaan->id_sewa);?>" title="Klik untuk menghapus data" onclick="return confirm('Apakah Anda yakin akan menghapus penyewaan ini?')"><label class="label label-danger">Confirm Expired</label></a><?php }else{ ?><label class="label label-warning">Not Confirmed</label><?php } ?></td>
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