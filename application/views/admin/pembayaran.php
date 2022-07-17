<div class="page-header">
    <!-- Header content -->
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold"><?= $breadcumb ?> </span>- <?= $bread ?></h4>
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
                <li class="active"><a href="#masuk" data-toggle="tab"><i class="icon-coin-dollar position-left"></i> Pembayaran Masuk</a></li>
                <li><a href="#riwayat" data-toggle="tab"><i class="fa fa-money position-left"></i> Riwayat Pembayaran</a></li>
            </ul>
        </div>
    </div>
    <!-- /toolbar -->
</div>
<div class="content">
    <?= $this->session->flashdata('message'); ?>
    <!-- User profile -->
    <div class="row">
        <div class="col-lg-9">
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="masuk">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Pembayaran Masuk</h6>
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
                                            <th class="">Nama</th>
                                            <th class="">Tanggal</th>
                                            <th class="">Bukti</th>
                                            <th class="">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($pembayaran as $p) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $p->nama_user; ?></td>
                                                <td><?= date('d F Y', strtotime($p->tgl_pembayaran)); ?></td>
                                                <td><a class="btn btn-default btn-rounded btn-xs" href="<?= base_url('assets/user/bukti/' . $p->bukti_pembayaran); ?>" target="_blank" rel="noopener noreferrer"><i class="icon-file-picture position-left"></i> Bukti Pembayaran</a></td>
                                                <td><a onclick="return confirm('Apakah Anda Yakin?')" class="label label-success" href="<?= base_url('admin/terima/' . base64_encode($p->id)); ?>">Terima<i class="icon-checkmark position-right"></i></a> <a class="label label-danger" href="<?= base_url('admin/tolak/' . base64_encode($p->id)); ?>" onclick="return confirm('Apakah Anda Yakin?')">Tolak<i class="icon-cross position-right"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="riwayat">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h6 class="panel-title">Riwayat</h6>
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
                                            <th class="">Nama</th>
                                            <th class="">Nomor Anggota</th>
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
                                                <td><?= $r->nama_user; ?></td>
                                                <td><?= $r->nomor_keanggotaan; ?></td>
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
                </div>
            </div>
        </div>
    </div>