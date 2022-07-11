<div class="page-header">

    <!-- Header content -->
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold"><?= $judul ?> </span>- <?= $anggota['nama_user'] ?></h4>
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
                <li class="active"><a href="#activity" data-toggle="tab"><i class="icon-coin-dollar position-left"></i> Unggah Bukti Pembayaran</a></li>
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
                    <div class="tab-pane fade in active" id="activity">

                        <!-- Timeline -->



                        <!-- Sales stats -->

                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <?= form_open_multipart('anggota/uploadPembayaran') ?>
                                <div class="form-group has-feedback">
                                    <label class="control-label col-lg-2">Unggah Bukti Pembayaran</label>
                                    <input type="file" name="foto" class="form-control" multiple accept='image/*'>
                                    <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="text-center"> <button type="submit" class="btn bg-success-600 btn-labeled btn-labeled-right ml-10">
                                        <b><i class="icon-upload"></i></b> Unggah</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--tab schedule-->
                    <div class="tab-pane fade" id="riwayat">

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
                                <div class="table-responsive pre-scrollable">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nomor Invoice</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Staus Pembayaran</th>
                                                <th>Bukti Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($history as $h) :
                                            ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $h->id; ?></td>
                                                    <td><?= date('d F Y', strtotime($h->tgl_pembayaran)); ?></td>
                                                    <?php if ($h->status_pembayaran == 0) : ?>
                                                        <td><span class="label label-grey">Diperiksa</span></td>
                                                    <?php elseif ($h->status_pembayaran == 1) : ?>
                                                        <td><span class="label label-success">Diterima</span></td>
                                                    <?php else : ?>
                                                        <td><span class="label label-danger">Ditolak</span></td>

                                                    <?php endif; ?>
                                                    <td><a class="btn btn-default btn-rounded btn-xs" href="<?= base_url('assets/user/bukti/' . $h->bukti_pembayaran); ?>" target="_blank" rel="noopener noreferrer"><i class="icon-file-picture position-left"></i>Bukti Pembayaran</a></td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- /share your thoughts -->
                            </div>
                        </div>
                        <!-- /available hours -->
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


            <!--status pembayaran trakhir-->
            <div class="panel border-left-lg border-left-<?= $label ?> invoice-grid timeline-content">
                <div class="panel-heading">
                    <h6 class="panel-title">Status Pembayaran Terakhir</h6>
                </div>
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
            <!-- /navigation -->

        </div>
    </div>
    <!-- /user profile -->