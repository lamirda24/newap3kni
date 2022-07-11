<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold"><?= $breadcumb ?> - <?= $bread ?> - </span> <?= $wilayah['nama_wilayah'] ?></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a class="active" href="<?= base_url('admin/anggota'); ?>"><i class="icon-primitive-square position-left"></i><?= $breadcumb ?></a></li>
                <li></span class="text-muted"> <?= $bread ?></span></li>
                <li></span class="text-muted"><?= $wilayah['nama_wilayah'] ?></span></li>

            </ul>
        </div>
    </div>

    <!-- /page header -->


    <!-- Content area -->
    <div class="content col-lg-8">
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
                            <th class="">Nomor Anggota</th>
                            <th class="">Bergabung</th>
                            <th class="">Status</th>
                            <th class="">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($anggota as $a) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $a->nama_user; ?></td>
                                <td><?= $a->nomor_keanggotaan; ?></td>
                                <td><?= date('d F Y', strtotime($a->bergabung)); ?></td>
                                <?php if ($a->status_keanggotaan == 1) { ?>
                                    <td>
                                        <span class="label label-success">AKTIF</span>
                                    </td>
                                <?php } else { ?>
                                    <td> <span class="label label-danger">TIDAK AKTIF</span></td>
                                <?php } ?>
                                <td><a class="label border-left-info label-striped" href="<?= base_url('admin/detailAnggota/' . base64_encode($a->id_anggota)); ?>" target="_blank">Detail</a> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>