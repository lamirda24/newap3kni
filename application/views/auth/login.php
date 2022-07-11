<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <form action="<?= base_url('auth') ?>" method="POST">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="icon-object border-warning-400 text-warning-400"><i class="fa fa-users"></i></div>
                            <h5 class="content-group-lg">Login to your account <small class="display-block"></small></h5>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?= set_value('email') ?>">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6 text-right">
                                    <a href="<?= base_url('auth/resetPass') ?>">Forgot password?</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">Login <i class="icon-circle-right2 position-right"></i></button>
                        </div>
                        <div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
                        <a href="<?= base_url('auth/registrasi') ?>" class="btn bg-slate btn-block content-group">Register</a>
                        <div class="content-divider text-muted form-group mb-0 p-0"><span>Jika terjadi kendala silahkan hubungi</span></div>
                        <a href="https://wa.me/6282214101861/" target="_blank" class="btn bg-green btn-block content-group"> <i class="fa fa-whatsapp"></i> CP: Ibu Runi +62 822-1410-1861</a>

                    </div>
                </form>
                <!-- /advanced login -->
                <!-- Footer -->
                <div class="footer text-white">
                    &copy; <?= date('Y') ?>. Asosiasi Profesi Pendidikan Pancasila dan Kewarganegaraan Indonesia. Developed by <a href="https://www.linkedin.com/in/luthfiam/">Luthfi AM</a>. Informasi <a href="https://pdki-indonesia.dgip.go.id/detail/EC00202120664?type=copyright&keyword=asosiasi+profesi+pendidikan">Hak Cipta</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->