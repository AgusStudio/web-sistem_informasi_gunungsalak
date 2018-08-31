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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="<?php if($foto==""){ echo base_url('assets/img/user/userdefault.png'); }else{ echo base_url('assets/img/user/'.$foto);} ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"><?php echo $nama;?></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row user-tabs">
                        <div class="col-lg-6 col-md-9 col-sm-9">
                            <ul class="nav nav-tabs tabs">
                                <li class="<?php echo $a;?> tab">
                                    <a href="#home-2" data-toggle="tab" aria-expanded="false" class="<?php echo $a;?>"> 
                                        <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                        <span class="hidden-xs">Profil</span> 
                                    </a> 
                                </li> 
                                <li class="<?php echo $b;?> tab"> 
                                    <a href="#profile-2" data-toggle="tab" aria-expanded="false" class="<?php echo $b;?>"> 
                                        <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                        <span class="hidden-xs">Ubah Password</span> 
                                    </a> 
                                </li> 
                                <li class="<?php echo $c;?> tab"> 
                                    <a href="#messages-2" data-toggle="tab" aria-expanded="false" class="<?php echo $c;?>"> 
                                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                        <span class="hidden-xs">Ubah Profil</span> 
                                    </a> 
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12"> 
                            <div class="tab-content profile-tab-content"> 
                                <div class="tab-pane <?php echo $a;?>" id="home-2"> 
                                    <div class="row">
                                        <div class="col-md-8">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading"> 
                                                    <h3 class="panel-title">Personal Information</h3> 
                                                </div> 
                                                <div class="panel-body"> 
                                                    <div class="about-info-p">
                                                        <strong>NIK</strong>
                                                        <br/>
                                                        <p class="text-muted"><?php echo $nik; ?></p>
                                                    </div>
                                                    <div cl
                                                    <div class="about-info-p">
                                                        <strong>Nama</strong>
                                                        <br/>
                                                        <p class="text-muted"><?php echo $nama; ?></p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Jabatan</strong>
                                                        <br/>
                                                        <p class="text-muted"><?php echo $jabatan; ?></p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Hak Akses</strong>
                                                        <br/>
                                                        <p class="text-muted"><?php echo $hak; ?></p>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div> <!--- End Col-8 -->
                                    </div>
                                </div> 
                                <div class="tab-pane <?php echo $b;?>" id="profile-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading"> 
                                                    <h3 class="panel-title">Ganti Password</h3> 
                                                </div> 
                                                <div class="panel-body"> 
                                                     <form name="passForm" action="<?php echo site_url('admin/ubahpassword');?>" onsubmit="return validatePass()" method="POST">
                                                        <div class="form-group">
                                                            <label for="Username">Password Lama*</label>
                                                            <input id="curent_pass" required type="password" name="passlama" placeholder="Password lama Anda" class="form-control">
                                                            <input type="text" name="nik" hidden="hidden" value="<?php echo $nik; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Password">Password Baru*</label>
                                                            <input id="new_pass" required type="password" placeholder="Password baru Anda" name="passbaru" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <p id="err_k"></p>
                                                            <label for="RePassword">Konfirmasi Password*</label>
                                                            <input id="konf_pass" required type="password" placeholder="Konfirmasi Password baru" name="pass_konfirm" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-success waves-effect waves-light w-md" type="submit">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div> 
                                            </div>
                                            <script type="text/javascript">
                                                function validatePass() {
                                                    var z = document.forms["passForm"]["passbaru"].value;
                                                    var w = document.forms["passForm"]["pass_konfirm"].value;
                                                    if (w != z) {
                                                        document.getElementById("err_k").innerHTML = "Konfirmasi password salah";
                                                        return false;
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div> 
                                <div class="tab-pane <?php echo $c;?>" id="messages-2">
                                    <div class="row">
                                        <div class="col-md-8">
                                         <?php echo form_open_multipart('admin/ubahprofil');?>
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading"> 
                                                    <h3 class="panel-title">Edit Profile</h3> 
                                                </div> 
                                                <div class="panel-body"> 
                                                    <div class="form-group text-center">
                                                        <img src="<?php echo base_url('assets/img/user/'.$foto);?>" name="image" class="thumb-lg img-circle img-thumbnail" id="preview" alt="Image"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="FullName">Nama*</label>
                                                        <input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" placeholder="Nama" required>
                                                        <input type="text" name="nik" hidden="hidden" value="<?php echo $nik; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jabatan </label>
                                                        <input type="text" name="jabatan" value="<?php echo $jabatan; ?>" class="form-control" placeholder="Jabatan" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Username">Foto Profil</label>
                                                        <input type="file" name="userfile" class="btn btn-primary waves-effect waves-light w-md" onchange="tampilkanPreview(this,'preview')" >
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-success waves-effect waves-light w-md" type="submit">Simpan</button>
                                                    </div>
                                                </div> 
                                            </div>
                                        <?php echo form_close();?>
                                        </div>
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