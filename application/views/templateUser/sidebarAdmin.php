<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold"><?= $nama ?> </span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;
                        </div>
                    </div>
                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <!-- Main -->
                    <li class="navigation-header"><span>Administrator</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class=""><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li class="navigation-header"><span>Anggota</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="navigation-header"><span>Anggota</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class=""><a href="index.html"><i class="fa fa-fw fa-user-circle"></i> <span>Profile</span></a></li>
                    <li class=""><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-fw fa-sign-out"></i> <span>Logout</span></a></li>
                    <!-- /main -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
<!-- /main sidebar -->