<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold"><?= $breadcumb ?></span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-primitive-square position-left"></i><?= $breadcumb ?></a></li>
                <li class="active">
                    <Ali>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-body border border-success bg-success">
                    <div class="media">
                        <div class="media-body ">
                            <h6 class="media-heading text-center"><i class="icon-users4 text-white border-teal btn-flat "></i>
                                Anggota Terdaftar : <?= $jumlah->jumlah_anggota ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-body border border-primary bg-primary">
                    <div class="media">
                        <div class="media-body ">
                            <h6 class="media-heading text-center"><i class="icon-users text-white border-teal btn-flat "></i>
                                Anggota Aktif : <?= $aktif->jumlahAktif ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="panel panel-body border border-warning bg-warning">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="media-heading text-center"><i class="icon-users text-white border-teal btn-flat "></i>
                                Anggota Tidak Aktif : <?= (int)$jumlah->jumlah_anggota - (int)$aktif->jumlahAktif ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>