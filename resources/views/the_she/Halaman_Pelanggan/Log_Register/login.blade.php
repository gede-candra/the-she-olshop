@extends('the_she/Halaman_Pelanggan/layouts/main')

@section('title', 'Login')

@section('halaman_depan')
<div class="row mb-5">
	 <div class="col-lg-6 m-auto shadow p-4">
		  <h4 class="text-center mb-4 text-success" style="font-family: 'lemon'">LOGIN</h4>
		  <form>
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				</div>
				<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1">
				</div>
				<button type="submit" class="btn btn-primary w-100">Login</button>
		  </form>
	 </div>
  </div>
@endsection