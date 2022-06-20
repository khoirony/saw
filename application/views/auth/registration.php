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
				<form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="username" name="username"
							placeholder="Username" value="<?= set_value('username'); ?>">
						<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group row">
						<div class="col-sm-6 mb-3 mb-sm-0">
							<input type="password" class="form-control form-control-user" id="password1"
								name="password1" placeholder="Password">
							<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control form-control-user" id="password2"
								name="password2" placeholder="Repeat Password">
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-user btn-block">
						Daftar
					</button>
				</form>
				<hr>
				<div class="text-center">
					<span class="small">Sudah Mempunyai akun? </span> <a class="small"
						href="<?= base_url('auth'); ?>">Login!</a>
				</div>
			</div>
		</div>
	</div>
	<br><br>
</div>
