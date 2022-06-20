<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-5 shadow-lg mt-5 rounded">
			<div class="p-5">
				<div class="text-center">
					<img src="<?= base_url('assets/'); ?>img/logo.png" alt="logo" class="img-thumbnail border-0">
					<p class="h4 text-gray-900 mb-2">Sistem Pendukung Keputusan</p>
					<p class="h5 text-gray-900 mb-4">Penentuan Anggota Terbaik</p>
				</div>
				<br>
				<?= $this->session->flashdata('msg');
                                if (isset($_SESSION['msg'])) {
                                    unset($_SESSION['msg']);
                                } ?>
				<form class="user" method="POST" action="<?= base_url('auth'); ?>">
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="username" name="username"
							placeholder="Masukkan Username" value="<?= set_value('username'); ?>">
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<input type="password" class="form-control form-control-user" id="password" name="password"
							placeholder="Password">
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<div class="custom-control custom-checkbox small">
							<input type="checkbox" class="custom-control-input" id="customCheck">
							<label class="custom-control-label" for="customCheck">Remember
								Me</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-user btn-block">
						Login
					</button>
				</form>
				<br>
			</div>

		</div>

	</div>
	<br><br>

</div>
