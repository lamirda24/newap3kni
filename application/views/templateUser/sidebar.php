<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <?php if ($role == 2) : ?>
                    <div class="media">
                        <a href="#" class="media-left" data-target="#profile" data-toggle="modal"><img src="<?= base_url('assets/user/foto/' . $anggota['foto_anggota']) ?>" class="img-circle img-sm" alt=""></a>
                        <div class="media-body">
                            <span class="media-heading text-semibold"><?= $nama ?> </span>
                            <div class="text-size-mini text-muted">
                                <i class="icon-user text-size-small"></i> &nbsp; <?= $statusA ?></br>
                                <i class="icon-calendar text-size-small"></i> &nbsp; <?= date('d F Y', strtotime($anggota['bergabung'])) ?>
                            </div>
                        </div>
                    </div>
                <?php elseif ($role == 1) : ?>
                    <div class="media">
                        <a href="#" class="media-left"><img src="<?= base_url() ?>assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                        <div class="media-body">
                            <span class="media-heading text-semibold"><?= $nama ?> </span>
                            <div class="text-size-mini text-muted">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <!-- Nanti disini cek status keanggotaan -->
                    <!-- Main -->
                    <?php if ($role == 2) : ?>
                        <li class="navigation-header"><span>Anggota</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li class=""><a href="<?= base_url('anggota') ?>"><i class="icon-home4"></i> <span>Home</span></a></li>
                        <li class=""><a href="<?= base_url('anggota/profile') ?>"><i class="icon-vcard"></i> <span>Profile</span></a></li>
                        <li class=""><a href="<?= base_url('anggota/editProfile') ?>"><i class="icon-pencil5"></i> <span>Ubah Profile</span></a></li>
                        <li class=""><a href="<?= base_url('anggota/pembayaran') ?>"><i class="icon-price-tag3"></i> <span>Pembayaran</span></a></li>
                    <?php elseif ($role == 1) : ?>
                        <li class="navigation-header"><span>Admin</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li class=""><a href="<?= base_url('admin') ?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                        <li class=""><a href="<?= base_url('admin/anggota') ?>"><i class="icon-vcard"></i> <span>Data Anggota</span></a></li>
                        <li class=""><a href="<?= base_url('admin/anggotaWil') ?>"><i class="icon-map"></i> <span>Data Wilayah</span></a></li>
                        <li class=""><a href="<?= base_url('admin/aktivasiAkun') ?>"><i class="icon-users"></i><span>Aktivasi Akun</span></a></li>
                        <li class=""><a href="<?= base_url('admin/pembayaran') ?>"><i class="icon-price-tag3"></i> <span>Data Pembayaran</span></a></li>
                    <?php endif; ?>
                    <li class=""><a href="#" data-toggle="modal" data-target="#logoutModal" id="sweet-warning"><i class="icon-exit3"></i> <span>Logout</span></a></li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<!-- /main sidebar -->