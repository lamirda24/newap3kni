<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold">Ubah Profile</span> - <?= $nama ?></h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-primitive-square position-left"></i>Home</a></li>
                <li class="active">Ubah Profile</li>
                <li class="active"><?= $nama ?></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <?= $this->session->flashdata('message') ?>
        <div class="panel panel-flat col-md-2">
            <!-- /page header -->
            <div class="card text-center ">
                <div class="card-header ">
                    AP3KNI
                </div>
                <div class="card-body ">
                    <div class="bg-danger-800">
                        <img class="bg-danger" height="250" src="<?= base_url('assets/user/foto/' . $anggota['foto_anggota']) ?>">
                    </div>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-muted bg-danger-800">
                    2 days ago
                </div>
            </div>
        </div>