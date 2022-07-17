  <!-- Footer -->
  <div class="footer text-muted text-center d-flex justify-content-center" style="position:absolute;bottom:0;height: 2.5rem;">
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
  <div id="logoutModal" class="modal fade">
    <div class="modal-dialog modal-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger-800">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Anda yakin ingin Keluar?</h6>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-link" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>
  <div id="profile" class="modal fade">
    <div class="modal-dialog modal-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
          <img height="450px" src="<?= base_url('assets/user/foto/' . $anggota['foto_anggota']) ?>">
          </br>
        </div>
      </div>
    </div>
  </div>
  <div id="kartu" class="modal fade">
    <div class="modal-dialog modal-centered border border-danger">
      <div class="modal-content col-md-8 col-md-offset-3">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
          <!-- /page header -->
          <div class="card text-center">
            <div class="card-header">
              <img height="100px" src="http://ap3kni.or.id/wp-content/uploads/2016/08/Logo_Ap3kni.png">
            </div>
            <div class="card-body ">
              <div class="bg-danger-800">
                <img class="bg-danger-800" height="250" src="<?= base_url('assets/user/foto/' . $anggota['foto_anggota']) ?>">
              </div>
              <div class="caption text-center">
                <h6 class="text-bold no-margin"><?= $nama ?><small class="display-block text-semibold"><?= $anggota['nomor_keanggotaan'] ?></small> <small class="display-block"><?= $anggota['nama_wilayah'] ?></small></h6>
                <ul class="icons-list mt-15">
                  <li>
                    <img style="width:25%;align:center;" src="<?php echo base_url('assets/user/qrcode/' . $anggota['qrcode']); ?>">
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Core JS files -->
  <!-- /core JS files -->
  <!-- Theme JS files -->
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/plugins/pickers/daterangepicker.js"></script>
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/core/app.js"></script>
  <script type="text/javascript" src="<?= base_url('') ?>assets/js/pages/form_inputs.js"></script>
  </body>

  </html>