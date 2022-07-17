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
							<div class="col-md-4 col-lg-offset-4">
								<div class="panel registration-form">
									<div class="panel-body">
										<div class="text-center">
											<div class="icon-object  text-secondary"><i class="icon-user-plus"></i></div>
											<h5 class="content-group-lg">Sign Up!<small class="display-block">All fields are required</small></h5>
										</div>
										<div class="tab">
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
											<div class="form-group has-feedback">
												<input type="password" class="form-control" placeholder="Create password" name="password1">
												<?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
											<div class="form-group has-feedback">
												<input type="password" class="form-control" placeholder="Repeat password" name="password2">
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>
										<div class="tab">
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Gelar Pendidikan" name="gelar" value="">
												<?= form_error('gelar', '<small class="text-danger pl-3">', '</small>'); ?>
												<div class="form-control-feedback">
													<i class="icon-graduation text-muted"></i>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group has-feedback">
														<input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal">
														<?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
														<div class="form-control-feedback">
														</div>
													</div>
												</div>
												<div class="col-md-8">
													<div class="form-group has-feedback">
														<input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat">
														<?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
														<div class="form-control-feedback">
															<i class="icon-location4 text-muted"></i>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Nomor Telepon" name="tlp">
												<?= form_error('tlp', '<small class="text-danger pl-3">', '</small>'); ?>
												<div class="form-control-feedback">
													<i class="icon-phone2 text-muted"></i>
												</div>
											</div>
											<div class="form-group has-feedback">
												<textarea class="form-control" placeholder="Alamat" name="alamat"> </textarea>
												<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
												<div class="form-control-feedback">
													<i class="icon-location3 text-muted"></i>
												</div>
											</div>
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Asal Instansi" name="asal">
												<?= form_error('asal', '<small class="text-danger pl-3">', '</small>'); ?>
												<div class="form-control-feedback">
													<i class="icon-library2 text-muted"></i>
												</div>
											</div>
											<div class="form-group has-feedback">
												<select name="jabatan" class="select">
													<option>-- Jabatan --</option>
													<option value="Anggota">Anggota</option>
													<option value="Pengurus">Pengurus</option>
												</select>
											</div>
											<div class="form-group has-feedback">
												<select name="wilayah" class="select-search">
													<option>-- Wilayah --</option>
													<?php foreach ($wilayah as $w) : ?>
														<option value="<?= $w->id ?>"> <?= $w->nama_wilayah ?> </option>
													<?php endforeach; ?>
												</select>
											</div>
											<div class="form-group has-feedback">
												<label class="control-label">Foto</label>
												<input type="file" name="foto" class="form-control" multiple accept='image/*'>
												<?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
											</div>
										</div>
										<div class="d-flex justify-content-between">
											<a href="<?= base_url('auth') ?>" class=" btn bg-primary-400">Login Page</a>
											<div>
												<button type="button" id="prevBtn" class="btn bg-blue disabled" onclick="nextForm(-1)">Back</button>
												<button type="button" id="nextBtn" class="btn bg-blue" onclick="nextForm(1)">Next</button>
											</div>
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
	<script aria-hidden="true">
		let currentTab = 0;
		const tab = document.getElementsByClassName("tab");
		const prevBtn = document.getElementById("prevBtn");
		const nextBtn = document.getElementById("nextBtn");
		const tabLen = tab.length;
		showTab(currentTab);

		function showTab(tabs) {
			tab[tabs].style.display = "block";
			if (tabs === 0) {
				prevBtn.style.display = "none";
			} else {
				prevBtn.style.display = "";
			}
			if (tabs == tabLen - 1) {
				nextBtn.innerHTML = "Submit";
			} else {
				nextBtn.innerHTML = "Next";
			}
		}

		function nextForm(n) {
			tab[currentTab].style.display = "none";
			currentTab = currentTab + n;
			tab[currentTab].classList.add(n !== -1 ? "active-in" : "active-out");
			if (currentTab >= tabLen) {
				document.getElementById("formReg").submit();
				return false;
			}
			showTab(currentTab);
			// formValid();
		}
		// function formValid() {
		// 	const namaUser = $("#nama_user").val();
		// 	const emailUser = $("#email_user").val();
		// 	const password = $("#password").val();
		// 	const confirmPass = $("#confirm_password").val();
		// }
		// $("#create").on("click", function() {
		// 	var datastring = $("#regisform").serialize();
		// 	console.log(datastring);
		// });
	</script>