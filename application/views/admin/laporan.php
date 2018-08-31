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
                                <li class="active">Laporan</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row"> 
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-white">Pilih Periode Laporan</h3>
                                </div>
                                <div class="panel-body">
                                    <?php echo form_open_multipart('admin/laporan');?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="control-group"> 
                                                <label class="control-label">Tanggal Awal*</label>
                                                <div class="input-group">
                                                    <input name="tglawal" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div><!-- input-group -->
                                            </div>
                                        </div>
                                        <div class="control-group col-md-4">
                                            <label class="control-label">Tanggal Akhir*</label>
                                            <div class="input-group">
                                                <input name="tglakhir" type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker2">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <div class="control-group col-md-2"><br/><button type="submit" value='1' name="tampil" class="btn btn-success btn-rounded waves-effect waves-light m-b-2" >Tampil</button></div>
                                    </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                            <h3 class="text-center"><?php echo $data_kosong;?></h3><br/>
                            <div class="panel panel-border panel-primary">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">Laporan Pendakian Gn. Salak</h3> 
                                </div> 
                                <div class="panel-body table-rep-plugin"> 
                                    <div class="panel-body table-responsive" data-pattern="priority-columns">
                                        <table id="datatable"  class="table table-small-font table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th data-priority="3">Tgl Masuk</th>
                                                <th data-priority="1">Node Reg</th>
                                                <th data-priority="3">Nama</th>
                                                <th data-priority="3">Tlp</th>
                                                <th data-priority="1">Masuk</th>
                                                <th data-priority="3">Keluar</th>
                                                <th data-priority="6">Alamat</th>
                                                <th data-priority="6">Email</th>
                                                <th data-priority="6">Metode Pembayaran</th>
                                                <th data-priority="6">Tgl Konfirmasi</th>
                                                <th data-priority="6">Jml Pendaki</th>
                                                <th data-priority="6">Tarif</th>
                                                <th data-priority="6">Total Tagihan</th>
                                                <th class="text-center">Daftar Pendaki</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; foreach ($laporan as $laporan): 
                                            $id = $laporan->id_reg; $pendaki = $this->Model_halimun->data_where('peserta','id_reg',$id); $jmlpendaki = count($pendaki); ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td class="text-center" data-priority="3"><?php echo $this->Model_halimun->konversi_hari($laporan->tgl_masuk,date('d-m-Y', strtotime($laporan->tgl_masuk)));?></td>
                                                    <td data-priority="1" style="cursor: pointer;"><a target="_blank" title="Klik untuk cetak tagihan" href="<?php echo site_url('welcome/tagihan/'.$laporan->id_reg);?>"><?php echo "ADV/REG/".$laporan->id_reg;?></a></td>
                                                    <td data-priority="1"><?php echo $laporan->nama_reg;?></td>
                                                    <td data-priority="3"><?php echo $laporan->tlp_reg;?></td>
                                                    <td data-priority="1"><?php echo $laporan->pintu_masuk;?></td>
                                                    <td data-priority="3"><?php echo $laporan->pintu_keluar;?></td>
                                                    <td data-priority="6"><?php echo $laporan->alamat_reg;?></td>
                                                    <td data-priority="6"><?php echo $laporan->email_reg;?></td>
                                                    <td data-priority="6"><?php echo $laporan->metode_pembayaran;?></td>
                                                    <td class="text-center" data-priority="6"><?php if($laporan->tgl_invoice=='0000-00-00 00:00:00'){ echo "";}else{ echo date('d-m-Y H:i',strtotime($laporan->tgl_invoice));}?></td>
                                                    <td data-priority="6"><?php echo $laporan->jml_peserta;?></td>
                                                    <td data-priority="6"><?php echo "Rp.".number_format($laporan->tarif_per_orang,0,',','.');?></td>
                                                    <td data-priority="6"><?php echo "Rp.".number_format($laporan->jml_peserta*$laporan->tarif_per_orang,0,',','.');?></td>
                                                    <td> 
                                                        <table class="table table-small-font table-bordered table-striped">
                                                            <tr>
                                                               <th>Nama</th>
                                                               <th>TTL</th>
                                                               <th>JK</th>
                                                               <th>Pekerjaan</th>
                                                               <th>Alamat</th>
                                                               <th>Kartu Identitas</th>
                                                               <th>No Identitas</th>
                                                               <th>Tlp</th> 
                                                               <th>Tlp Rumah</th>
                                                            </tr>
                                                            <?php foreach ($pendaki as $pendaki): ?>
                                                            <tr>
                                                                <td><?php echo $pendaki->nama_peserta;?></td>
                                                                <td><?php echo $pendaki->ttl_peserta;?></td>
                                                                <td><?php echo $pendaki->jenis_kelamin;?></td>
                                                                <td><?php echo $pendaki->pekerjaan_peserta;?></td>
                                                                <td><?php echo $pendaki->alamat_peserta.', '.$pendaki->kota.', '.$pendaki->provinsi;?></td>
                                                                <td><?php echo $pendaki->kartu_identitas;?></td>
                                                                <td><?php echo $pendaki->no_identitas;?></td>
                                                                <td><?php echo $pendaki->tlp_peserta;?></td>
                                                                <td><?php echo $pendaki->tlp_rumah;?></td>
                                                            </tr>
                                                            <?php endforeach;?>
                                                        </table>
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
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="<?php echo site_url('admin/download/'.$tgl1.'/'.$tgl2); ?>" target="_blank" class="btn btn-inverse waves-effect waves-light"><i class="fa  fa-download"></i></a>
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