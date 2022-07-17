<div class="page-header">
    <!-- Header content -->
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold"><?= $breadcumb ?> </span>- <?= $anggota['nama_user'] ?></h4>
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
                <li class="active"><a href="#profile" data-toggle="tab"><i class="icon-profile position-left"></i> Profile</a></li>
                <li class=""><a href="#riwayat" data-toggle="tab"><i class="fa fa-money position-left"></i> Riwayat Pembayaran </a></li>
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
                    <div class="tab-pane fade in active" id="profile">
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
                    <div class="tab-pane fade " id="riwayat">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Riwayat Pembayaran</h6>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table id="data" class="table datatable-basic">
                                    <thead>
                                        <tr>
                                            <th class="">#</th>
                                            <th class="">Tanggal</th>
                                            <th class="">Bukti</th>
                                            <th class="">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($riwayat as $r) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= date('d F Y', strtotime($r->tgl_pembayaran)); ?></td>
                                                <td><a class="btn btn-default btn-rounded btn-xs" href="<?= base_url('assets/user/bukti/' . $r->bukti_pembayaran); ?>" target="_blank" rel="noopener noreferrer"><i class="icon-file-picture position-left"></i>Bukti Pembayaran</a></td>
                                                <?php if ($r->status_pembayaran == 1) { ?>
                                                    <td>
                                                        <span class="label label-success">TERIMA</span>
                                                    </td>
                                                <?php } else { ?>
                                                    <td> <span class="label label-danger">TOLAK</span></td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--tab setting-->
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
                            <a href="#" class="btn bg-success-400 btn-icon btn-xs" data-toggle="modal" data-target="#profilepict"><i class="icon-zoomin3"></i></a>
                    </div>
                </div>
                <div class="caption text-center">
                    <h5 class="text-semibold no-margin"><?= $anggota['nama_user'] ?><small class="display-block"><?= $anggota['jabatan_anggota'] ?></small></h5>
                    <ul class="icons-list mt-15">
                        <li><?= $anggota['nama_wilayah'] ?></li>
                    </ul>
                </div>
            </div>
            <!-- /user thumbnail -->
            <!-- Navigation -->
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">Detail</h4>
                    <div class="list-group-divider"></div>
                    <h6 class="panel-title">Bergabung : <?= date('d F Y', strtotime($anggota['bergabung'])) ?></h6>
                    <h6 class="panel-title">Nomor Anggota : <?= $anggota['nomor_keanggotaan'] ?></h6>
                    <?php if ($anggota['status_keanggotaan'] == 1) { ?>
                        <h6 class="panel-title">Status : <span class="label label-success">Aktif</span></h6>
                    <?php } else { ?>
                        <h6 class="panel-title">Status : <span class="label label-danger">Non-Aktif</span></h6>
                    <?php } ?>
                </div>
            </div>
            <!-- /navigation -->
        </div>
    </div>
    <div>
    </div>
    <!-- /user profile -->
    <div id="profilepict" class="modal fade">
        <div class="modal-dialog modal-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <img height="650px" src="<?= base_url('assets/user/foto/' . $anggota['foto_anggota']) ?>">
                    </br>
                </div>
            </div>
        </div>
    </div>