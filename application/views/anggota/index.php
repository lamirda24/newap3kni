<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-primitive-square position-left"></i> <span class="text-semibold">Home</span> - <?= $nama ?></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-primitive-square position-left"></i>Home</a></li>
                <li class="active"><?= $nama ?></li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">
        <div class="col-lg-3 col-md-6">
            <div class="thumbnail no-padding">
                <div class="thumb">
                    <img src="<?= base_url('/assets/user/foto/' . $anggota['foto_anggota']); ?>" alt="">
                    <div class="caption-overflow">
                        <span>
                            <a href="#" data-toggle="modal" data-target="#profile" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-eye"></i></a>
                        </span>
                    </div>
                </div>

                <div class="caption text-center">
                    <h6 class="text-semibold no-margin"><?= $nama ?><small class="display-block"><?= $anggota['jabatan_anggota'] ?></small></h6>
                </div>
            </div>
        </div>
    </div>