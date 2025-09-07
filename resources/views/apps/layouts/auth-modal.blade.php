<!-- login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header align-items-center">
				<div class="justify-content-center gap-3">
					<button type="button" id="btn-switch-login" class="btn border-0 text-success">Masuk</button>
					<button type="button" id="btn-switch-register" class="btn btn-success" disabled>Daftar</button>
				</div>
				<button type="button" class="btn border-0 text-success p-0" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-circle-xmark fs-5"></i></button>
			</div>
			<div class="modal-body">
				{{-- Login Form --}}
				<form action="" id="form-login" class="d-none">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="username-email" name="username_email" placeholder="Masukkan username atau email...">
						<label for="username-email">Username / Email <span class="text-danger">*</span></label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password...">
						<label for="password">Password <span class="text-danger">*</span></label>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="remember-checkbox">
								<label class="form-check-label text-success opacity-75" for="remember-checkbox">
									Ingatkan Saya
								</label>
							</div>
							<p class="text-secondary ms-4" style="font-size: 12px">Fitur ini memungkinkan anda untuk terus berada di dalam akun anda.</p>
						</div>
						<div class="col-sm-6">
							<a href="#" class="text-success opacity-75 float-end">Lupa Password?</a>
						</div>
					</div>
				</form>

				{{-- Regristration Form --}}
				<form action="" id="form-register">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap...">
						<label for="name">Nama Lengkap <span class="text-danger">*</span></label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username...">
						<label for="username">Username <span class="text-danger">*</span></label>
					</div>
					<div class="form-floating mb-3">
						<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email...">
						<label for="email" name="email">Alamat Email <span class="text-danger">*</span></label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="password" name="password"placeholder="Masukkan password...">
						<label for="password">Password <span class="text-danger">*</span></label>
					</div>
					<div class="form-floating">
						<input type="password" class="form-control" id="password-confirmation" name="password_confirmation"placeholder="Masukkan konfirmasi password...">
						<label for="password-confirmation">Konfirmasi Password <span class="text-danger">*</span></label>
					</div>
				</form>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" id="btn-auth-submit" class="btn btn-success w-100"><i class="fa-solid fa-user-plus me-2"></i> Sign up</button>
				{{-- <p class="text-secondary">OR</p>
				<button type="button" id="btn-g-submit" class="btn btn-outline-success w-100"><i class="fa-brands fa-google me-2"></i> Sign in with Google</button> --}}
			</div>
		</div>
	</div>
</div>
