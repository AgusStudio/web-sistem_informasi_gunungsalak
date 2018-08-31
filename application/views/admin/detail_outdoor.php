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
                                <div class="col-sm-4 text-center">
                                    <img id="zoom_01" class="img-thumbnail" src="<?php echo base_url('assets/img/outdoor_equipment/'.$alat->gambar);?>" data-zoom-image="<?php echo base_url('assets/img/outdoor_equipment/'.$alat->gambar_besar);?>"/>
                                    <h3><p class="small" style="cursor: pointer;">Rp. <?php echo number_format($alat->harga_sewa,0,',','.');?> / Day</p>
                                     <?php echo $alat->nama_alat;?></h3>
                                </div>
                                <div class="col-sm-8">
                                    <?php echo form_open_multipart('admin/pro_edit_outdoor');?>    
                                    <h3>Deskripsi</h3>
                                    <div class='form-group'>
                                        <textarea name='deskripsi' required class='wysihtml5 form-control' placeholder="Deskripsi Alat" style='height: 200px' required><?php echo $alat->deskripsi;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input name="nama" value="<?php echo $alat->nama_alat;?>" type="text" placeholder="Nama Alat" class="form-control" required />
                                        <input name="id_alat" value="<?php echo $alat->id_alat;?>" hidden="hidden" type="text"/>
                                    </div> 
                                    <div class="form-group">
                                        <input name="harga" value="<?php echo $alat->harga_sewa;?>" type="text" placeholder="Harga Sewa Per Hari" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <select name="kategori" required class="form-control">
                                            <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $kategori): ?> 
                                            <option <?php if($alat->kategori_alat == $kategori->id_kat ){ echo "selected";} ?> value="<?php echo $kategori->id_kat;?>"><?php echo $kategori->nama_kategori;?></option>
                                        <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label">Upload Gambar Kecil</label>
                                        <input name="userfile" type="file" placeholder="Browse Image">
                                    </div>
                                    <div class="form-group"> 
                                        <label class="control-label">Upload Gambar Besar</label>
                                        <input name="userfile1" type="file" placeholder="Browse Image">
                                    </div>
                                    <div class="form-group btn-large btn-primary pull-left">
                                        <a href="<?php echo site_url('admin/outdoor_equipment');?>"><button name="add_btn" class="btn btn-large btn-primary pull-right" type="button">Batal</button></a>
                                    </div>
                                    <div class="form-group btn-large btn-primary pull-right">
                                        <button name="add_btn" class="btn btn-large btn-primary pull-right" type="submit">Kirim</button>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                            </div> <!-- panel body -->
                        </div> <!-- panel -->
                    </div>
                </div><!-- /container -->
            </div><!-- /contain -->
        </div><!-- End Right content here -->
        <?php $this->load->view('footer');?>
    </div><!-- END wrapper -->
<?php $this->load->view('admin/endhtml');?>