@extends('user.layouts.app')

@section('title','Checkout')

@section('content')

@push('addon-style')
<style>
	.hero{
		display: none;
	}

	.header{
		display: none;
	}
	.footer{
		display: none;
	}
</style>

<div class="container justify-content-center mt-4">
	<h4>Forgot Password</h4>
	<hr>
	<div class="col-lg-6 ml-auto mr-auto">
		<div class="card shadow ml-auto mr-auto">
			<div class="card-body">
				<form action="{{route('ubahpassword')}}" method="post">
					@csrf
				<div class="form-group">
					<label>Email</label>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
					  </div>
					  <input type="text" class="form-control" placeholder="Masukan email" aria-label="Username" aria-describedby="basic-addon1" value="{{$data->email}}" name="email" readonly>
					</div>
				</div>
				<div class="form-group">
					<label>Password Baru</label>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
					  </div>
					  <input type="Password" class="form-control" placeholder="Masukan Password Baru" aria-label="Username" aria-describedby="basic-addon1" name="password">
					</div>
				</div>
				<button type="Submit" class="btn btn-danger float-right">Submit</button>
			</div>
			</form>
		</div>
	</div>

</div>

@endsection