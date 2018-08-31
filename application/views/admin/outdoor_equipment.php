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
                                <li class="active">Daftar Outdoor Equipment</li>
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
                                            <th data-priority="1">Kategori</th>
                                            <th data-priority="3">Alat</th>
                                            <th data-priority="1">Gambar</th>
                                            <th data-priority="3">Deskripsi</th>
                                            <th data-priority="3">Harga Sewa</th>
                                             <th data-priority="3">Publish</th>
                                            <th class="text-center" data-priority="3"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> class="btn btn-primary waves-effect waves-light" title="Tambah Alat" data-toggle="modal" data-target="#addModal">Tambah</button></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($alat as $alat): ?>
                                            <tr class="active">
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $alat->nama_kategori;?></td>
                                                <td><a href="<?php echo site_url('admin/edit_outdoor/'.$alat->id_alat.'/'.$alat->nama_alat); ?>"><?php echo $alat->nama_alat;?></a></td>
                                                <td><img class="img-thumbnail" src="<?php echo base_url('assets/img/outdoor_equipment/'.$alat->gambar);?>" alt="Image"/></td>
                                                <td><?php echo $this->Model_halimun->limit_words($alat->deskripsi,4);?></td>
                                                <td>Rp. <?php echo number_format($alat->harga_sewa,0,',','.');?> / Day</td>
                                                <td><?php if($alat->status_alat == 1){ echo $this->Model_halimun->konversi_hari($alat->tgl_post,date('d-m-Y H:i', strtotime($alat->tgl_post))); }else{ ?> <a href="<?php echo site_url('admin/publ_outdoor/'.$alat->id_alat);?>"><button title="Publish Alat" class="btn small-btn btn-warning waves-effect waves-light" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-send"></i></button></a><?php } ?></td>
                                                <td class="text-center"><span class="col-md-6"><a href="<?php echo site_url('admin/edit_outdoor/'.$alat->id_alat.'/'.$alat->nama_alat); ?>"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> title="Edit Alat" class="btn small-btn btn-success waves-effect waves-light"><i class="fa fa-pencil"></i></button></a></span>
                                                <span class="col-md-6"><a href="<?php echo site_url('admin/del_outdoor/'.$alat->id_alat);?>"><button <?php if($hak != "Super Admin"){ echo "disabled='disabled'";} ?> title="Hapus Alat" class="btn small-btn btn-warning waves-effect waves-light" onclick="return confirm('Apakah Anda yakin?')"><i class="fa fa-trash"></i></button></a></span></td>
                                            </tr>
                                        <?php endforeach;?>         
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- panel body -->
                        </div> <!-- panel -->
                        <div class="col-md-12">
                            <!-- sample modal content -->  
                            <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title text-center" id="myModalLabel">Management Outdoor Equipment</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart('admin/add_outdoor');?>
                                                <div class="form-group text-center">
                                                    <img name="image" class="img-thumbnail" id="preview" alt="Image"/>
                                                </div>
                                                <div class="form-group">
                                                    <input name="nama" type="text" placeholder="Nama Alat" class="form-control" required />
                                                    <input name="id_alat" value="<?php echo $autoinc->Auto_increment;?>" hidden="hidden" type="text"/>
                                                </div>      
                                                <div class='form-group'>
                                                    <textarea name='deskripsi' class='wysihtml5 form-control' placeholder="Deskripsi Alat" style='height: 200px' required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input name="harga" type="number" placeholder="Harga Sewa Per Hari" class="form-control" required />
                                                </div>
                                                <div class="form-group">
                                                    <select name="kategori" required class="form-control">
                                                        <option value="">Pilih Kategori</option>
                                                    <?php foreach ($kategori as $kategori): ?> 
                                                        <option value="<?php echo $kategori->id_kat;?>"><?php echo $kategori->nama_kategori;?></option>
                                                    <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group"> 
                                                    <label class="control-label">Upload Gambar Kecil</label>
                                                    <input name="userfile" type="file" required placeholder="Browse Image" onchange="tampilkanPreview(this,'preview')">
                                                </div>
                                                <div class="form-group"> 
                                                    <label class="control-label">Upload Gambar Besar</label>
                                                    <input name="userfile1" type="file" required placeholder="Browse Image">
                                                </div>
                                                <div class="form-group btn-large btn-primary pull-right">
                                                    <button name="add_btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
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