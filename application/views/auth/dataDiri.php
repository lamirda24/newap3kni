	<!-- Page container -->
	<div class="page-container login-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<!-- Registration form -->
					<?= form_open_multipart('auth/dataDiri') ?>
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4">
							<div class="panel registration-form">
								<div class="panel-body">
									<div class="text-center">
										<div class="icon-object  text-secondary"><i class="icon-profile"></i></div>
										<h5 class="content-group-lg">Isi Data Diri<small class="display-block">All fields are required</small></h5>
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
									<div class="text-right">
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