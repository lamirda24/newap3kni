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
    <!-- /page header -->
    <div class="content">
        <?= $this->session->flashdata('message') ?>
        <div class="panel panel-flat col-md-9">
            <div class="panel-heading">
                <h6 class="panel-title">Ubah Data Diri</h6>
            </div>
            <div class="panel-body">
                <?= form_open_multipart('anggota/editProfile'); ?>
                <div class="form-group has-feedback">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="<?= $nama ?>" name="nama" value="<?= $nama ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label>Gelar</label>
                    <input type="text" class="form-control" placeholder="<?= $anggota['gelar_anggota'] ?>" name="gelar" value="<?= $anggota['gelar_anggota'] ?>">
                    <?= form_error('gelar', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="form-control-feedback">
                        <i class="icon-graduation text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control select">
                        <?php if ($anggota['jabatan_anggota'] !== "Anggota" && $anggota['jabatan_anggota'] !== "Pengurus") : ?>
                            <option value="<?= $anggota['jabatan_anggota'] ?>"><?= $anggota['jabatan_anggota'] ?></option>
                        <?php endif; ?>
                        <option value="Anggota">Anggota</option>
                        <option value="Pengurus">Pengurus</option>
                    </select>
                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <label>Wilayah</label>
                    <select name="wilayah" class="form-control select">
                        <option value="">Select...</option>
                        <?php foreach ($wilayah as $w) : ?>
                            <option value="<?= $w->id ?>" <?= $anggota['id'] === $w->id ? 'selected' : '' ?>> <?= $w->nama_wilayah ?></option>
                        <?php endforeach; ?>
                        <?= form_error('wilayah', '<small class="text-danger pl-3">', '</small>'); ?>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <label>Nomor Telepon</label>
                    <input type="text" class="form-control" placeholder="<?= $anggota['tlp_anggota'] ?>" name="notlp" value="<?= $anggota['tlp_anggota'] ?>">
                    <?= form_error('notlp', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="form-control-feedback">
                        <i class="icon-phone text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label>Alamat</label>
                    <input type="text" class="form-control" placeholder="<?= $anggota['alamat_anggota'] ?>" name="alamat" value="<?= $anggota['alamat_anggota'] ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="form-control-feedback">
                        <i class="icon-address-book text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label>Asal Instansi</label>
                    <input type="text" class="form-control" placeholder="<?= $anggota['instansi_anggota'] ?>" name="asal" value="<?= $anggota['instansi_anggota'] ?>">
                    <?= form_error('asal', '<small class="text-danger pl-3">', '</small>'); ?>
                    <div class="form-control-feedback">
                        <i class="icon-office text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label>Foto Profile</label>
                    <input type="file" name="foto" class="form-control" multiple accept='image/*' value="<?= $anggota['foto_anggota']; ?>">
                    <div class=" form-control-feedback">
                        <i class="icon-file-picture  text-muted"></i>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Edit Profile <i class="icon-arrow-right14"></i></button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3">
            <!-- User thumbnail -->
            <div class="thumbnail">
                <div class="thumb thumb-rounded thumb-slide">
                    <img src="<?= base_url('assets/user/foto/' . $anggota['foto_anggota']) ?>" alt="">
                    <div class="caption caption-overflow">
                        <span>
                            <a href="#" data-target="#profile" data-toggle="modal" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                    </div>
                </div>
                <div class="caption text-center">
                    <h6 class="text-semibold no-margin"><?= $anggota['nama_user'] ?><small class="display-block"><?= $anggota['jabatan_anggota'] ?></small></h6>
                    <ul class="icons-list mt-15">
                        <li><?= $anggota['nama_wilayah'] ?></li>
                </div>
            </div>
            <!-- /user thumbnail -->
            <!-- Navigation -->
            <div class="panel">
                <div class="panel-heading">
                    <h6 class="panel-title">Navigation</h6>
                </div>
                <div class="list-group list-group-borderless no-padding-top">
                    <a href="<?= base_url('anggota/profile') ?>" class="list-group-item"><i class="icon-user"></i>Lihat Profile</a>
                    <a href="#" data-toggle="modal" data-target="#kartu" class="list-group-item"><i class="icon-vcard"></i>Kartu Anggota</a>
                </div>
            </div>
            <!-- /navigation -->
        </div>
    </div>