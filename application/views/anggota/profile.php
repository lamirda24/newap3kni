<div class="page-header">
    <!-- Header content -->
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold">Home </span>- <?= $anggota['nama_user'] ?></h4>
        </div>
    </div>
    <!-- /header content -->
    <!-- Toolbar -->
    <div class="navbar navbar-default navbar-xs">
        <ul class="nav navbar-nav visible-xs-block">
            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
        </ul>
        <div class="navbar-collapse collapse" id="navbar-filter">
            <ul class="nav navbar-nav element-active-slate-400">
                <li class="active"><a href="#activity" data-toggle="tab"><i class="icon-menu7 position-left"></i> Profile</a></li>
                <li class=""><a href="#pembayaran" data-toggle="tab"><i class="fa fa-money position-left"></i> Status Pembayaran </a></li>
                <li class=""><a href="#settings" data-toggle="tab"><i class="icon-cog3 position-left"></i> Settings</a></li>
            </ul>
        </div>
    </div>
    <!-- /toolbar -->
</div>
<!-- /page header -->
<div class="content">
    <?= $this->session->flashdata('message'); ?>
    <!-- User profile -->
    <div class="row">
        <div class="col-lg-9">
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="activity">
                        <!-- Timeline -->
                        <div class="content-group">
                            <div class="timeline-container">
                                <!-- Sales stats -->
                                <div class="timeline-row">
                                    <div class="panel panel-flat timeline-content">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h6 class="">Gelar Pendidikan</h6>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h4><?= $anggota['gelar_anggota'] ?></h4>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h6 class="">Tempat Tanggal Lahir</h6>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h4><?= $anggota['tempat_anggota'] . ', ' . date('d F Y', strtotime($anggota['tgl_anggota'])) ?></h4>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h6 class="">Asal Instansi</h6>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h4><?= $anggota['instansi_anggota'] ?></h4>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h6 class="">Alamat</h6>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h4><?= $anggota['alamat_anggota'] ?></h4>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h6 class="">Nomor Telepon</h6>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h4><?= $anggota['tlp_anggota'] ?></h4>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /sales stats -->
                                <!-- Blog post -->
                                <!-- /blog post -->
                                <!-- Date stamp -->
                                <!-- /date stamp -->
                                <!-- Invoices -->
                                <!-- /invoices -->
                                <!-- Messages -->
                                <!-- /messages -->
                                <!-- Video posts -->
                                <!-- /video posts -->
                            </div>
                        </div>
                        <!-- /timeline -->
                    </div>
                    <!--tab schedule-->
                    <div class="tab-pane fade" id="pembayaran">
                        <!-- Available hours -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Status Pembayaran Terakhir</h6>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body">
                                <!-- Share your thoughts -->
                                <div class="panel border-left-lg border-left-success invoice-grid timeline-content">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6 class="text-semibold no-margin-top"><?= $nama ?></h6>
                                                <ul class="list list-unstyled">
                                                    <li>Invoice #: &nbsp;<?= $pembayaran['id'] ?></li>
                                                    <li>Issued on: <span class="text-semibold"><?= date('d M Y', strtotime($pembayaran['tgl_pembayaran'])) ?></span></li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6 class="text-semibold text-right no-margin-top">Rp 150.000</h6>
                                                <ul class="list list-unstyled text-right">
                                                    <li>Method: <span class="text-semibold">Transfer</span></li>
                                                    <li class="dropdown">
                                                        Status: &nbsp;
                                                        <label class="label bg-<?= $label ?>" data-toggle="dropdown"><?= $status ?></label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /share your thoughts -->
                            </div>
                        </div>
                        <!-- /available hours -->
                    </div>
                    <!--tab setting-->
                    <div class="tab-pane fade" id="settings">
                        <!-- Account settings -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Account settings</h6>
                                <div class="heading-elements">
                                </div>
                            </div>
                            <div class="panel-body">
                                <form action="<?= base_url('anggota/profile') ?>" method="POST">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                                <input type="text" value="<?= $anggota['email_user'] ?>" readonly="readonly" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Current Password</label>
                                                <input type="password" name="curPassword" placeholder="Enter current password" class="form-control">
                                                <?= form_error('curPassword', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>New password</label>
                                                <input type="password" name="newPassword" placeholder="Enter new password" class="form-control">
                                                <?= form_error('newPassword', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Repeat password</label>
                                                <input type="password" name="newPassword1" placeholder="Repeat new password" class="form-control">
                                                <?= form_error('newPassword1', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /account settings -->
                    </div>
                </div>
            </div>
        </div>
        <!--Menu sebelah kanan -->
        <div class="col-lg-3">
            <!-- User thumbnail -->
            <div class="thumbnail">
                <div class="thumb thumb-rounded thumb-slide">
                    <img src="<?= base_url('assets/user/foto/' . $anggota['foto_anggota']) ?>" alt="">
                    <div class="caption-overflow">
                        <span>
                            <a href="#" class="btn bg-success-400 btn-icon btn-xs" data-toggle="modal" data-target="#profile"><i class="icon-zoomin3"></i></a>
                    </div>
                </div>
                <div class="caption text-center">
                    <h6 class="text-semibold no-margin"><?= $anggota['nama_user'] ?><small class="display-block"><?= $anggota['jabatan_anggota'] ?></small></h6>
                    <ul class="icons-list mt-15">
                        <li><?= $anggota['nama_wilayah'] ?></li>
                </div>
            </div>
            <!-- /user thumbnail -->
            <div class="panel">
                <div class="panel-heading">
                    <h6 class="panel-title">Detail</h6>
                </div>
                <div class="list-group list-group-borderless no-padding-top">
                    <ul class="icons-list mt-5">
                        <li class="list-group-item"><i class="icon-calendar"></i>Bergabung : </li>
                        <li class="list-group-item"><?= date('d F Y', strtotime($anggota['bergabung'])) ?></li>
                    </ul>
                </div>
            </div>
            <!-- Navigation -->
            <div class="panel">
                <div class="panel-heading">
                    <h6 class="panel-title">Navigation</h6>
                </div>
                <div class="list-group list-group-borderless no-padding-top">
                    <a href="<?= base_url('anggota/editProfile') ?>" class="list-group-item"><i class="icon-pencil5"></i> Edit Profile</a>
                    <a href="#" data-toggle="modal" data-target="#kartu" class="list-group-item"><i class="icon-vcard"></i>Kartu Anggota</a>
                </div>
            </div>
            <!-- /navigation -->
        </div>
    </div>
    <div>
    </div>
    <!-- /user profile -->