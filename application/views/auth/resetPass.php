<!-- Page container -->
<div class="page-container login-container">
    <!-- Page content -->
    <div class="page-content">
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                <!-- Advanced login -->
                <form action="<?= base_url('Auth/resetPass') ?>" method="POST">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="icon-object border-warning-400 text-warning-400"><i class="icon-lock2"></i></div>
                            <h5 class="content-group-lg">Reset Password <?= $this->session->userdata('reset_email') ?><small class="display-block"></small></h5>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" value="<?= set_value('email') ?>">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" name="password1" id="password" value="" placeholder="New Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock4 text-muted"></i>
                            </div>
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" name="password2" id="password1" value="" placeholder="Confirm New Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock4 text-muted"></i>
                            </div>
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn bg-blue btn-block">Reset Password<i class="icon-circle-right2 position-right"></i></button>
                        </div>
                        <div class="content-divider text-muted form-group"></div>
                        <a href="<?= base_url('Auth') ?>" class="btn bg-slate btn-block content-group">Back to Login</a>
                    </div>
                </form>
                <!-- /advanced login -->
                <!-- Footer -->
                <div class="footer text-white">
                    &copy; 2015. <a href="#" class="text-white">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" class="text-white" target="_blank">Eugene Kopyov</a>
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