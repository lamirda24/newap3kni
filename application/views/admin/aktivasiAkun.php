<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold"><?= $breadcumb ?> - <?= $bread ?></h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a class="active" href="<?= base_url('admin/anggota'); ?>"><i class="icon-primitive-square position-left"></i><?= $breadcumb ?></a></li>
                <li></span class="text-muted"> <?= $bread ?></span></li>
                <!-- <li></span class="text-muted"><?= $wilayah['nama_wilayah'] ?></span></li> -->
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content col-lg-8">
        <?= $this->session->flashdata('message'); ?>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">Data Anggota</h6>
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
                            <th class="">Email Anggota</th>
                            <th class="">Status</th>
                            <th class="">Token</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($anggota as $a) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a->nama_user; ?></td>
                                <td><?= $a->email_user; ?></td>
                                <td> <span class="label label-danger"><?= $a->is_active == 0 ? "Tidak Aktif" : "" ?></span></td>
                                <form action="<?= base_url('Admin/createToken/' . $a->email_user) ?>">
                                    <td><button class='btn btn-primary btn-rounded <?= $a->token ? "disabled" : "" ?>'>Create Token</button></td>
                                </form>
                                <form method="post" action="<?= base_url('Auth/verify?email=' . $a->email_user . '&token=' . urlencode($a->token)) ?>">
                                    <td> <button class='btn btn-<?= $a->token ? "success" : "danger" ?> <?= $a->token ? "" : "disabled" ?>'>Aktifkan Akun</button></td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>