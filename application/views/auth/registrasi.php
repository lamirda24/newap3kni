	<!-- Page container -->

	<div class="page-container login-container">



		<!-- Page content -->

		<div class="page-content">



			<!-- Main content -->

			<div class="content-wrapper">



				<!-- Content area -->

				<div class="content">



					<!-- Registration form -->

					<form action="<?= base_url('auth/registrasi') ?>" method="POST">

						<div class="row">

							<div class="col-lg-4 col-lg-offset-4">

								<div class="panel registration-form">

									<div class="panel-body">

										<div class="text-center">

											<div class="icon-object  text-secondary"><i class="icon-user-plus"></i></div>

											<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>

										</div>





										<div class="form-group has-feedback">

											<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>">

											<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>

											<div class="form-control-feedback">

												<i class="icon-user text-muted"></i>

											</div>

										</div>

										<div class="form-group has-feedback">

											<input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">

											<?= form_error('email', '<small class="text-danger">', '</small>'); ?>

											<div class="form-control-feedback">

												<i class="icon-mention text-muted"></i>

											</div>

										</div>

										<div class="row">

											<div class="col-md-6">

												<div class="form-group has-feedback">

													<input type="password" class="form-control" placeholder="Create password" name="password1">

													<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

													<div class="form-control-feedback">

														<i class="icon-user-lock text-muted"></i>

													</div>

												</div>

											</div>



											<div class="col-md-6">

												<div class="form-group has-feedback">

													<input type="password" class="form-control" placeholder="Repeat password" name="password2">

													<div class="form-control-feedback">

														<i class="icon-user-lock text-muted"></i>

													</div>

												</div>

											</div>

										</div>



										<div class="text-right">

											<a href="<?= base_url('auth') ?>" class="text-muted">Kembali ke Halaman Login</a>

											<button type="submit" class="btn bg-primary-600 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>

										</div>

									</div>

								</div>

							</div>

						</div>

					</form>

					<!-- /registration form -->





					<!-- Footer -->

					<div class="footer text-white">

						                   &copy; <?= date('Y') ?>. Asosiasi Profesi Pendidikan Pancasila dan Kewarganegaraan Indonesia
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