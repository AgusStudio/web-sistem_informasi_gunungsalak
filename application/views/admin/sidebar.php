<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php if($foto==""){ echo base_url('assets/img/user/userdefault.png'); }else{ echo base_url('assets/img/user/'.$foto);} ?>" alt="Photo" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $nama;?></a>
                </div>
                <p class="text-muted m-0"><?php echo $jabatan;?></p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin');?>" class="waves-effect"><i class="fa fa-home"></i><span> Home </span></a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-list-alt"></i><span> Berita & Artikel</span><span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/berita')."'"; } ?>>Berita</a></li>
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/artikel')."'"; } ?>>Artikel</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-calendar"></i><span> Agenda & Informasi </span><span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/agenda')."'"; } ?>>Agenda</a></li>
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/informasi')."'"; } ?> >Informasi Pendakian</a></li>
                    </ul>>

                </li>
                <li>
                    <a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/galeri')."'"; } ?> class="waves-effect"><i class="fa fa-image"></i> Galeri </a>
                </li>
                <li>
                    <a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/kuota')."'"; } ?> class="waves-effect"><i class="fa fa-database"></i> Kuota Pendakian </a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-send-o"></i><span> Pemesanan </span><span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/pemesanan/pendakian')."'"; } ?> >Pendakian</a></li>
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/penyewaan/outdoor_equipment')."'"; } ?>>Sewa Outdoor Equipment</a></li>
                    </ul>
                </li>
                <li>
                    <a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/komentar')."'"; } ?> class="waves-effect"><i class="fa fa-envelope"></i> Daftar Komentar </a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/laporan');?>" class="waves-effect"><i class="fa fa-book"></i> Laporan Kunjungan </a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="fa fa-gear"></i><span> Setting </span><span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a <?php if($hak != "Super Admin"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/administrator')."'"; } ?>>Administrator</a></li>
                        <li><a <?php if($hak != "Super Admin"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/banner')."'"; } ?>>Banner</a></li>
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/outdoor_equipment')."'"; } ?>>Outdoor Equipment</a></li>
                        <li><a <?php if($hak == "Kepala Desa"){ ?> data-container="body" title="" data-toggle="popover" data-placement="right" data-content="Anda tidak memiliki hak akses ini." data-original-title="" href="#" <?php }else{ echo "href='".site_url('admin/pintu_masuk')."'"; } ?>>Pintu Masuk</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/logout');?>" class="waves-effect"><i class="fa fa-power-off"></i><span> Logout </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>